<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Kelas') }}
        </h2>
    </x-slot>
    <div class="py-12">

        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
            <div class="max-w-[95rem]">
                @livewire('kelas.create-kelas')
            </div>
        </div>
        <div class="py-6">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-[95rem]">
                    @livewire('kelas.kelas-table')
                </div>
            </div>
        </div>
    </div>
