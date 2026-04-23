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
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    // =========================
    // DATA BARANG (READ UTAMA)
    // =========================
    public function dataBarang(Request $request)
    {
        if ($request->filled('nama') || $request->filled('kondisi') || $request->filled('tanggal_masuk')) {

            if (!$request->filled('nama') || !$request->filled('kondisi') || !$request->filled('tanggal_masuk')) {
                return back()->with('error', 'Semua filter harus diisi!');
            }
        }
        
        $query = Inventaris::where('jumlah', '>', 0);

        if ($request->nama) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }

        if ($request->kondisi) {
            $query->where('kondisi', $request->kondisi);
        }

        if ($request->tanggal_masuk) {
            $query->whereDate('tanggal_masuk', $request->tanggal_masuk);
        }

        // $inventaris = $query->latest()->get();
        // $inventaris = $query->orderBy('tanggal_masuk', 'desc')->get();
        $inventaris = $query
            ->orderBy('tanggal_masuk', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('databarang', compact('inventaris'));
    }

    // =========================
    // CREATE BARANG MASUK
    // =========================
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'kode' => 'required',
    //         'nama' => 'required',
    //         'jumlah' => 'required|integer',
    //         'kondisi' => 'required',
    //         'lokasi' => 'required',
    //         'tanggal_masuk' => 'required|date',
    //     ]);

    //     try {

    //         // Simpan ke inventaris
    //         $inventaris = Inventaris::create([
    //             'kode' => $request->kode,
    //             'nama' => $request->nama,
    //             'jumlah' => $request->jumlah,
    //             'kondisi' => $request->kondisi,
    //             'lokasi' => $request->lokasi,
    //             'tanggal_masuk' => $request->tanggal_masuk,
    //             'staf_id' => auth()->id(),
    //         ]);

    //         // Riwayat barang masuk
    //         BarangMasuk::create([
    //             'inventaris_id' => $inventaris->id,
    //             'jumlah_masuk' => $request->jumlah,
    //             'tanggal_masuk' => $request->tanggal_masuk,
    //             'staf_id' => auth()->id(),
    //         ]);

    //         return redirect('/databarang')
    //             ->with('success','Barang berhasil ditambahkan');

    //     } catch (\Exception $e) {

    //         return back()->with('error','Barang gagal ditambahkan');

    //     }
    // }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required',
            'lokasi' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        try {

            // 🔍 CEK BERDASARKAN KODE
            // $barang = Inventaris::where('kode', $request->kode)->first();
            $barang = Inventaris::where('kode', $request->kode)
                ->where('nama', $request->nama)
                ->where('kondisi', $request->kondisi)
                ->where('lokasi', $request->lokasi)
                ->first();

            $kodeSudahAda = Inventaris::where('kode', $request->kode)->exists();

            if ($barang) {

                $barang->update([
                    'jumlah' => $barang->jumlah + $request->jumlah,
                    'tanggal_masuk' => $request->tanggal_masuk
                ]);

                BarangMasuk::create([
                    'inventaris_id' => $barang->id,
                    'jumlah_masuk' => $request->jumlah,
                    'tanggal_masuk' => $request->tanggal_masuk,
                    'staf_id' => auth()->id(),
                ]);

                return redirect('/databarang')
                    ->with('success','Jumlah barang berhasil ditambahkan');
            }

            if ($kodeSudahAda) {
                return back()->with('error','Kode barang sudah dipakai untuk barang lain!');
            }

            // ✅ JIKA BELUM ADA → INSERT BARU
            $inventaris = Inventaris::create([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'jumlah' => $request->jumlah,
                'kondisi' => $request->kondisi,
                'lokasi' => $request->lokasi,
                'tanggal_masuk' => $request->tanggal_masuk,
                'staf_id' => auth()->id(),
            ]);

            // riwayat barang masuk
            BarangMasuk::create([
                'inventaris_id' => $inventaris->id,
                'jumlah_masuk' => $request->jumlah,
                'tanggal_masuk' => $request->tanggal_masuk,
                'staf_id' => auth()->id(),
            ]);

            return redirect('/databarang')
                ->with('success','Barang berhasil ditambahkan');

        } catch (\Exception $e) {

            return back()->with('error','Barang gagal ditambahkan');

        }
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

        try {

            $inventaris = Inventaris::where('kode', $request->kode)->first();

            if (!$inventaris) {
                return back()->with('error', 'Kode barang tidak ditemukan');
            }

            // cek stok
            if ($inventaris->jumlah < $request->jumlah_keluar) {
                return back()->with('error','Stok tidak mencukupi');
            }

            // kurangi stok
            $inventaris->update([
                'jumlah' => $inventaris->jumlah - $request->jumlah_keluar
            ]);

            // riwayat barang keluar
            BarangKeluar::create([
                'inventaris_id' => $inventaris->id,
                'jumlah_keluar' => $request->jumlah_keluar,
                'tanggal_keluar' => $request->tanggal_keluar,
                'staf_id' => auth()->id(),
            ]);

            return redirect('/databarang')
                ->with('success','Barang berhasil dikeluarkan');

        } catch (\Exception $e) {

            return back()->with('error','Barang gagal dikeluarkan');

        }
    }

    public function logAktivitas()
    {
        $masuk = \App\Models\BarangMasuk::with('inventaris','user')->get()->map(function ($item) {
            return [
                'kode' => $item->inventaris->kode,
                'nama' => $item->inventaris->nama,
                'tanggal' => $item->tanggal_masuk,
                'waktu' => \Carbon\Carbon::parse($item->created_at),
                'kondisi' => $item->inventaris->kondisi,
                'user' => $item->user->name ?? '-',
                'lokasi' => $item->inventaris->lokasi,
                'aksi' => 'Masuk'
            ];
        });

        $keluar = \App\Models\BarangKeluar::with('inventaris','user')->get()->map(function ($item) {
            return [
                'kode' => $item->inventaris->kode,
                'nama' => $item->inventaris->nama,
                'tanggal' => $item->tanggal_keluar,
                'waktu' => \Carbon\Carbon::parse($item->created_at),
                'kondisi' => $item->inventaris->kondisi,
                'user' => $item->user->name ?? '-',
                'lokasi' => $item->inventaris->lokasi,
                'aksi' => 'Keluar'
            ];
        });

        // $log = $masuk->merge($keluar)->sortByDesc('waktu');
        $log = $masuk->merge($keluar)->sortByDesc(function ($item) {
            return $item['waktu'];
        })->values();

        return view('logaktivitas', compact('log'));
    }

}