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
Route::middleware(['auth', 'verified', 'adminMiddleware'])->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'render'])->name('dashboard');
    Route::get('/informasi', [Informasi::class, 'render'])->name('informasi');
    Route::get('/kelas', [Kelas::class, 'render'])->name('kelas');
    Route::get('/instruktur', [Instruktur::class, 'render'])->name('instruktur');
    Route::get('/transaksi', [Transaksi::class, 'render'])->name('transaksi');
    Route::get('members', [Member::class, 'render'])->name('members');
    Route::get('listing-alat', [ListingAlat::class, 'render'])->name('list-alat');
    Route::get('transaksi', [Transaksi::class, 'render'])->name('transaksi');
});


// USER
Route::middleware(['auth', 'verified', 'userMiddleware'])->group(function () {
    Route::get('user-dashboard', [ContentDashboard::class, 'render'])->name('user.home');
    Route::get('user-transaksi-harian', [TransaksiHarian::class, 'render'])->name('transaksi-harian');
    Route::get('user-join-kelas', [JoinKelas::class, 'render'])->name('user.join-kelas');
});


require __DIR__ . '/auth.php';
