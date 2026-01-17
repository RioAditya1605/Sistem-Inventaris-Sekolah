<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route::get('/', function () {
//     return view('dashboardadmin');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contoh', function () {
    return view('contoh');
});

Route::get('/databarang', function () {
    return view('databarang');
});

Route::get('/barangmasuk', function () {
    return view('barangmasuk');
});

Route::get('/barangkeluar', function () {
    return view('barangkeluar');
});

Route::get('/laporanbarangmasuk', function () {
    return view('laporanbarangmasuk');
});

Route::get('/laporanbarangkeluar', function () {
    return view('laporanbarangkeluar');
});

Route::get('/logaktivitas', function () {
    return view('logaktivitas');
});

Route::get('/manajemenuser', function () {
    return view('manajemenuser');
});

require __DIR__.'/auth.php';
