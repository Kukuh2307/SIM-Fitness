

<x-app-layout>
    <x-slot name="header">
        {{ __('Instruktur') }}
    </x-slot>

    <div class="container min-h-screen p-4 mx-auto bg-gray-100 sm:p-8">
        
        {{-- Create Kelas Section --}}
        <div class="p-6 mb-8 bg-white shadow-lg sm:rounded-lg">
            <div class="max-w-full">
                <h3 class="mb-4 text-lg font-semibold text-gray-700">Create Instruktur</h3>
                @livewire('instruktur.create-instruktur')
            </div>
        </div>

        {{-- Kelas Table Section --}}
        <div class="p-6 bg-white shadow-lg sm:rounded-lg">
            <div class="max-w-full overflow-x-auto">
                <h3 class="px-4 py-2 mb-2 font-bold text-white bg-red-600 rounded-t-lg">Daftar Instruktur</h3>
                @livewire('instruktur.instruktur-table')
            </div>
        </div>
        
    </div>
</x-app-layout>
