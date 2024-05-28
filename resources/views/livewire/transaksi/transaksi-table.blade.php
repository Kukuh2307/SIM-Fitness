<div class="overflow-x-auto">
    <div class="flex justify-between mb-4">
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

    <div>
        Search Value: {{ $search }}
    </div>

    <table class="min-w-full my-4 divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Nomor') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Nama User') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Nama Instruktur') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Nama Kelas') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Total Biaya') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Metode Pembayaran') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Status') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($transaksis as $key => $transaksi)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaksi->Nama_User }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaksi->Nama_Instruktur }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaksi->Nama_Kelas }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaksi->Total_Biaya }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaksi->Metode_Pembayaran }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $transaksi->Status }}</td>
                    @if ($transaksi->Status == 'pending')                        
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex space-x-2">
                            <a wire:click='approve({{ $transaksi->id }})' class="text-blue-500 cursor-pointer hover:text-blue-700">Approve</a>
                            <a wire:click='reject({{ $transaksi->id }})' class="text-red-500 cursor-pointer hover:text-red-700">Reject</a>
                        </div>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $transaksis->links() }}
    </div>
</div>
