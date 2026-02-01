<?php

// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\DashboardController;
// use Illuminate\Support\Facades\Route;

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/contoh', function () {
//     return view('contoh');
// });

// Route::get('/databarang', function () {
//     return view('databarang');
// });

// Route::get('/barangmasuk', function () {
//     return view('barangmasuk');
// });

// Route::get('/barangkeluar', function () {
//     return view('barangkeluar');
// });

// Route::get('/laporanbarangmasuk', function () {
//     return view('laporanbarangmasuk');
// });

// Route::get('/laporanbarangkeluar', function () {
//     return view('laporanbarangkeluar');
// });

// Route::get('/logaktivitas', function () {
//     return view('logaktivitas');
// });

// Route::get('/manajemenuser', function () {
//     return view('manajemenuser');
// });

// Route::get('/', [DashboardController::class, 'index'])
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// // Route::get('/', function () {
// //     return view('dashboardadmin');
// // })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin', function () {
//         return view('dashboardadmin');
//     });
// });

// Route::middleware(['auth', 'role:kepsek'])->group(function () {
//     Route::get('/kepsek', function () {
//         return view('dashboardkepsek');
//     });
// });

// Route::middleware(['auth', 'role:staf'])->group(function () {
//     Route::get('/staf', function () {
//         return view('dashboardstaf');
//     });
// });

// require __DIR__.'/auth.php';

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', function () {
    $role = Auth::user()->role;

    return match ($role) {
        'admin'  => redirect('/admin'),
        'kepsek' => redirect('/kepsek'),
        'staf'   => redirect('/staf'),
        default  => abort(403),
    };
})->middleware('auth');

/*
|--------------------------------------------------------------------------
| SEMUA USER LOGIN (Admin, Kepsek, Staf)
| KF-01 Login
| KF-02 Logout
| KF-03 Dashboard sesuai hak akses
| KF-04 Pencarian & filter data barang
| KF-05 Melihat data barang
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard utama (akan menyesuaikan role di controller)
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Data barang (lihat + cari + filter)
    Route::get('/databarang', fn () => view('databarang'));
});

/*
|--------------------------------------------------------------------------
| ADMIN SAJA
| KF-06 Kelola user
| KF-07 Download laporan PDF / Excel
| KF-08 Notifikasi email
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', fn () => view('dashboardadmin'));

    Route::get('/manajemenuser', fn () => view('manajemenuser'));

    Route::get('/laporan/download', fn () => view('laporandownload'));

    Route::get('/notifikasi', fn () => view('notifikasi'));
});

/*
|--------------------------------------------------------------------------
| ADMIN + KEPALA SEKOLAH
| KF-09 Laporan barang keluar
| KF-10 Laporan barang masuk
| KF-11 Log aktivitas
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin,kepsek'])->group(function () {

    Route::get('/kepsek', fn () => view('dashboardkepsek'));

    Route::get('/laporanbarangmasuk', fn () => view('laporanbarangmasuk'));
    Route::get('/laporanbarangkeluar', fn () => view('laporanbarangkeluar'));

    Route::get('/logaktivitas', fn () => view('logaktivitas'));
});

/*
|--------------------------------------------------------------------------
| ADMIN + STAF
| KF-12 Catat barang masuk
| KF-13 Catat barang keluar
| KF-14 Update kondisi barang
| KF-15 Update lokasi barang
| KF-16 Kelola data barang
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin,staf'])->group(function () {

    Route::get('/staf', fn () => view('dashboardstaf'));

    Route::get('/barangmasuk', fn () => view('barangmasuk'));
    Route::get('/barangkeluar', fn () => view('barangkeluar'));

    Route::get('/barang/kondisi', fn () => view('kondisibarang'));
    Route::get('/barang/lokasi', fn () => view('lokasibarang'));

    Route::get('/barang/manage', fn () => view('kelolabarang'));
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (Laravel Breeze / Jetstream)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
