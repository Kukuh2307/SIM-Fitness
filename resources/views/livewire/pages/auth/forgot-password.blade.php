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

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>



<div class="from-red-600 to-slate-800 bg-gradient-to-tr backdrop-blur-md w-screen h-screen">
    <div class="rounded-xl shadow-lg border-black border-1 shadow-slate-900 p-5 bg-white sm:w-[500px] fixed top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
        <div>
            <p class="text-xl font-bold ">Reset Password</p>
        </div>
        <div class="mb-4 text-sm ">
            {{ __('Lupa password? Tuliskan email anda untuk dikirimkan reset link') }}
        </div>
    
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
    
        <form wire:submit="sendPasswordResetLink">
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-white" />
                <x-text-input wire:model="email" id="email" class="block mt-1  w-full" type="email" name="email" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="bg-red-600 hover:bg-red-700 active:bg-red-800">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
