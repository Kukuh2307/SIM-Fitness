<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase text-black-500">{{ __('Nomor') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase text-black-500">{{ __('Foto') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase text-black-500">{{ __('Nama Alat') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase text-black-500">{{ __('Jumlah') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase text-black-500">{{ __('Kondisi Alat') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase text-black-500">{{ __('Merk') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase text-black-500">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($alat as $key => $data)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ $loop->index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if ($data->Foto)
                            <img src="{{ Storage::url($data->Foto) }}" alt="{{ $data->Nama_Alat }}" class="w-10 h-10 rounded-full">
                        @else
                            <span class="text-sm text-black-500">{{ __('No Image') }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ $data->Nama_Alat }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ $data->Jumlah }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ $data->Kondisi_Alat }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ $data->Merk }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex space-x-2">
                            <button wire:click='edit({{ $data->id }})' class="text-sm text-blue-500 hover:text-blue-700 focus:outline-none focus:underline">Edit</button>
                            <button wire:click='delete({{ $data->id }})' class="text-sm text-red-500 hover:text-red-700 focus:outline-none focus:underline">Delete</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $alat->links('pagination::tailwind') }}
    </div>
</div>