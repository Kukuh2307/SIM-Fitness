<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('register', 'pages.auth.register')
        ->name('register');

    Volt::route('login', 'pages.auth.login')
        ->name('login');

    // Menggunakan Route::view untuk halaman forgot-password dan reset-password
    Route::view('forgot-password', 'livewire.pages.auth.forgot-password')
        ->name('password.request');

    Route::view('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');

    // Menggunakan Route::post untuk rute yang memanggil controller
    Route::post('forgot-password', [ForgotPasswordController::class, 'SendResetLinkEmail'])
        ->name('password.email');

    Route::post('reset-password', [ForgotPasswordController::class, 'reset'])
        ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');
});

