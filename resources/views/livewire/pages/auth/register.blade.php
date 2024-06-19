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
            'role' => ['required', 'in:admin,user'],
        ]);

        // Handle file upload
        if ($this->foto) {
            $validated['foto'] = $this->foto->store('fotos', 'public');
        }

        // Hash the password
        $validated['password'] = Hash::make($validated['password']);

        // Create the user
        $user = User::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'Foto' => $validated['foto'] ?? null,
            'Role' => $validated['role'],
        ]);

        $user->assignRole($validated['role']);

        event(new Registered($user));

        Auth::login($user);

        $this->redirect(route('home', absolute: false), navigate: true);
    }
};
?>
{{-- <div class="bg-gradient-to-tr from-red-600 to-slate-900">
    <div class="flex items-center justify-center h-screen">
        <div class="flex w-5/6 overflow-hidden bg-white shadow-lg h-5/6 rounded-container">
            <div class="flex items-center justify-center w-1/2 p-10 bg-white">
                <form wire:submit.prevent="register" method="POST" class="w-full max-w-md bg-white" enctype="multipart/form-data">
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

                    <div class="flex items-center justify-between mt-6">
                        <button class="w-full px-6 py-2 text-sm text-white transition duration-300 bg-red-600 rounded-full hover:bg-red-700 focus:outline-none">Register</button>
                    </div>

                    <p class="mt-4 text-sm text-center">Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a></p>
                </form>
            </div>

            <div class="relative flex items-center justify-center w-1/2 px-20 bg-overlay">
                <div class="bg-gradient-overlay"></div>
                <div class="p-10 text-center content">
                    <h1 class="font-sans text-4xl font-bold text-white">FIT BANGET</h1>
                    <p class="mt-4 text-white">No pain, no gain. Push yourself because no one else is going to do it for you. Your body can stand almost anything. It’s your mind that you have to convince. Don’t stop when you’re tired. Stop when you’re done.</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="bg-gradient-to-tr from-red-600 to-slate-900">
    <div class="flex items-center justify-center h-screen">
        <div class="flex w-5/6 overflow-hidden bg-white shadow-lg h-5/6 rounded-2xl">
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

                    {{-- <!-- Tanggal Bergabung -->
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
                    </div> --}}

                    <div class="flex flex-col items-center justify-end mt-4">
                        <button type="submit" class="block w-full py-2 mt-4 font-semibold text-white bg-red-600 rounded-2xl">Register</button>
                        <a class="mt-3 text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                </form>
            </div>
            <div class="relative flex items-center justify-around w-1/2 px-20 bg-center bg-cover" style="background-image: url('{{ asset('assets/img-7.jpg') }}');">
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-tr from-red-600/70 to-slate-900/70"></div>
                <div class="relative z-10 p-10 text-center max-w-4/5">
                    <h1 class="font-sans text-4xl font-bold text-white">FIT BANGET</h1>
                    <p class="mt-4 text-white">Unlock your full potential at Fit Banget. Join our community to enjoy personalized training programs, modern equipment, and a supportive environment. Let's work together to achieve your health and fitness goals. Sign up today and start your transformation!</p>
                </div>
            </div>
        </div>
    </div>
</div>

