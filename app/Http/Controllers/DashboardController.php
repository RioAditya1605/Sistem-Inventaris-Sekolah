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
        $barangMasuk = BarangMasuk::sum('jumlah_masuk');
        $barangKeluar = BarangKeluar::sum('jumlah_keluar');
        $totalBarang = Inventaris::count();
        $kondisiBaik = Inventaris::where('kondisi','Baik')->count();
        $rusakRingan = Inventaris::where('kondisi','Rusak Ringan')->count();
        $rusakBerat = Inventaris::where('kondisi','Rusak Berat')->count();

        if ($role === 'admin') {
            return view('dashboardadmin', compact(
                'barangMasuk',
                'barangKeluar',
                'totalBarang',
                'kondisiBaik',
                'rusakRingan',
                'rusakBerat'
            ));
        }

        elseif ($role === 'kepsek') {
            return view('dashboardkepsek', compact(
                'barangMasuk',
                'barangKeluar',
                'totalBarang',
                'kondisiBaik',
                'rusakRingan',
                'rusakBerat'
            ));
        }

        elseif ($role === 'staf') {
            return view('dashboardstaf', compact(
                'barangMasuk',
                'barangKeluar',
                'totalBarang',
                'kondisiBaik',
                'rusakRingan',
                'rusakBerat'
            ));
        }

        abort(403);
    }
}
