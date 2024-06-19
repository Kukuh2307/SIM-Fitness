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

    @if($alat->isEmpty())
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
                        <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                            @if ($data->Kondisi_Alat === 'Baik')
                                <span class="px-2 py-1 text-xs font-bold text-green-800 bg-green-200 rounded-full">Baik</span>
                            @elseif ($data->Kondisi_Alat === 'Perlu Perbaikan')
                                <span class="px-2 py-1 text-xs font-bold text-yellow-800 bg-yellow-200 rounded-full">Perlu Perbaikan</span>
                            @else
                                <span class="px-2 py-1 text-xs font-bold text-red-800 bg-red-200 rounded-full">Rusak Berat</span>
                            @endif
                        </td>
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
    @endif
</div>
