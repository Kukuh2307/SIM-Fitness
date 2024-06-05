

<x-app-layout>
    <x-slot name="header">
        {{ __('Instruktur') }}
    </x-slot>

    <div class="container mx-auto p-4 sm:p-8 bg-gray-100 min-h-screen">
        
        {{-- Create Kelas Section --}}
        <div class="bg-white shadow-lg sm:rounded-lg p-6 mb-8">
            <div class="max-w-full">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Create Instruktur</h3>
                @livewire('instruktur.create-instruktur')
            </div>
        </div>

        {{-- Kelas Table Section --}}
        <div class="bg-white shadow-lg sm:rounded-lg p-6">
            <div class="max-w-full overflow-x-auto">
                <h3 class="bg-red-600 text-white px-4 py-2 rounded-t-lg font-bold mb-2">Daftar Instruktur</h3>
                @livewire('instruktur.instruktur-table')
            </div>
        </div>
        
    </div>
</x-app-layout>
