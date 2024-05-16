<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        // dd($this->form);
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
};

?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
    <!-- component -->
    <div class="flex h-screen">
        <div class="flex items-center justify-around w-1/2 px-20 bg-gradient-to-tr from-red-600 to-slate-900">
            <div>
                <h1 class="font-sans text-4xl font-bold text-white">Gym Fitness</h1>
                <p class="mt-1 text-white">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil, blanditiis. Fugit libero consequatur laborum quas? Fugit tempora alias atque cum. Aperiam, sunt labore quibusdam quidem enim adipisci molestiae eum asperiores!</p>
            </div>
        </div>
        <div class="flex items-center justify-center w-1/2 bg-white">
            <form wire:submit.prevent="login" method="POST" class="bg-white w-96">
                @csrf
                
                <h1 class="mb-1 text-2xl font-bold text-gray-800">Hello Again!</h1>
                <p class="text-sm font-normal text-gray-600 mb-7">Welcome Back</p>

                <!-- Email Address -->
                <div class="flex items-center px-3 py-2 mb-4 border-2 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                    <input wire:model="form.email" class="w-full pl-2 border-none outline-none" type="email" name="email" id="email" placeholder="Email Address" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="flex items-center px-3 py-2 mb-4 border-2 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                    <input wire:model="form.password" class="w-full pl-2 border-none outline-none" type="password" name="password" id="password" placeholder="Password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mb-4">
                    <label for="remember" class="inline-flex items-center">
                        <input wire:model="form.remember" id="remember" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Login Button -->
                <button type="submit" class="block w-full py-2 mt-4 mb-2 font-semibold text-white bg-red-600 rounded-2xl">Login</button>

                @if (Route::has('password.request'))
                    <a class="ml-2 text-sm cursor-pointer hover:text-blue-500" href="{{ route('password.request') }}">
                        {{ __('Forgot Password ?') }}
                    </a>
                @endif
            </form>
        </div>
    </div>
</body>
</html>
