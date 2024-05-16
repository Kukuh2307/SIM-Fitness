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

        event(new Registered($user));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <form wire:submit.prevent="register">
        <!-- Nama -->
        <div>
            <x-input-label for="nama" :value="__('Nama')" />
            <x-text-input wire:model="nama" id="nama" class="block mt-1 w-full" type="text" name="nama" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Foto -->
        <div class="mt-4">
            <x-input-label for="foto" :value="__('Foto')" />
            <input wire:model="foto" id="foto" class="block mt-1 w-full" type="file" name="foto" />
            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
        </div>

        <!-- Tanggal Bergabung -->
        <div class="mt-4">
            <x-input-label for="tanggal_bergabung" :value="__('Tanggal Bergabung')" />
            <x-text-input wire:model="tanggal_bergabung" id="tanggal_bergabung" class="block mt-1 w-full" type="date" name="tanggal_bergabung" required />
            <x-input-error :messages="$errors->get('tanggal_bergabung')" class="mt-2" />
        </div>

        <!-- Tanggal Berakhir -->
        <div class="mt-4">
            <x-input-label for="tanggal_berakhir" :value="__('Tanggal Berakhir')" />
            <x-text-input wire:model="tanggal_berakhir" id="tanggal_berakhir" class="block mt-1 w-full" type="date" name="tanggal_berakhir" required />
            <x-input-error :messages="$errors->get('tanggal_berakhir')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select wire:model="role" id="role" class="block mt-1 w-full" name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>

