<div class="py-4">
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

    <form wire:submit.prevent="{{ $btnUpdate ? 'update' : 'store' }}" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div>
                <label for="nama_alat" class="block text-sm font-medium text-gray-700">Nama Alat:</label>
                <input type="text" id="nama_alat" wire:model.lazy="nama_alat" class="w-full p-2 text-black bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent">
                @error('nama_alat') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah:</label>
                <input type="number" id="jumlah" wire:model.lazy="jumlah" class="w-full p-2 text-black bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent""block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                @error('jumlah') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="merk" class="block text-sm font-medium text-gray-700">Merk:</label>
                <input type="text" id="merk" wire:model.lazy="merk" class="w-full p-2 text-black bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent">
                @error('merk') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="kondisi" class="block text-sm font-medium text-gray-700">Kondisi:</label>
                <select name="kondisi" wire:model.lazy="kondisi" id="kondisi" class="w-full p-2 text-black bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent">
                    <option value="">Pilih Kondisi</option>
                    <option value="Baik">Baik</option>
                    <option value="Perlu Perbaikan">Perlu Perbaikan</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                </select>
                @error('kondisi') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="foto" class="block text-sm font-medium text-gray-700">Foto:</label>
                @if ($btnUpdate)
                    <input type="file" id="foto" wire:model="foto" class="w-full p-2 text-black bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent">
                    <img src="{{ asset('storage/'.$fotoLama) }}" class="w-32 h-32 mt-2 rounded-md" alt="foto Alat">
                @else
                    <input type="file" id="fotoLama" wire:model="fotoLama" class="w-full p-2 text-black bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent">
                    @endif
                    @error('foto') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end mt-4">
            <button type="submit" class="px-6 py-2 text-white bg-red-600 rounded-full hover:bg-red-700 focus:ring-2 focus:ring-red-600 focus:ring-offset-2">
                {{ $btnUpdate ? 'Update' : 'Create' }}
            </button>
        </div>
    </form>
</div>
