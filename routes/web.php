<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonasiUserController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DonasiUserController::class, 'index'])->name('donasi.user');
Route::get('/donasi/{id}', [DonasiUserController::class, 'show'])->name('user.detail');
Route::get('/donatur/register/{id}', [DonasiUserController::class, 'register'])->name('donasi.register');
Route::post('/donasi/simpan', [DonasiUserController::class, 'storeDonatur'])->name('donasi.simpan');
Route::get('/donasi/konfirmasi/{id}', [DonasiUserController::class, 'konfirmasiDonasi'])->name('donasi.konfirmasi');

Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/donasi/index', [DonasiController::class, 'index'])->name('admin.donasi.index');
        Route::get('/donasi/create', [DonasiController::class, 'create'])->name('admin.donasi.create');
        Route::post('/donasi/store', [DonasiController::class, 'store'])->name('admin.donasi.store');
        Route::delete('/donasi/delete/{id}', [DonasiController::class, 'destroy'])->name('admin.donasi.destroy');

        // Transaksi
        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi.index');
        // Menampilkan form edit transaksi
        Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('admin.transaksi.edit');
        // Mengupdate transaksi
        Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('admin.transaksi.update');
        // Menghapus transaksi
        Route::get('/transaksi/{id}/delete', [TransaksiController::class, 'destroy'])->name('admin.transaksi.delete');
        // Toggle status bayar
        Route::get('/transaksi/{id}/bayar', [TransaksiController::class, 'editBayar'])->name('admin.transaksi.editBayar');
       
        // Laporan
        Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan.index');
        Route::get('/laporan/print', [LaporanController::class, 'print'])->name('admin.laporan.print');
    });
});
