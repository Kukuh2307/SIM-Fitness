<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>
    <div class="h-screen mt-10">
        <div class="mx-auto max-w-[95rem] sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 gap-6 px-6 mb-8 md:grid-cols-2 lg:grid-cols-4">
                    @livewire('dashboard.member')
                    @livewire('dashboard.instructor')
                    @livewire('dashboard.kelas')
                    @livewire('dashboard.income')
                </div>
            
                <!-- Transactions Table -->
                <div class="p-6 bg-white shadow-lg sm:rounded-lg">
                    <div class="max-w-full overflow-x-auto">
                        <h3 class="px-4 py-2 mb-2 font-bold text-white bg-red-600 rounded-t-lg">Daftar Transaksi</h3>
                        @livewire('transaksi.transaksi-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


