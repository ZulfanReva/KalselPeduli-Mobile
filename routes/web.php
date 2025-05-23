<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenarikanDanaController;
use App\Http\Controllers\ProyekPenggalanganController;
use App\Http\Controllers\LaporanPenggalanganController;
use App\Http\Controllers\PemohonPenggalanganController;

Route::get('/', [FrontController::class, 'index'])->name('frontend.index');

Route::get('/kategori/{kategori}', [FrontController::class, 'kategori'])
    ->name('frontend.kategori');

Route::get('/detail/{proyekPenggalangan:slug}', [FrontController::class, 'detail'])
    ->name('frontend.detail');

Route::get('/kirim-dukungan/{proyekPenggalangan:slug}', [FrontController::class, 'dukungan'])
    ->name('frontend.kirim-dukungan');

Route::get('/pembayaran/{proyekPenggalangan:slug}/{jumlah_donasi}', [FrontController::class, 'pembayaran'])
    ->name('frontend.pembayaran');

Route::post('/pembayaran/store/{proyekPenggalangan:slug}/{jumlah_donasi}', [FrontController::class, 'store'])
    ->name('frontend.store');


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('kategori', KategoriController::class)
            ->middleware('role:owner');

        Route::resource('donatur', DonaturController::class)
            ->middleware('role:owner');

        Route::resource('pemohon_penggalangan', PemohonPenggalanganController::class)
            ->middleware('role:owner')->except('index');

        Route::get('pemohon_penggalangan', [PemohonPenggalanganController::class, 'index'])
            ->name('pemohon_penggalangan.index');

        Route::post('pemohon_penggalangan/daftar', [PemohonPenggalanganController::class, 'daftar'])
            ->name('pemohon_penggalangan.daftar');

        Route::resource('penarikan_dana', PenarikanDanaController::class)
            ->middleware('role:owner|pemohon_penggalangan');

        Route::post('/penarikan_dana/request/{proyekPenggalangan}', [PenarikanDanaController::class, 'store'])
            ->middleware('role:pemohon_penggalangan')
            ->name('penarikan_dana.store');

        Route::resource('laporan_penggalangan', LaporanPenggalanganController::class)
            ->middleware('role:owner|pemohon_penggalangan');

        Route::post('/laporan_penggalangan/store/{proyekPenggalangan}', [LaporanPenggalanganController::class, 'store'])
            ->middleware('role:pemohon_penggalangan')
            ->name('laporan_penggalangan.store');

        Route::get('/laporan_penggalangan/details/{penarikanDana}', [LaporanPenggalanganController::class, 'laporan_detail'])
            ->middleware('role:owner|pemohon_penggalangan')
            ->name('laporan_penggalangan.details');

        Route::resource('proyek_penggalangan', ProyekPenggalanganController::class)
            ->middleware('role:owner|pemohon_penggalangan');

        Route::post('/proyek_penggalangan/status_aktif/{proyek_penggalangan}', [ProyekPenggalanganController::class, 'status_aktif'])
            ->middleware('role:owner')
            ->name('proyek_penggalangan.status_aktif');
    });
});

require __DIR__ . '/auth.php';
