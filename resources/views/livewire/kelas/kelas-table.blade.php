<div class="overflow-x-auto">
    <table class="min-w-full my-4 divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Nomor') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Foto') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Nama Kelas') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Biaya') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Instruktur') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Hari') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Kuota') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($kelas as $key => $data)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if ($data->Foto)
                            <img src="{{ Storage::url($data->Foto) }}" alt="{{ $data->Nama_Kelas }}" class="w-10 h-10 rounded-full">
                        @else
                            <span>{{ __('No Image') }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $data->Nama_Kelas }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $data->Biaya }}</td>
                    {{-- <td class="px-6 py-4 whitespace-nowrap">{{ $data->instruktur->Nama }}</td> --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $data->instruktur?->Nama ?? 'No Instructor' }}
                    </td>                    
                    <td class="px-6 py-4 whitespace-nowrap">{{ $data->Hari }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $data->Kuota }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex space-x-2">
                            <a wire:click='edit({{ $data->id }})' class="text-blue-500 cursor-pointer hover:text-blue-700">Edit</a>
                            <a wire:click='delete({{ $data->id }})' class="text-red-500 cursor-pointer hover:text-red-700">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $kelas->links() }}
    </div>
</div>