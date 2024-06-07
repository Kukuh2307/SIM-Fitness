<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Livewire\Alat;
use App\Livewire\Dashboard;
use App\Livewire\Informasi;
use App\Livewire\InvoiceMenu;
use App\Livewire\Order;
use App\Livewire\DailyMembers;
use App\Livewire\InvoiceHarian;

Route::view('/', 'landingpage.home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified', 'admin'])
//     ->name('dashboard');

Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('dashboard');
Route::get('dashboard', [Dashboard::class, 'render'])->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth', 'admin'])
    ->name('profile');



Route::get('/admin.listing-alat', [Alat::class, 'render'])->name('admin.listing-alat');
Route::get('/membership', [Order::class, 'render'])->name('membership');
Route::post('/create-invoice',[Order::class, 'createInvoice'])->name('createInvoice');
Route::get("/invoice-menu", [InvoiceMenu::class , 'render'])->name('invoice-menu');

// daily member
Route::post('/create-invoice-daily',[DailyMembers::class, 'createInvoice'])->name('createInvoiceDaily');
Route::get('daily-member', [DailyMembers::class, 'render'])->name('daily-member');
Route::get('invoice-harian',[InvoiceHarian::class, 'render'])->name('invoice-harian');



Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/informasi', [Informasi::class, 'render'])->name('employee');

require __DIR__ . '/auth.php';
