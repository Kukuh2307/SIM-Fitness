<x-app-layout>
    <x-slot name="header">
        {{ __('Metode Pembayaran') }}
    </x-slot>
    <div class="h-screen mt-10">
        <div class="mx-auto max-w-[95rem] sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="container mx-auto mt-10">
                    <!-- Notification Banner -->
                    <div class="w-full p-4 mb-4 text-center text-white bg-red-600">
                        Selesaikan Pembayaran sampai 00 00 0000 00:00
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <!-- Payment Method Selection -->
                        <div class="bg-white rounded-lg shadow-md">
                            <div class="p-6">
                                <!-- Accordion: Bank Transfer Section -->
                                <div x-data="{ open: false }" class="mb-4">
                                    <button @click="open = !open" class="flex items-center w-full p-4 font-bold text-left text-gray-800 bg-gray-200 rounded-t-lg focus:outline-none">
                                        <span>Bank Transfer</span>
                                        <svg :class="{ 'transform rotate-180': open }" class="w-6 h-6 ml-auto transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                        </svg>
                                    </button>
                                    <div x-show="open" class="p-4 bg-gray-100">
                                        <p>Keterangan Bank</p>
                                    </div>
                                </div>

                                <!-- Accordion: Credit Card Section -->
                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="flex items-center w-full p-4 font-bold text-left text-gray-800 bg-green-200 rounded-t-lg focus:outline-none">
                                        <span>Credit Card</span>
                                        <svg :class="{ 'transform rotate-180': open }" class="w-6 h-6 ml-auto transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                        </svg>
                                    </button>
                                    <div x-show="open" class="p-4 bg-gray-100">
                                        <div class="flex items-center">
                                            <img src="{{ asset('images/logo-bank.png') }}" alt="gambar bank">
                                            {{-- <img src="path-to-visa-logo" alt="Visa" class="w-12 h-auto">
                                            <img src="path-to-american-express-logo" alt="American Express" class="w-12 h-auto">
                                            <img src="path-to-paypal-logo" alt="Paypal" class="w-12 h-auto"> --}}
                                        </div>
                                        <form>
                                            <div class="mb-4">
                                                <label for="card_number" class="block mb-2 text-sm font-bold text-gray-700">Card Number</label>
                                                <input type="text" id="card_number" class="w-full px-3 py-2 border border-gray-300 rounded-lg" placeholder="4480 0000 0000 0000">
                                            </div>
                                            <div class="mb-4">
                                                <label for="card_holder_name" class="block mb-2 text-sm font-bold text-gray-700">Card Holder Name</label>
                                                <input type="text" id="card_holder_name" class="w-full px-3 py-2 border border-gray-300 rounded-lg" placeholder="Your Name">
                                            </div>
                                            <div class="grid grid-cols-2 gap-4 mb-4">
                                                <div>
                                                    <label for="cvv" class="block mb-2 text-sm font-bold text-gray-700">CVV</label>
                                                    <input type="text" id="cvv" class="w-full px-3 py-2 border border-gray-300 rounded-lg" placeholder="000">
                                                </div>
                                                <div>
                                                    <label for="expiry_date" class="block mb-2 text-sm font-bold text-gray-700">Expiry Date</label>
                                                    <input type="text" id="expiry_date" class="w-full px-3 py-2 border border-gray-300 rounded-lg" placeholder="07/24">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Summary -->
                        <div class="bg-white rounded-lg shadow-md">
                            <div class="p-6">
                                <h3 class="mb-4 text-lg font-semibold text-gray-800">Pembayaran Kelas</h3>
                                <div class="flex items-center mb-4">
                                    <img src="path-to-course-image" alt="Course Image" class="w-16 h-16 mr-4 rounded-lg">
                                    {{-- <div>
                                        <p class="text-sm font-semibold text-gray-600">Yoga</p>
                                        <p class="text-xs text-gray-500">text tambahan</p>
                                        <p class="text-xs text-gray-500">text tambahan</p> 
                                    </div> --}}
                                </div>
                                <div class="mb-4">
                                    <div class="flex justify-between mb-2">
                                        <span class="text-sm text-gray-600">Harga</span>
                                        <span class="text-sm text-gray-800">Rp 000.000</span>
                                    </div>
                                    <div class="flex justify-between mb-2">
                                        <span class="text-sm text-gray-600">PPN 11%</span>
                                        <span class="text-sm text-gray-800">Rp 00.000</span>
                                    </div>
                                    <div class="flex justify-between mb-2">
                                        <span class="text-sm text-gray-600">Total Bayar</span>
                                        <span class="text-sm text-red-600">Rp 000.000</span>
                                    </div>
                                </div>
                                <button class="w-full px-4 py-2 font-bold text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-opacity-50">
                                    Bayar dan Ikuti Kelas
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
