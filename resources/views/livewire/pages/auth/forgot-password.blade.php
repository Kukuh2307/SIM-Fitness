<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        $status = Password::sendResetLink(
            ['email' => $this->email]
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));
            return;
        }

        $this->reset('email');
        session()->flash('status', __($status));
    }
};
?>
          @vite(['resources/css/app.css', 'resources/js/app.js'])
          @livewireStyles
<div class="bg-gradient-to-tr from-red-600 to-slate-900">
    <div class="flex items-center justify-center h-screen">
        <div class="flex w-5/6 overflow-hidden bg-white shadow-lg h-5/6 rounded-2xl">
            <div class="relative flex items-center justify-around w-1/2 px-20 bg-center bg-cover" style="background-image: url('{{ asset('assets/img-19.jpg') }}');">
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-tr from-red-600/70 to-slate-900/70"></div>
                <div class="relative z-10 p-10 text-center max-w-4/5">
                    <h1 class="font-sans text-4xl font-bold text-white">Forgot Password</h1>
                    <p class="mt-4 text-white">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                </div>
            </div>
            <div class="flex items-center justify-center w-1/2 p-10 bg-white">
                <form wire:submit.prevent="sendPasswordResetLink" class="w-full max-w-md bg-white">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    
                    @csrf

                    <h1 class="mb-1 text-2xl font-bold text-gray-800">Forgot Password?</h1>
                    <p class="text-sm font-normal text-gray-600 mb-7">No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

                    <!-- Email Address -->
                    <div class="flex items-center px-3 py-2 mb-4 border-2 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                        <input wire:model="email" class="w-full pl-2 border-none outline-none" type="email" name="email" id="email" placeholder="Email Address" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Email Password Reset Link') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
