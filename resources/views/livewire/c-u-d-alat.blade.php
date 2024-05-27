<div>
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
    
    <form 
        wire:submit.prevent="{{ $btnUpdate ? 'update' : 'store' }}"
        class="bg-white p-4 rounded-lg shadow-md mb-8">
        @csrf
      
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="nama_alat" class="block text-sm font-medium text-gray-700">Nama Alat:</label>
                <input type="text" wire:model.lazy="nama_alat" id="nama_alat" name="nama_alat" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('nama_alat') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah:</label>
                <input type="text" wire:model.lazy="jumlah" name="jumlah" id="jumlah" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('jumlah') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="kondisi" class="block text-sm font-medium text-gray-700">Kondisi:</label>
                <input type="text" wire:model.lazy="kondisi" name="kondisi" id="kondisi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('kondisi') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                @if($btnUpdate)
                    <label for="picture" class="block text-sm font-medium text-gray-700">Picture:</label>
                    <input type="file" wire:model="foto_baru" id="picture" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{$foto_pertama}}">
                    
                @else
                    <input type="file" name="foto_pertama" wire:model="foto_pertama" class="w-full p-2 text-black bg-white rounded-lg">
                @endif
                @error('foto') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end mt-4">
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md shadow hover:bg-red-700">{{$btnUpdate ? 'Update': 'Submit'}}</button>
        </div>
    </form>
    
</div>
