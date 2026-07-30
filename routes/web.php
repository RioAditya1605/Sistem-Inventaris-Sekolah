<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;


// AUTH ROUTES (WAJIB – JANGAN DIHAPUS)
require __DIR__.'/auth.php';


// SEMUA USER LOGIN
Route::middleware(['auth', 'verified'])->group(function () {

    // Redirect root
    Route::get('/', fn () => redirect('/dashboard'));

    // dashboard redirect berdasarkan role
    Route::get('/dashboard', function () {
        return match (Auth::user()->role) {
            'admin'  => redirect('/admin'),
            'kepsek' => redirect('/kepsek'),
            'staf'   => redirect('/staf'),
            default  => abort(403),
        };
    })->name('dashboard');

    // ROUTE DASHBOARD ROLE
    Route::get('/admin', [DashboardController::class,'index']);
    Route::get('/kepsek', [DashboardController::class,'index']);
    Route::get('/staf', [DashboardController::class,'index']);

    // DATA BARANG (READ UTAMA)
    Route::get('/databarang', [InventarisController::class, 'dataBarang'])
        ->name('databarang');

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ADMIN SAJA
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/laporan/download', fn () => view('laporandownload'));

    Route::get('/notifikasi', fn () => view('notifikasi'));

    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

    Route::get('/manajemenuser', [UserController::class, 'index']);

    // button edit dan hapus manajemen user
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');

    Route::post('/user/update/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
});


// ADMIN + KEPALA SEKOLAH
Route::middleware(['auth', 'role:admin,kepsek'])->group(function () {

    Route::get('/kepsek', [DashboardController::class,'index'])->name('kepsek.dashboard');

    Route::get('/logaktivitas', [InventarisController::class, 'logAktivitas']);

    // laporan barang masuk
    Route::get('/laporan/barangmasuk', [LaporanController::class, 'barangMasuk']);
    Route::get('/laporan/barangmasuk/excel', [LaporanController::class, 'exportExcelBarangMasuk']);
    Route::get('/laporan/barangmasuk/pdf', [LaporanController::class, 'exportPdfBarangMasuk']);

    // laporan barang keluar
    Route::get('/laporan/barangkeluar', [LaporanController::class, 'barangKeluar']);
    Route::get('/laporan/barangkeluar/excel', [LaporanController::class, 'exportExcelBarangKeluar']);
    Route::get('/laporan/barangkeluar/pdf', [LaporanController::class, 'exportPdfBarangKeluar']);
    
});


// ADMIN + STAF
Route::middleware(['auth', 'role:admin,staf'])->group(function () {

    Route::get('/staf', [DashboardController::class,'index'])->name('staf.dashboard');

    // FORM BARANG
    Route::get('/barangmasuk', fn () => view('barangmasuk'))->name('barang.masuk');
    Route::get('/barangkeluar', fn () => view('barangkeluar'))->name('barang.keluar');

    // AKSI FORM
    Route::post('/inventaris', [InventarisController::class, 'store'])
        ->name('barang.store');
    
    Route::put('/barangkeluar', [InventarisController::class, 'barangKeluar'])
    ->name('barang.keluar.proses');

    Route::put('/inventaris/{id}', [InventarisController::class, 'update'])
        ->name('barang.update');

    Route::delete('/inventaris/{id}', [InventarisController::class, 'destroy'])
        ->name('barang.destroy');
});