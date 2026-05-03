<?php

// namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;

// class DashboardController extends Controller {
//     public function index() {
//     $role = Auth::user()->role;

//     if ($role === 'admin') {
//         return view('dashboardadmin');
//     } elseif ($role === 'kepsek') {
//         return view('dashboardkepsek');
//     } elseif ($role === 'staf') {
//         return view('dashboardstaf');
//     }

//     abort(403);
//     }

// }

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Inventaris;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class DashboardController extends Controller {

    public function index() {

        $role = Auth::user()->role;

        // DATA DASHBOARD
        // $barangMasuk = BarangMasuk::sum('jumlah_masuk');
        // $barangKeluar = BarangKeluar::sum('jumlah_keluar');
        // $totalBarang = Inventaris::count();
        // $kondisiBaik = Inventaris::where('kondisi','Baik')->count();
        // $rusakRingan = Inventaris::where('kondisi','Rusak Ringan')->count();
        // $rusakBerat = Inventaris::where('kondisi','Rusak Berat')->count();
        $barangMasuk = BarangMasuk::whereHas('inventaris', function ($q) {
            $q->where('jumlah', '>', 0);
        })->sum('jumlah_masuk');

        $barangKeluar = BarangKeluar::whereHas('inventaris', function ($q) {
            $q->where('jumlah', '>', 0);
        })->sum('jumlah_keluar');
        
        $totalBarang = Inventaris::where('jumlah', '>', 0)->count();

        $kondisiBaik = Inventaris::where('kondisi','Baik')
            ->where('jumlah', '>', 0)
            ->count();

        $rusakRingan = Inventaris::where('kondisi','Rusak Ringan')
            ->where('jumlah', '>', 0)
            ->count();

        $rusakBerat = Inventaris::where('kondisi','Rusak Berat')
            ->where('jumlah', '>', 0)
            ->count();
        
        $persenBaik = $totalBarang > 0 ? round(($kondisiBaik / $totalBarang) * 100) : 0;
        $persenRingan = $totalBarang > 0 ? round(($rusakRingan / $totalBarang) * 100) : 0;
        $persenBerat = $totalBarang > 0 ? round(($rusakBerat / $totalBarang) * 100) : 0;

        // ================= TAMBAHAN CHART BULANAN =================
        $chartBulanan = BarangMasuk::join('inventaris', 'barang_masuk.inventaris_id', '=', 'inventaris.id')
            ->selectRaw('
                MONTH(barang_masuk.tanggal_masuk) as bulan,
                SUM(CASE WHEN inventaris.kondisi = "Baik" THEN barang_masuk.jumlah_masuk ELSE 0 END) as baik,
                SUM(CASE WHEN inventaris.kondisi = "Rusak Ringan" THEN barang_masuk.jumlah_masuk ELSE 0 END) as ringan,
                SUM(CASE WHEN inventaris.kondisi = "Rusak Berat" THEN barang_masuk.jumlah_masuk ELSE 0 END) as berat
            ')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // TOTAL semua kondisi
        $totalKondisi = $kondisiBaik + $rusakRingan + $rusakBerat;

        // HITUNG PERSENTASE
        $persenBaik = $totalKondisi > 0 ? round(($kondisiBaik / $totalKondisi) * 100) : 0;
        $persenRingan = $totalKondisi > 0 ? round(($rusakRingan / $totalKondisi) * 100) : 0;
        $persenBerat = $totalKondisi > 0 ? round(($rusakBerat / $totalKondisi) * 100) : 0;

        if ($role === 'admin') {
            return view('dashboardadmin', compact(
                'barangMasuk',
                'barangKeluar',
                'totalBarang',
                'kondisiBaik',
                'rusakRingan',
                'rusakBerat',
                'persenBaik',      // 🔥 tambahan
                'persenRingan',    // 🔥 tambahan
                'persenBerat',
                'chartBulanan'
            ));
        }

        elseif ($role === 'kepsek') {
            return view('dashboardkepsek', compact(
                'barangMasuk',
                'barangKeluar',
                'totalBarang',
                'kondisiBaik',
                'rusakRingan',
                'rusakBerat',
                'persenBaik',      // 🔥 tambahan
                'persenRingan',    // 🔥 tambahan
                'persenBerat',
                'chartBulanan'
            ));
        }

        elseif ($role === 'staf') {
            return view('dashboardstaf', compact(
                'barangMasuk',
                'barangKeluar',
                'totalBarang',
                'kondisiBaik',
                'rusakRingan',
                'rusakBerat',
                'persenBaik',      // 🔥 tambahan
                'persenRingan',    // 🔥 tambahan
                'persenBerat',
                'chartBulanan'
            ));
        }

        abort(403);
    }
}
