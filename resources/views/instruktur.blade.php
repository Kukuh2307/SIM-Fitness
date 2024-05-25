<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Instruktur') }}
        </h2>
    </x-slot>
    {{-- input Judul --}}
    <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
        <div class="max-w-[95rem]">
            @livewire('instruktur.create-instruktur')
        </div>
    </div>
    <div class="py-6">
        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
            <div class="max-w-[95rem]">
                @livewire('instruktur.instruktur-table')
            </div>
        </div>
    </div>
</x-app-layout>
