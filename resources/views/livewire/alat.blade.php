<div>
    
    <x-app-layout>
       @livewire('create-alat')
       <div>
        <div class="py-12">
            <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-20">
                
                <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                 
                    <div class="max-w-[95rem] overflow-x-auto">
                        <table class="min-w-full mt-4 divide-y divide-gray-200 ">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('ID') }}</th>
                                    
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Nama Alat') }}</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Jumlah') }}</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Kondisi') }}</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Merk') }}</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alats as $alat)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $alat->id_alat }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $alat->Nama_Alat }}</td>
                                        <td class="max-w-xs px-6 py-4 truncate">{{ $alat->Jumlah }}</td>
                                        <td class="max-w-xs px-6 py-4 truncate">{{ $alat->Kondisi_Alat }}</td>
                                        <td class="max-w-xs px-6 py-4 truncate">{{ $alat->Merk }}</td>
                                        <td class="max-w-xs px-6 py-4 truncate">
                                            <img src="{{asset('storage/uploads/'.$alat->Nama_Alat)}}" alt="">
                                        </td>
                                        <td class="flex gap-2 px-6 py-4 items-center">
                                            
                                                <a 
                                                    href="admin.edit/{{$alat->id_alat}}"
                                                    wire:navigate
                                                    class="text-green-500">
                                                    Edit
                                                </a>
                                           
                                            <div>
                                                <form action="{{route('alat.destroy', $alat->id_alat)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button 
                                                
                                                type="submit"
                                                
                                                class="text-red-500">
                                                    Delete
                                                </button> 
                                                </form>
                                            </div>
                                          
                                           
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                           
                        </table>
                        
                    </div>
                   <div class="mt-4">
                    {{$alats->links()}}
                   </div>
                </div>
            </div>
        </div>
    </div>
       
    </x-app-layout>
    
    
</div>
