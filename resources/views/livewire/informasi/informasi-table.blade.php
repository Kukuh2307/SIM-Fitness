<div class="overflow-x-auto">
    <table class="min-w-full my-4 divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Nomor') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Judul') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Deskripsi') }}</th>
                <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-black-500 uppercase">{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($informations as $key => $information)
                <tr class="hover:bg-gray-50">
                    {{-- id hidden --}}
                    <td class="hidden px-6 py-4 whitespace-nowrap">{{ $information->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $information->Judul }}</td>
                    <td class="max-w-xs px-6 py-4 truncate">{{ $information->Deskripsi }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex space-x-2">
                            <a wire:click='edit({{ $information->id }})' class="text-blue-500 cursor-pointer hover:text-blue-700">Edit</a>
                            <a wire:click='delete({{ $information->id }})' class="text-red-500 cursor-pointer hover:text-red-700">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $informations->links() }}
    </div>
</div>
