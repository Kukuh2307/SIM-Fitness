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
use App\Livewire\Informasi;
use App\Livewire\Kelas;
use App\Livewire\Instruktur;

Route::redirect('/', 'home');

Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth', 'admin'])
    ->name('profile');

Route::get('home', [Home::class, 'render'])->name('home');


// ADMIN
Route::get('/dashboard', [Dashboard::class, 'render'])->middleware(['auth', 'verified', 'admin'])->name('dashboard');
Route::get('/informasi', [Informasi::class, 'render'])->middleware(['auth', 'verified', 'admin'])->name('informasi');
Route::get('/kelas', [Kelas::class, 'render'])->Middleware(['auth', 'verified', 'admin'])->name('kelas');
Route::get('/instruktur', [Instruktur::class, 'render'])->middleware(['auth', 'verified', 'admin'])->name('instruktur');
Route::get('/transaksi', [Transaksi::class, 'render'])->middleware(['auth', 'verified', 'admin'])->name('transaksi');
Route::get('members', [Member::class, 'render'])->middleware(['auth', 'verified', 'admin'])->name('members');
Route::get('listing-alat', [ListingAlat::class, 'render'])->middleware(['auth', 'verified', 'admin'])->name('list-alat');
Route::get('transaksi', [Transaksi::class, 'render'])->middleware(['auth', 'verified', 'admin'])->name('transaksi');


Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/kelasUser', [kelasUser::class, 'render'])->name('kelasUser');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', UserDashboard::class)->name('profile.dashboard');
});
require __DIR__ . '/auth.php';
