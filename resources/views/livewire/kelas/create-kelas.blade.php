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
                <input type="text" name="nama_kelas" wire:model.lazy="nama_kelas" class="w-full p-2 text-black bg-white rounded-lg" placeholder="Nama Kelas">
                @error('nama_kelas') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                <textarea name="deskripsi" wire:model.lazy="deskripsi" class="w-full p-2 text-black bg-white rounded-lg" placeholder="Deskripsi" cols="5" rows="5"></textarea>
                @error('deskripsi') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                <input type="number" name="biaya" wire:model.lazy="biaya" class="w-full p-2 text-black bg-white rounded-lg" placeholder="Biaya">
                @error('biaya') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                <select name="id_instruktur" wire:model.lazy="id_instruktur" class="w-full p-2 text-black bg-white rounded-lg">
                    <option value="">Pilih Instruktur</option>
                    @if($btnUpdate && $id_instruktur)
                    @foreach($instrukturs as $instruktur)
                    <option value="{{ $instruktur->id }}" selected>{{ $instruktur->Nama }}</option>
                @endforeach
                    @else                        
                        @foreach($instrukturs as $instruktur)
                            <option value="{{ $instruktur->id }}">{{ $instruktur->Nama }}</option>
                        @endforeach
                    @endif
                </select>
                @error('id_instruktur') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col w-full gap-3 md:w-1/2">
                <input type="text" name="waktu_mulai" wire:model.lazy="waktu_mulai" class="w-full p-2 text-black bg-white rounded-lg" placeholder="Waktu Mulai (format HH:MM)">
                @error('waktu_mulai') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                <input type="text" name="waktu_selesai" wire:model.lazy="waktu_selesai" class="w-full p-2 text-black bg-white rounded-lg" placeholder="Waktu Selesai (format HH:MM)">
                @error('waktu_selesai') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                <select name="hari" wire:model.lazy="hari" class="w-full p-2 text-black bg-white rounded-lg">
                    <option value="">Pilih Hari</option>
                    @if ($btnUpdate && $hari)
                        @foreach($days as $d)
                        @if ($d == $hari)
                            <option value="{{ $hari }}" selected>{{ $hari }}</option>
                        @endif
                            <option value="{{ $d }}" selected>{{ $d }}</option>
                        @endforeach
                    @else
                        @foreach($days as $d)
                            <option value="{{ $d }}">{{ $d }}</option>
                        @endforeach
                    @endif
                </select>
                @error('hari') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                <input type="number" name="kuota" wire:model.lazy="kuota" class="w-full p-2 text-black bg-white rounded-lg" placeholder="Kuota">
                @error('kuota') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                @if($btnUpdate)
                    <input type="file" name="foto" wire:model="foto" class="w-full p-2 text-black bg-white rounded-lg" value="{{ $foto }}">
                    <img src="{{ asset('storage/'.$fotoLama) }}" class="w-32 h-32 mt-2 rounded-md" alt="Foto Kelas">
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
