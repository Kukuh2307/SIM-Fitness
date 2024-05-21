<x-app-layout>
    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-20">
            
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="flex gap-2">
                    <div class="flex gap-2 items-center ">
                        <input type="text" wire:model="search" placeholder="Cari">
                      
                    </div>
                </div>
                <div class="max-w-[95rem] overflow-x-auto">
                    <table class="min-w-full mt-4 divide-y divide-gray-200 ">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('ID') }}</th>
                                
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Nama') }}</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Email') }}</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Tanggal_bergabung') }}</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Tanggal_Berakhir') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataMember as $key => $value)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $value->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $value->nama }}</td>
                                    <td class="max-w-xs px-6 py-4 truncate">{{ $value->email }}</td>
                                    <td class="max-w-xs px-6 py-4 truncate">{{ $value->Tanggal_bergabung }}</td>
                                    <td class="max-w-xs px-6 py-4 truncate">{{ $value->Tanggal_Berakhir }}</td>
                                    <td class="flex gap-2 px-6 py-4">
                                        <button class="text-green-500">Edit</button>
                                        <button class="text-red-500">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
               <div class="mt-4">
                {{$dataMember->links()}}
               </div>
            </div>
        </div>
    </div>
</x-app-layout>

