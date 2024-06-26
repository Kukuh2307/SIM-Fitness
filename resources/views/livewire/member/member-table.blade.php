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
            <input type="search" placeholder="Search" wire:model.live="search" aria-label="Search" class="py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                {{-- <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"></path>
                </svg> --}}
            </div>
        </div>
    </div>

    @if($members->isEmpty())
        <div class="flex items-center justify-center h-56 mt-4">
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v8m0 0v8m0-8h8m-8 0h8"/>
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
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Foto') }}</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Nama Instruktur') }}</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Nama kelas') }}</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Tanggal Bergabung') }}</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Tanggal Berakhir') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($members as $key => $member)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->index + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $member->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="{{ asset('storage/' . $member->Foto) }}" alt="Foto User" class="w-10 h-10 rounded-full">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $member->Nama_Instruktur }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $member->Nama_Kelas }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $member->Tanggal_bergabung }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $member->Tanggal_Berakhir }}</td>             
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <div class="mt-4">

