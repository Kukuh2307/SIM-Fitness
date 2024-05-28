<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
            <div class="max-w-[95rem]">
                <div class="flex justify-between">
                    <h1 class="text-2xl font-bold text-red-600">Transaksi</h1>
                    <div class="relative">
                        <input type="text" placeholder="Search" wire:model.debounce.300ms="search" class="py-2 pl-8 pr-4 border border-gray-300 rounded-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                @livewire('transaksi.transaksi-table')
            </div>
        </div>
    </div>
</x-app-layout>
