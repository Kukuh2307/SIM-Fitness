<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Nomor') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Foto') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Nama Kelas') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Biaya') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Instruktur') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Hari') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Kuota') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($kelas as $key => $data)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if ($data->Foto)
                            <img src="{{ Storage::url($data->Foto) }}" alt="{{ $data->Nama_Kelas }}" class="w-10 h-10 rounded-full">
                        @else
                            <span class="text-sm text-black-500">{{ __('No Image') }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data->Nama_Kelas }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data->Biaya }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data->instruktur?->Nama ?? 'No Instructor' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data->Hari }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data->Kuota }}</td>
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
        {{ $kelas->links('pagination::tailwind') }}
    </div>
</div>
