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

    @if($instrukturs->isEmpty())
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
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-bold text-white bg-blue-500 rounded-full">
                                {{ $instruktur->Spesialis }}
                            </span>
                        </td>
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
    @endif

    <div class="mt-4">
        {{ $instrukturs->links() }}
    </div>
</div>
