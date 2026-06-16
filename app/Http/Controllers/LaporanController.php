<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarangMasukExport;
use App\Exports\BarangkeluarExport;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;     

class LaporanController extends Controller
{
    // =============================
    // LAPORAN BARANG MASUK
    // =============================
    // public function barangMasuk(Request $request)
    // {
    //     $query = Inventaris::query();

    //     if ($request->tanggalMasuk) {
    //         $query->whereDate('tanggal_masuk', '>=', $request->tanggalMasuk);
    //     }

    //     if ($request->tanggalKeluar) {
    //         $query->whereDate('tanggal_masuk', '<=', $request->tanggalKeluar);
    //     }

    //     $inventaris = $query->get();

    //     return view('laporanbarangmasuk', compact('inventaris'));
    // }
    // public function barangMasuk(Request $request)
    // {
    //     $inventaris = collect(); // default kosong

    //     if ($request->filled('tanggalMasuk') || $request->filled('tanggalKeluar')) {

    //         // $query = Inventaris::query();
    //         $query = Inventaris::where('jumlah', '>', 0);

    //         // VALIDASI: harus isi kedua tanggal
    //         if ($request->filled('tanggalMasuk') != $request->filled('tanggalKeluar')) {
    //             return back()->with('error', 'Harus isi kedua tanggal!');
    //         }

    //         // FILTER
    //         if ($request->filled('tanggalMasuk') && $request->filled('tanggalKeluar')) {
    //             $query->whereBetween('tanggal_masuk', [
    //                 $request->tanggalMasuk,
    //                 $request->tanggalKeluar
    //             ]);
    //         }

    //         $inventaris = $query->get();
    //     }

    //     return view('laporanbarangmasuk', compact('inventaris'));
    // }

