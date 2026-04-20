<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarangMasukExport;
use App\Exports\BarangKeluarExport;
use App\Models\BarangKeluar;

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
    public function barangMasuk(Request $request)
    {
        $inventaris = collect(); // default kosong

        if ($request->filled('tanggalMasuk') || $request->filled('tanggalKeluar')) {

            // $query = Inventaris::query();
            $query = Inventaris::where('jumlah', '>', 0);

            // VALIDASI: harus isi kedua tanggal
            if ($request->filled('tanggalMasuk') != $request->filled('tanggalKeluar')) {
                return back()->with('error', 'Harus isi kedua tanggal!');
            }

            // FILTER
            if ($request->filled('tanggalMasuk') && $request->filled('tanggalKeluar')) {
                $query->whereBetween('tanggal_masuk', [
                    $request->tanggalMasuk,
                    $request->tanggalKeluar
                ]);
            }

            $inventaris = $query->get();
        }

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
        $query = Inventaris::where('jumlah', '>', 0);

        if ($request->tanggalMasuk) {
            $query->whereDate('tanggal_masuk', '>=', $request->tanggalMasuk);
        }

        if ($request->tanggalKeluar) {
            $query->whereDate('tanggal_masuk', '<=', $request->tanggalKeluar);
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
    public function barangKeluar(Request $request)
    {
        $query = BarangKeluar::with('inventaris')
            ->whereHas('inventaris', function ($q) {
                $q->where('jumlah', '>', 0);
            });

        // if ($request->filled('tanggalMasuk')) {
        //     $query->whereDate('tanggal_keluar', '>=', $request->tanggalMasuk);
        // }

        // if ($request->filled('tanggalKeluar')) {
        //     $query->whereDate('tanggal_keluar', '<=', $request->tanggalKeluar);
        // }

        // VALIDASI: harus isi kedua tanggal
        if ($request->filled('tanggalMasuk') != $request->filled('tanggalKeluar')) {
            return back()->with('error', 'Harus isi kedua tanggal!');
        }

        // FILTER
        if ($request->filled('tanggalMasuk') && $request->filled('tanggalKeluar')) {
            $query->whereBetween('tanggal_keluar', [
                $request->tanggalMasuk,
                $request->tanggalKeluar
            ]);
        }

        $inventaris = $query->get();

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
        $query = BarangKeluar::with('inventaris')
            ->whereHas('inventaris', function ($q) {
                $q->where('jumlah', '>', 0);
            });

        if ($request->tanggalMasuk) {
            $query->whereDate('tanggal_keluar', '>=', $request->tanggalMasuk);
        }

        if ($request->tanggalKeluar) {
            $query->whereDate('tanggal_keluar', '<=', $request->tanggalKeluar);
        }

        $inventaris = $query->get();

        $pdf = Pdf::loadView('laporan.pdf_barang_keluar', [
            'inventaris' => $inventaris,
            'tanggalAwal' => $request->tanggalMasuk,
            'tanggalAkhir' => $request->tanggalKeluar
        ]);

        return $pdf->download('laporan_barang_keluar.pdf');
    }
}