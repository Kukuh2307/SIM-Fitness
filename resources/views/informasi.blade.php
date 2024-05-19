<x-app-layout>
    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-[95rem] overflow-x-auto">
                    <table class="min-w-full mt-4 divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('ID') }}</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('ID User') }}</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Judul') }}</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Deskripsi') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataInformasi as $key => $value)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $value->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $value->id_user }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $value->Judul }}</td>
                                    <td class="max-w-xs px-6 py-4 truncate">{{ $value->Deskripsi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
