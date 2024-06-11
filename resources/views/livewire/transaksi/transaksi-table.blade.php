<div class="overflow-x-auto">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg alert dark:bg-red-200 dark:text-red-800" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
    @if (session()->has('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg alert dark:bg-green-200 dark:text-green-800" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-end mt-3 mb-4">
        <div class="relative mr-2">
            <input type="search" placeholder="Search" wire:model.live="search" aria-label="Search" class="py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
        </div>
    </div>

    @if($transaksis->isEmpty())
        <div class="flex items-center justify-center h-56 mt-4">
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v8m0 0v8m0-8h8m-8 0h-8m0 0v-8m8 8h8m-8 0h8"/>
                </svg>
                <div class="flex flex-col space-y-2">
                    <p class="text-2xl font-bold text-gray-400">Data not found</p>
                    <p class="text-gray-400">Data yang Anda cari tidak ditemukan</p>
                </div>
            </div>
        </div>
    @else
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
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="
                                @if ($transaksi->Status == 'success') text-green-500 
                                @elseif ($transaksi->Status == 'failed') text-red-500 
                                @elseif ($transaksi->Status == 'pending') text-yellow-500 
                                @elseif ($transaksi->Status == 'reject') text-gray-500 
                                @else text-blue-500 
                                @endif
                            ">
                                {{ $transaksi->Status }}
                            </span>
                        </td>
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
    @endif

    <div class="mt-4">
        {{ $transaksis->links() }}
    </div>
</div>
