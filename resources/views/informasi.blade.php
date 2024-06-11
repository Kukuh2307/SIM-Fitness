<x-app-layout>
    <x-slot name="header">
        {{ __('Informasi') }}
    </x-slot>

    <div class="container min-h-screen p-4 mx-auto bg-gray-100 sm:p-8">
        
        {{-- Input Section --}}
        <div class="p-6 mb-8 bg-white shadow-lg sm:rounded-lg">
            <div class="max-w-full">
                <h3 class="mb-4 text-lg font-semibold text-gray-700">Create Informasi</h3>
                @livewire('informasi.create-informasi')
            </div>
        </div>

        {{-- Table Section --}}
        <div class="p-6 bg-white shadow-lg sm:rounded-lg">
            <div class="max-w-full overflow-x-auto">
                <h3 class="px-4 py-2 mb-2 font-bold text-white bg-red-600 rounded-t-lg">Daftar Informasi</h3>
                @livewire('informasi.informasi-table')
            </div>
        </div>

    </div>
</x-app-layout>