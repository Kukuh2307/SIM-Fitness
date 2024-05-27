<div>
    
    <table class="min-w-full bg-white ">
        <thead>
            
            <tr>
                <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-700">Id</th>
                <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-700">Nama Alat</th>
                <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-700">Jumlah</th>
                <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-700">Kondisi</th>
                <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-700">Picture</th>
                <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-right text-sm font-semibold text-gray-700">Actions</th>                                       
            </tr>
        </thead>
        <tbody>
            @foreach ($alats as $alat)
                
            <tr>
                <td class="py-2 px-4 border-b border-gray-200">{{$alat->id}}</td>
                <td class="py-2 px-4 border-b border-gray-200">{{$alat->Nama_Alat}}</td>
                <td class="py-2 px-4 border-b border-gray-200">{{$alat->Jumlah}}</td>
                <td class="py-2 px-4 border-b border-gray-200">{{$alat->Kondisi_Alat}}</td>
                <td class="py-2 px-4 border-b border-gray-200">
                    <img src="{{asset('storage/'.$alat->Foto)}}" alt="Treadmill" class="w-16 h-16 object-cover">
                </td>
                <td class="py-2 px-4 border-b border-gray-200 text-right flex justify-end space-x-2">
                    <button 
                        wire:click="edit({{$alat->id}})"
                        class="text-blue-600 hover:text-blue-800">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 4a8 8 0 100 16 8 8 0 000-16zm3 11h-2v2h-2v-2H9v-2h2v-2h2v2h2v2zm0-8.5V9H9V6h6zm-4.5 0H15V4.5H10.5V6zM6 19.5h12V21H6v-1.5z"></path>
                        </svg>
                    </button>
                    <button 
                        wire:click="delete({{$alat->id}})"
                        class="text-red-600 hover:text-red-800">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 6l3 18h12l3-18H3zm3-3h12v3H6V3z"></path>
                        </svg>
                    </button>
                </td>                                   
            </tr>
            @endforeach
                                
        </tbody>
    </table>
</div>


