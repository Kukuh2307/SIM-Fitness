<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Livewire\InformasiTable;
use App\Livewire\Informasi;
use App\Livewire\Member;

Route::view('/', 'landingpage.home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified', 'admin'])
//     ->name('dashboard');

Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth', 'admin'])
    ->name('profile');


// Route::get('/informasi', InformasiTable::class)->name('informasi');



Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/informasi', [Informasi::class, 'render'])->name('employee');
Route::get('admin.member', [Member::class, 'render'])->name('admin.member');

require __DIR__ . '/auth.php';
