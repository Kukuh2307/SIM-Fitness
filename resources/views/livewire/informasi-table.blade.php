<div>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Daftar Informasi') }}
        </h2>
    </header>

    <table class="min-w-full mt-4 divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('ID') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('ID User') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Judul') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Deskripsi') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Created At') }}</th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Updated At') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($informasis as $informasi)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $informasi->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $informasi->id_user }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $informasi->Judul }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $informasi->Deskripsi }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $informasi->created_at }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $informasi->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
