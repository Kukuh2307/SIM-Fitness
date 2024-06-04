<?php

use App\Livewire\Kelas;
use App\Livewire\Member;
use App\Livewire\Informasi;
use App\Livewire\Transaksi;
use App\Livewire\Instruktur;
use App\Livewire\ListingAlat;
use App\Livewire\Landingpage\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;


Route::view('/', 'livewire.landingpage.home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified', 'admin'])
//     ->name('dashboard');

Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth', 'admin'])
    ->name('profile');



Route::get('home', [Home::class, 'render'])->name('home');


// ADMIN
Route::get('/informasi', [Informasi::class, 'render'])->name('informasi');
Route::get('/kelas', [Kelas::class, 'render'])->name('kelas')->name('kelas');
Route::get('/instruktur', [Instruktur::class, 'render'])->name('instruktur');
Route::get('/transaksi', [Transaksi::class, 'render'])->name('transaksi');
Route::get('members', [Member::class, 'render'])->middleware(['auth', 'verified', 'admin'])->name('members');
Route::get('listing-alat', [ListingAlat::class, 'render'])->middleware(['auth', 'verified', 'admin'])->name('list-alat');
Route::get('transaksi', [Transaksi::class, 'render'])->middleware(['auth', 'verified', 'admin'])->name('transaksi');
Route::get('metode-pembayaran', [AdminController::class, 'metodePembayaran'])->middleware(['auth', 'verified', 'admin'])->name('metode-pembayaran');


require __DIR__ . '/auth.php';
