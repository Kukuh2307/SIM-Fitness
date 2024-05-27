<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Listing Alat') }}
            </h2>
        </x-slot>
        <div class="overflow-hidden mt-10">
            <div class="mx-auto max-w-[95rem] sm:px-6 lg:px-20">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
    
                        <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-lg">
                            <div class="flex justify-between items-center mb-6">
                                <h1 class="text-2xl font-bold text-red-600">Listing Alat</h1>
                                <div class="relative">
                                    <input type="text" placeholder="Search" class="pl-8 pr-4 py-2 rounded-full border border-gray-300">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            {{-- CUD ALAT --}}
                            @livewire('c-u-d-alat',['id' => $alats])
    
                            <div class="bg-red-600 text-white px-4 py-2 rounded-t-lg font-bold mb-2">Listing Alat</div>
                            {{-- ALAT TABLE --}}
                            @livewire('show-alat')
                        </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
