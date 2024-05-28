<div class="overflow-x-auto">
    <table class="min-w-full my-4 divide-y divide-gray-200">
        <div class="flex items-center justify-between mb-6">
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
