<div class="p-4 bg-white rounded-lg dark:bg-gray-800">
    <h3 class="mb-4 text-2xl font-semibold text-gray-900 dark:text-white">Transaksi Harian</h3>
    <div class="flex flex-col bg-white rounded-lg text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white md:flex-row">
        <a href="#" class="w-full px-4 py-4 mt-4 font-semibold text-center text-white bg-red-500 rounded hover:bg-red-600" wire:click.prevent="create">
            Pesan Sekarang
        </a>
    </div>
    @if (session()->has('message'))
        <div class="mt-4 text-green-500">
            {{ session('message') }}
        </div>
    @endif
</div>

