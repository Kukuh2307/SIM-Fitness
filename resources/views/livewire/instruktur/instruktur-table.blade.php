<div class="overflow-x-auto">
    <table class="min-w-full my-4 divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Nomor') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Foto') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Nama') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Email') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Spesialis') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Biaya') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($instrukturs as $key => $instruktur)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if ($instruktur->Foto)
                            <img src="{{ Storage::url($instruktur->Foto) }}" alt="{{ $instruktur->Nama }}" class="w-10 h-10 rounded-full">
                        @else
                            <span>{{ __('No Image') }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $instruktur->Nama }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $instruktur->Email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $instruktur->Spesialis }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $instruktur->Biaya }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex space-x-2">
                            <a wire:click='edit({{ $instruktur->id }})' class="text-blue-500 cursor-pointer hover:text-blue-700">Edit</a>
                            <a wire:click='delete({{ $instruktur->id }})' class="text-red-500 cursor-pointer hover:text-red-700">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $instrukturs->links() }}
    </div>
</div>
