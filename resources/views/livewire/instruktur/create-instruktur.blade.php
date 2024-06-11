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

    <form wire:submit.prevent="{{ $btnUpdate ? 'update' : 'store' }}">
        @csrf
        <div class="flex items-start gap-4">
            <div class="flex flex-col w-full gap-3 md:w-1/2">
                <input type="text" name="nama" wire:model.lazy="nama" class="w-full p-2 text-black bg-white rounded-lg" placeholder="Nama">
                @error('nama') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                <input type="email" name="email" wire:model.lazy="email" class="w-full p-2 text-black bg-white rounded-lg" placeholder="Email">
                @error('email') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                <textarea name="deskripsi" wire:model.lazy="deskripsi" class="w-full p-2 text-black bg-white rounded-lg" placeholder="Deskripsi" cols="5" rows="5"></textarea>
                @error('deskripsi') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col w-full gap-3 md:w-1/2">
                <select id="spesialis" name="spesialis" wire:model.lazy="spesialis" class="block w-full p-3 mt-1 text-black border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent">
                    <option value="">Pilih Spesialis</option>
                    @foreach($spesialisOptions as $s)
                        <option value="{{ $s->Nama_Kelas }}" {{ $spesialis == $s->Nama_Kelas ? 'selected' : '' }}>{{ $s->Nama_Kelas }}</option>
                    @endforeach
                    {{-- <option value="other" {{ $spesialis == 'other' ? 'selected' : '' }}>Other</option> --}}
                </select>
                {{-- @if ($spesialis == 'other')
                <input type="text" id="spesialis_other" name="spesialis_other" wire:model.defer="spesialis_other" class="block w-full p-3 mt-1 text-black border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent" placeholder="Input spesialis lainnya">
                @endif --}}
                @error('spesialis') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                <input type="number" name="biaya" wire:model.lazy="biaya" class="w-full p-2 text-black bg-white rounded-lg" placeholder="Biaya">
                @error('biaya') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                @if($btnUpdate)
                    <input type="file" name="foto" wire:model="foto" class="w-full p-2 text-black bg-white rounded-lg">
                    <img src="{{ asset('storage/'.$fotoLama) }}" class="w-32 h-32 mt-2 rounded-md" alt="Foto Instruktur">
                @else
                    <input type="file" name="fotoLama" wire:model="fotoLama" class="w-full p-2 text-black bg-white rounded-lg">
                @endif
                @error('foto') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex justify-end mt-3">
            <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded-full">
                {{ $btnUpdate ? 'Update' : 'Create' }}
            </button>
        </div>
    </form>
</div>
