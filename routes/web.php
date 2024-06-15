<?php

use App\Livewire\Kelas;
use App\Livewire\Member;
use GuzzleHttp\Middleware;
use App\Livewire\Dashboard;
use App\Livewire\Informasi;
use App\Livewire\Transaksi;
use App\Livewire\Instruktur;
use App\Livewire\ListingAlat;
use App\Livewire\Landingpage\Home;
use App\Livewire\User\DashboardUser;
use Illuminate\Support\Facades\Route;
use App\Livewire\User\Content\TransaksiHarian;
use App\Http\Controllers\Admin\AdminController;
use App\Livewire\User\Content\Dashboard as ContentDashboard;
use App\Livewire\User\Content\JoinKelas;

Route::redirect('/', 'home');

Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

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


// USER
Route::get('user-transaksi-harian', [TransaksiHarian::class, 'render'])->middleware(['auth', 'verified', 'user', 'member'])->name('transaksi-harian');
Route::get('user-dashboard', [ContentDashboard::class, 'render'])->middleware(['auth', 'verified', 'user', 'member'])->name('user.home');
Route::get('user-join-kelas', [JoinKelas::class, 'render'])->middleware(['auth', 'verified', 'user', 'member'])->name('user.join-kelas');


require __DIR__ . '/auth.php';
