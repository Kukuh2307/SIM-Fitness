<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-gray-900">
            {{ __('Kelas') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4 sm:p-8 bg-gray-100 min-h-screen">
        
        {{-- Create Kelas Section --}}
        <div class="bg-white shadow-lg sm:rounded-lg p-6 mb-8">
            <div class="max-w-full">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Create Kelas</h3>
                @livewire('kelas.create-kelas')
            </div>
        </div>

        {{-- Kelas Table Section --}}
        <div class="bg-white shadow-lg sm:rounded-lg p-6">
            <div class="max-w-full overflow-x-auto">
                <h3 class="bg-red-600 text-white px-4 py-2 rounded-t-lg font-bold mb-2">Daftar Kelas</h3>
                @livewire('kelas.kelas-table')
            </div>
        </div>
        
    </div>
</x-app-layout>
