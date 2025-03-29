<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanPenggalanganController;
use App\Http\Controllers\PemohonPenggalanganController;
use App\Http\Controllers\PenarikanDanaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyekPenggalanganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('kategori', KategoriController::class)
            ->middleware('role:owner');

        Route::resource('donatur', DonaturController::class)
            ->middleware('role:owner');

        Route::resource('pemohon_pelanggan', PemohonPenggalanganController::class)
            ->middleware('role:owner')->except('index');

        Route::get('pemohon_pelanggan', [PemohonPenggalanganController::class, 'index'])
            ->name('pemohon_pelanggan.index');

        Route::resource('penarikan_dana', PenarikanDanaController::class)
            ->middleware('role:owner|pemohon_penggalangan');

        Route::post('/penarikan_dana/request/{fundraising}', [PenarikanDanaController::class, 'store'])
            ->middleware('role:pemohon_penggalangan')
            ->name('penarikan_dana.store');

        Route::resource('laporan_penggalangan', LaporanPenggalanganController::class)
            ->middleware('role:owner|pemohon_penggalangan');

        Route::post('/laporan_penggalangan/update/{fundraising}', [LaporanPenggalanganController::class, 'store'])
            ->middleware('role:pemohon_penggalangan')
            ->name('laporan_penggalangan.store');

        Route::resource('proyek_penggalangan', ProyekPenggalanganController::class)
            ->middleware('role:owner|pemohon_penggalangan');

        Route::post('/proyek_penggalangan/active/{fundraising}', [ProyekPenggalanganController::class, 'activate_fundraising'])
            ->middleware('role:owner')
            ->name('fundraising_withdrawals.activate_fundraising');

        Route::post('/pemohon_penggalangan/apply', [DashboardController::class, 'apply_pemohon_penggalangan'])
            ->name('pemohon_penggalangan.apply');

        Route::get('/laporan_penggalangan', [DashboardController::class, 'laporan_penggalangan'])
            ->name('laporan_penggalangan');

        Route::get('/laporan_penggalangan/details/{fundraisingWithdrawal}', [DashboardController::class, 'laporan_penggalangan.details'])
            ->name('laporan_penggalangan.details');
    });
});

require __DIR__ . '/auth.php';
