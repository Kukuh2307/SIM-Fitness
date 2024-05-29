<div class="py-4 space-y-6">
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

    <form wire:submit.prevent="{{ $btnUpdate ? 'update' : 'store' }}">
        @csrf
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div class="flex flex-col gap-3">
                <label for="nama" class="font-semibold">Nama</label>
                <input type="text" id="nama" name="nama" wire:model.lazy="nama" class="w-full p-3 text-black rounded-lg border border-gray-200 focus:ring-2 focus:ring-red-600 focus:border-transparent" placeholder="Nama">
                @error('nama') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                <label for="email" class="font-semibold">Email</label>
                <input type="email" id="email" name="email" wire:model.lazy="email" class="w-full p-3 text-black rounded-lg border border-gray-200 focus:ring-2 focus:ring-red-600 focus:border-transparent" placeholder="Email">
                @error('email') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                <label for="deskripsi" class="font-semibold">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" wire:model.lazy="deskripsi" class="w-full p-3 text-black rounded-lg border border-gray-200 focus:ring-2 focus:ring-red-600 focus:border-transparent" placeholder="Deskripsi" cols="2" rows="2"></textarea>
                @error('deskripsi') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col gap-3">
                <label for="spesialis" class="font-semibold">Spesialis</label>
                <input type="text" id="spesialis" name="spesialis" wire:model.lazy="spesialis" class="w-full p-3 text-black rounded-lg border border-gray-200 focus:ring-2 focus:ring-red-600 focus:border-transparent" placeholder="Spesialis">
                @error('spesialis') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                <label for="biaya" class="font-semibold">Biaya</label>
                <input type="number" id="biaya" name="biaya" wire:model.lazy="biaya" class="w-full p-3 text-black rounded-lg border border-gray-200 focus:ring-2 focus:ring-red-600 focus:border-transparent" placeholder="Biaya">
                @error('biaya') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                <label for="foto" class="font-semibold">Foto</label>
                <input type="file" id="foto" name="foto" wire:model="foto" class="w-full p-3 text-black rounded-lg border border-gray-200 focus:ring-2 focus:ring-red-600 focus:border-transparent">
                @if($btnUpdate)
                    <img src="{{ asset('storage/'.$fotoLama) }}" class="w-32 h-32 mt-2 rounded-md" alt="Foto Instruktur">
                @endif
                @error('foto') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end mt-6">
            <button type="submit" class="px-6 py-2 text-white bg-red-600 rounded-full hover:bg-red-700 focus:ring-2 focus:ring-red-600 focus:ring-offset-2">
                {{ $btnUpdate ? 'Update' : 'Create' }}
            </button>
        </div>
    </form>
</div>
