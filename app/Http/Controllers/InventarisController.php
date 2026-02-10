<?php

// namespace App\Http\Controllers;

// use App\Models\Inventaris;
// use Illuminate\Http\Request;

// class InventarisController extends Controller
// {
//     // READ (tampilkan data)
//     public function index(Request $request)
//     {
//         $query = Inventaris::query();

//         // filter tanggal (opsional, sesuai blade kamu)
//         if ($request->tanggal_masuk) {
//             $query->whereDate('tanggal_masuk', $request->tanggal_masuk);
//         }

//         if ($request->tanggal_keluar) {
//             $query->whereDate('tanggal_keluar', $request->tanggal_keluar);
//         }

//         $inventaris = $query->latest()->get();

//         return view('laporanbarangkeluar', compact('inventaris'));
//     }

//     public function barangMasuk(Request $request)
//     {
//         $query = Inventaris::query();

//         if ($request->tanggal_masuk) {
//             $query->whereDate('tanggal_masuk', $request->tanggal_masuk);
//         }

//         $inventaris = $query
//             ->whereNotNull('tanggal_masuk') // ← barang masuk
//             ->latest()
//             ->get();

//         return view('laporanbarangmasuk', compact('inventaris'));
//     }

//     // CREATE (simpan data)
//     public function store(Request $request)
//     {
//         $request->validate([
//             'kode' => 'required',
//             'nama' => 'required',
//             'jumlah' => 'required|integer',
//             'kondisi' => 'required',
//             'lokasi' => 'required',
//             'tanggal_masuk' => 'required|date',
//         ]);

//         Inventaris::create([
//             'kode' => $request->kode,
//             'nama' => $request->nama,
//             'jumlah' => $request->jumlah,
//             'kondisi' => $request->kondisi,
//             'lokasi' => $request->lokasi,
//             'tanggal_masuk' => $request->tanggal_masuk,
//             'tanggal_keluar' => $request->tanggal_keluar,
//         ]);

//         return redirect()->back()->with('success', 'Barang berhasil ditambahkan');
//     }

//     // UPDATE
//     public function update(Request $request, $id)
//     {
//         $inventaris = Inventaris::findOrFail($id);

//         $inventaris->update($request->only([
//             'kode',
//             'nama',
//             'jumlah',
//             'kondisi',
//             'lokasi',
//             'tanggal_masuk',
//             'tanggal_keluar'
//         ]));

//         return redirect()->back()->with('success', 'Data berhasil diperbarui');
//     }

//     // DELETE
//     public function destroy($id)
//     {
//         Inventaris::findOrFail($id)->delete();
//         return redirect()->back()->with('success', 'Data berhasil dihapus');
//     }
// }

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    // =========================
    // DATA BARANG (READ UTAMA)
    // =========================
    public function dataBarang(Request $request)
    {
        $query = Inventaris::query();

        if ($request->nama) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }

        if ($request->kondisi) {
            $query->where('kondisi', $request->kondisi);
        }

        if ($request->tanggal_masuk) {
            $query->whereDate('tanggal_masuk', $request->tanggal_masuk);
        }

        $inventaris = $query->latest()->get();

        return view('databarang', compact('inventaris'));
    }

    // =========================
    // CREATE BARANG MASUK
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'jumlah' => 'required|integer',
            'kondisi' => 'required',
            'lokasi' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        Inventaris::create([
        'kode' => $request->kode,
        'nama' => $request->nama,
        'jumlah' => $request->jumlah,
        'kondisi' => $request->kondisi,
        'lokasi' => $request->lokasi,
        'tanggal_masuk' => $request->tanggal_masuk,
        'staf_id' => auth()->id(),
        ]);

        return redirect('/databarang')->with('success', 'Barang berhasil ditambahkan');
    }

    // =========================
    // UPDATE BARANG (KELUAR / EDIT)
    // =========================
    public function update(Request $request, $id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->update($request->only([
            'kondisi',
            'lokasi'
            // 'jumlah',
            // 'tanggal_keluar'
        ]));

        return redirect('/databarang')
            ->with('success', 'Data barang berhasil diperbarui');
    }

    // =========================
    // LAPORAN BARANG MASUK
    // =========================
    public function laporanMasuk(Request $request)
    {
        $query = Inventaris::whereNotNull('tanggal_masuk');

        if ($request->tanggal_masuk) {
            $query->whereDate('tanggal_masuk', $request->tanggal_masuk);
        }

        $inventaris = $query->latest()->get();

        return view('laporanbarangmasuk', compact('inventaris'));
    }

    // =========================
    // LAPORAN BARANG KELUAR
    // =========================
    public function laporanKeluar(Request $request)
    {
        $query = Inventaris::whereNotNull('tanggal_keluar');

        if ($request->tanggal_keluar) {
            $query->whereDate('tanggal_keluar', $request->tanggal_keluar);
        }

        $inventaris = $query->latest()->get();

        return view('laporanbarangkeluar', compact('inventaris'));
    }

    // =========================
    // DELETE
    // =========================
    public function destroy($id)
    {
        Inventaris::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    // =========================
    // PROSES BARANG KELUAR
    // =========================
    public function barangKeluar(Request $request)
    {
        $request->validate([
            'kode' => 'required|exists:inventaris,kode',
            'jumlah_keluar' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
        ]);

        // Cari barang berdasarkan kode
        $inventaris = Inventaris::where('kode', $request->kode)->first();

        if (!$inventaris) {
            return back()->with('error', 'Barang tidak ditemukan');
        }

        // Cek stok
        if ($inventaris->jumlah < $request->jumlah_keluar) {
            return back()->with('error', 'Stok tidak mencukupi');
        }

        // Kurangi stok
        $inventaris->update([
            'jumlah' => $inventaris->jumlah - $request->jumlah_keluar,
            'tanggal_keluar' => $request->tanggal_keluar,
        ]);

        return redirect('/databarang')
            ->with('success', 'Barang berhasil dikeluarkan');
    }

}