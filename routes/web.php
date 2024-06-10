<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\TransaksiController;
use App\Livewire\Informasi;
use App\Livewire\Instruktur;
use App\Livewire\Kelas;
use App\Livewire\kelasUser;
use App\Livewire\UserDashboard;


Route::view('/', 'landingpage.home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified', 'admin'])
//     ->name('dashboard');

Route::get('/logout', [AdminController::class, 'logout'])
    ->name('logout');

Route::get('dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth', 'admin'])
    ->name('profile');



Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/informasi', [Informasi::class, 'render'])->name('informasi');
Route::get('/kelas', [Kelas::class, 'render'])->name('kelas')->name('kelas');
Route::get('/instruktur', [Instruktur::class, 'render'])->name('instruktur');

Route::get('members', [AdminController::class, 'members'])->middleware(['auth', 'verified', 'admin'])->name('members');
Route::get('list-alat', [AdminController::class, 'listAlat'])->middleware(['auth', 'verified', 'admin'])->name('list-alat');
Route::get('metode-pembayaran', [AdminController::class, 'metodePembayaran'])->middleware(['auth', 'verified', 'admin'])->name('metode-pembayaran');


Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/kelasUser', [kelasUser::class, 'render'])->name('kelasUser');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', UserDashboard::class)->name('profile.dashboard');
});
require __DIR__ . '/auth.php';