    public function barangMasuk(Request $request)
    {
        // $query = BarangMasuk::with('inventaris');
        $query = BarangMasuk::selectRaw('
            inventaris_id,
            SUM(jumlah_masuk) as total_masuk,
            MAX(tanggal_masuk) as tanggal_masuk
        ')
        ->with('inventaris')
        ->groupBy('inventaris_id');

        // VALIDASI
        if ($request->filled('tanggalMasuk') != $request->filled('tanggalKeluar')) {
            return back()->with('error', 'Harus isi kedua tanggal!');
        }

        if ($request->filled('tanggalMasuk') && $request->filled('tanggalKeluar')) {
            if ($request->tanggalMasuk > $request->tanggalKeluar) {
                return back()->with('error', 'Tanggal awal tidak boleh lebih besar dari tanggal akhir!');
            }
        }

        // FILTER TANGGAL
        if ($request->filled('tanggalMasuk') && $request->filled('tanggalKeluar')) {
            $query->whereBetween('tanggal_masuk', [
                $request->tanggalMasuk,
                $request->tanggalKeluar
            ]);
        }

        // $inventaris = $query->orderBy('tanggal_masuk', 'desc')->get();
        $inventaris = $query->orderByDesc('tanggal_masuk')->get();

        return view('laporanbarangmasuk', compact('inventaris'));
    }

    public function exportExcelBarangMasuk(Request $request)
    {
        return Excel::download(
            new BarangMasukExport($request->tanggalMasuk, $request->tanggalKeluar),
            'laporan_barang_masuk.xlsx'
        );
    }

    public function exportPdfBarangMasuk(Request $request)
    {
        // $query = Inventaris::query();
        // $query = Inventaris::where('jumlah', '>', 0);
        // $query = BarangMasuk::with('inventaris')
        //     ->selectRaw('inventaris_id, SUM(jumlah_masuk) as total_masuk')
        //     ->groupBy('inventaris_id');
        $query = BarangMasuk::join('inventaris', 'barang_masuk.inventaris_id', '=', 'inventaris.id')
            ->selectRaw('
                inventaris.nama,
                SUM(barang_masuk.jumlah_masuk) as total_masuk
            ')
            ->groupBy('inventaris.id', 'inventaris.nama');

        if ($request->tanggalMasuk) {
            // $query->whereDate('tanggal_masuk', '>=', $request->tanggalMasuk);
            $query->whereDate('barang_masuk.tanggal_masuk', '>=', $request->tanggalMasuk);
        }

        if ($request->tanggalKeluar) {
            // $query->whereDate('tanggal_masuk', '<=', $request->tanggalKeluar);
            $query->whereDate('barang_masuk.tanggal_masuk', '<=', $request->tanggalKeluar);
        }

        $inventaris = $query->get();

        // $pdf = Pdf::loadView('laporan.pdf_barang_masuk', compact('inventaris'));
        $pdf = Pdf::loadView('laporan.pdf_barang_masuk', [
            'inventaris' => $inventaris,
            'tanggalAwal' => $request->tanggalMasuk,
            'tanggalAkhir' => $request->tanggalKeluar
        ]);

        return $pdf->download('laporan_barang_masuk.pdf');
    }

    // =============================
    // LAPORAN BARANG KELUAR
    // =============================
    // public function barangKeluar(Request $request)
    // {
    //     $query = BarangKeluar::with('inventaris')
    //         ->whereHas('inventaris', function ($q) {
    //             $q->where('jumlah', '>', 0);
    //         });

    //     // VALIDASI: harus isi kedua tanggal
    //     if ($request->filled('tanggalMasuk') != $request->filled('tanggalKeluar')) {
    //         return back()->with('error', 'Harus isi kedua tanggal!');
    //     }

    //     // FILTER
    //     if ($request->filled('tanggalMasuk') && $request->filled('tanggalKeluar')) {
    //         $query->whereBetween('tanggal_keluar', [
    //             $request->tanggalMasuk,
    //             $request->tanggalKeluar
    //         ]);
    //     }

    //     $inventaris = $query->get();

    //     return view('laporanbarangkeluar', compact('inventaris'));
    // }

    public function barangKeluar(Request $request)
    {
        $query = BarangKeluar::with('inventaris');

        // VALIDASI
        if ($request->filled('tanggalMasuk') != $request->filled('tanggalKeluar')) {
            return back()->with('error', 'Harus isi kedua tanggal!');
        }

        if ($request->filled('tanggalMasuk') && $request->filled('tanggalKeluar')) {
            if ($request->tanggalMasuk > $request->tanggalKeluar) {
                return back()->with('error', 'Tanggal awal tidak boleh lebih besar dari tanggal akhir!');
            }
        }

        // FILTER
        if ($request->filled('tanggalMasuk') && $request->filled('tanggalKeluar')) {
            $query->whereBetween('tanggal_keluar', [
                $request->tanggalMasuk,
                $request->tanggalKeluar
            ]);
        }

        // $inventaris = $query->orderBy('tanggal_keluar', 'desc')->get();
        $data = $query->get();

        // 🔥 GROUPING (INI KUNCI UTAMA)
        $inventaris = $data->groupBy('inventaris_id')->map(function ($items) {

            $first = $items->first();

            return (object)[
                'inventaris' => $first->inventaris,
                'tanggal_keluar' => $first->tanggal_keluar,
                'jumlah_keluar' => $items->sum('jumlah_keluar')
            ];
        })->values();

        return view('laporanbarangkeluar', compact('inventaris'));
    }

    public function exportExcelBarangKeluar(Request $request)
    {
        return Excel::download(
            new BarangKeluarExport($request->tanggalMasuk, $request->tanggalKeluar),
            'laporan_barang_keluar.xlsx'
        );
    }

    public function exportPdfBarangKeluar(Request $request)
    {
        // $query = Inventaris::query();
        // $query = BarangKeluar::with('inventaris')
        //     ->whereHas('inventaris', function ($q) {
        //         $q->where('jumlah', '>', 0);
        //     });
        $query = BarangKeluar::with('inventaris');

        if ($request->tanggalMasuk) {
            $query->whereDate('tanggal_keluar', '>=', $request->tanggalMasuk);
        }

        if ($request->tanggalKeluar) {
            $query->whereDate('tanggal_keluar', '<=', $request->tanggalKeluar);
        }

        $data = $query->get();

        // $pdf = Pdf::loadView('laporan.pdf_barang_keluar', [
        //     'inventaris' => $inventaris,
        //     'tanggalAwal' => $request->tanggalMasuk,
        //     'tanggalAkhir' => $request->tanggalKeluar
        // ]);
        $inventaris = $data->groupBy('inventaris_id')->map(function ($items) {

            $first = $items->first();

            return (object)[
                'inventaris' => $first->inventaris,
                'tanggal_keluar' => $first->tanggal_keluar,
                'jumlah_keluar' => $items->sum('jumlah_keluar')
            ];
        })->values();

        $pdf = Pdf::loadView('laporan.pdf_barang_keluar', [
            'inventaris' => $inventaris,
            'tanggalAwal' => $request->tanggalMasuk,
            'tanggalAkhir' => $request->tanggalKeluar
        ]);

        return $pdf->download('laporan_barang_keluar.pdf');
    }
}