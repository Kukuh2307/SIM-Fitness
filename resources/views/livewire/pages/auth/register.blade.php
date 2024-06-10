<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new #[Layout('layouts.guest')] class extends Component
{
    use WithFileUploads;
    public string $nama = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public $foto; // Properti untuk menangani file yang diunggah
    public string $tanggal_bergabung = '';
    public string $tanggal_berakhir = '';
    public string $role = 'user';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'foto' => ['image', 'max:1024'],
            'tanggal_bergabung' => ['required', 'date'],
            'tanggal_berakhir' => ['required', 'date'],
            'role' => ['required', 'in:admin,user'],
        ]);

        // Handle file upload
        $validated['foto'] = $this->foto->store('fotos', 'public');

        // Hash the password
        $validated['password'] = Hash::make($validated['password']);

        // Create the user
        $user = User::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'Foto' => $validated['foto'],
            'Tanggal_bergabung' => $validated['tanggal_bergabung'],
            'Tanggal_Berakhir' => $validated['tanggal_berakhir'],
            'Role' => $validated['role'],
        ]);

        $user->assignRole($validated['role']);

        event(new Registered($user));

        Auth::login($user);

        $this->redirect(route('home', absolute: false), navigate: true);
    }
}; ?>
    {{-- <form wire:submit.prevent="register">
        <!-- Nama -->
        <div>
            <x-input-label for="nama" :value="__('Nama')" />
            <x-text-input wire:model="nama" id="nama" class="block w-full mt-1" type="text" name="nama" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block w-full mt-1" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Foto -->
        <div class="mt-4">
            <x-input-label for="foto" :value="__('Foto')" />
            <input wire:model="foto" id="foto" class="block w-full mt-1" type="file" name="foto" />
            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
        </div>

        <!-- Tanggal Bergabung -->
        <div class="mt-4">
            <x-input-label for="tanggal_bergabung" :value="__('Tanggal Bergabung')" />
            <x-text-input wire:model="tanggal_bergabung" id="tanggal_bergabung" class="block w-full mt-1" type="date" name="tanggal_bergabung" required />
            <x-input-error :messages="$errors->get('tanggal_bergabung')" class="mt-2" />
        </div>

        <!-- Tanggal Berakhir -->
        <div class="mt-4">
            <x-input-label for="tanggal_berakhir" :value="__('Tanggal Berakhir')" />
            <x-text-input wire:model="tanggal_berakhir" id="tanggal_berakhir" class="block w-full mt-1" type="date" name="tanggal_berakhir" required />
            <x-input-error :messages="$errors->get('tanggal_berakhir')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}
    
    <div class="flex h-screen">
        <div class="flex items-center justify-center w-1/2 bg-white">
            <form wire:submit.prevent="register" method="POST" class="bg-white w-96">
                @csrf
                
                <h1 class="mb-1 text-2xl font-bold text-gray-800">Join Us!</h1>
                <p class="text-sm font-normal text-gray-600 mb-7">Create your account</p>

                <!-- Nama -->
                <div class="flex items-center px-3 py-2 mb-4 border-2 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                    <input wire:model="nama" id="nama" class="w-full pl-2 border-none outline-none" type="text" name="nama" placeholder="Nama" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="flex items-center px-3 py-2 mb-4 border-2 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                    <input wire:model="email" id="email" class="w-full pl-2 border-none outline-none" type="email" name="email" placeholder="Email" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="flex items-center px-3 py-2 mb-4 border-2 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                    <input wire:model="password" id="password" class="w-full pl-2 border-none outline-none" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="flex items-center px-3 py-2 mb-4 border-2 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                    <input wire:model="password_confirmation" id="password_confirmation" class="w-full pl-2 border-none outline-none" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Foto -->
                <div class="flex items-center px-3 py-2 mb-4 border-2 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 7a2 2 0 012-2h12a2 2 0 012 2M4 7a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2m-4 10h.01M12 12a4 4 0 110-8 4 4 0 010 8zm-4 6h8" />
                    </svg>
                    <input wire:model="foto" id="foto" class="w-full pl-2 border-none outline-none" type="file" name="foto" />
                    <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                </div>
                

                <!-- Tanggal Bergabung -->
                <div class="flex items-center px-3 py-2 mb-4 border-2 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V5a4 4 0 118 0v2a2 2 0 012 2v7a2 2 0 01-2 2H8a2 2 0 01-2-2V9a2 2 0 012-2zm4 0h.01M4 7a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2m-4 10h.01M12 12a4 4 0 110-8 4 4 0 010 8zm-4 6h8" />
                    </svg>
                    <input wire:model="tanggal_bergabung" id="tanggal_bergabung" class="w-full pl-2 border-none outline-none" type="date" name="tanggal_bergabung" required />
                    <x-input-error :messages="$errors->get('tanggal_bergabung')" class="mt-2" />
                </div>

                <!-- Tanggal Berakhir -->
                <div class="flex items-center px-3 py-2 mb-4 border-2 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V5a4 4 0 118 0v2a2 2 0 012 2v7a2 2 0 01-2 2H8a2 2 0 01-2-2V9a2 2 0 012-2zm4 0h.01M4 7a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2m-4 10h.01M12 12a4 4 0 110-8 4 4 0 010 8zm-4 6h8" />
                    </svg>
                    <input wire:model="tanggal_berakhir" id="tanggal_berakhir" class="w-full pl-2 border-none outline-none" type="date" name="tanggal_berakhir" required />
                    <x-input-error :messages="$errors->get('tanggal_berakhir')" class="mt-2" />
                </div>

                <div class="flex flex-col items-center justify-end mt-4">
                    <button type="submit" class="block w-full py-2 mt-4 font-semibold text-white bg-red-600 rounded-2xl">Register</button>
                    <a class="mt-3 text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                        {{ __('Already registered?') }}
                    </a>
                </div>
            </form>
        </div>
        <div class="flex items-center justify-around w-1/2 px-20 bg-gradient-to-tr from-red-600 to-slate-900">
            <div>
                <h1 class="font-sans text-4xl font-bold text-white">Gym Fitness</h1>
                <p class="mt-1 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, blanditiis. Fugit libero consequatur laborum quas? Fugit tempora alias atque cum. Aperiam, sunt labore quibusdam quidem enim adipisci molestiae eum asperiores!</p>
            </div>
        </div>
    </div>

