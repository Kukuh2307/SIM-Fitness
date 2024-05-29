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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <label for="nama_kelas" class="font-semibold">Nama Kelas</label>
                    <input type="text" id="nama_kelas" name="nama_kelas" wire:model.lazy="nama_kelas" class="mt-1 block w-full p-3 text-black rounded-lg border border-gray-200 focus:ring-2 focus:ring-red-600 focus:border-transparent" placeholder="Nama Kelas">
                    @error('nama_kelas') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="deskripsi" class="font-semibold">Deskripsi</label>
                    <textarea name="deskripsi" wire:model.lazy="deskripsi" class="w-full p-2 text-black bg-white rounded-lg border border-gray-200 focus:ring-2 focus:ring-red-600 focus:border-transparent" placeholder="Deskripsi" cols="5" rows="5"></textarea>
                    @error('deskripsi') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="biaya" class="font-semibold">Biaya</label>
                    <input type="number" id="biaya" name="biaya" wire:model.lazy="biaya" class="mt-1 block w-full p-3 text-black rounded-lg border border-gray-200 focus:ring-2 focus:ring-red-600 focus:border-transparent" placeholder="Biaya">
                    @error('biaya') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="id_instruktur" class="font-semibold">Instruktur</label>
                    <select id="id_instruktur" name="id_instruktur" wire:model.lazy="id_instruktur" class="mt-1 block w-full p-3 text-black rounded-lg border border-gray-200 focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        <option value="">Pilih Instruktur</option>
                        @foreach($instrukturs as $instruktur)
                            <option value="{{ $instruktur->id }}">{{ $instruktur->Nama }}</option>
                        @endforeach
                    </select>
                    @error('id_instruktur') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <label for="waktu_mulai" class="font-semibold">Waktu Mulai (format HH:MM)</label>
                    <input type="text" id="waktu_mulai" name="waktu_mulai" wire:model.lazy="waktu_mulai" class="mt-1 block w-full p-3 text-black rounded-lg border border-gray-200 focus:ring-2 focus:ring-red-600 focus:border-transparent" placeholder="Waktu Mulai (format HH:MM)">
                    @error('waktu_mulai') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="waktu_selesai" class="font-semibold">Waktu Selesai (format HH:MM)</label>
                    <input type="text" id="waktu_selesai" name="waktu_selesai" wire:model.lazy="waktu_selesai" class="mt-1 block w-full p-3 text-black rounded-lg border border-gray-200 focus:ring-2 focus:ring-red-600 focus:border-transparent" placeholder="Waktu Selesai (format HH:MM)">
                    @error('waktu_selesai') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="hari" class="font-semibold">Hari</label>
                    <select id="hari" name="hari" wire:model.lazy="hari" class="mt-1 block w-full p-3 text-black rounded-lg border border-gray-200 focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        <option value="">Pilih Hari</option>
                        @foreach($days as $d)
                            <option value="{{ $d }}">{{ $d }}</option>
                        @endforeach
                    </select>
                    @error('hari') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="kuota" class="font-semibold">Kuota</label>
                    <input type="number" id="kuota" name="kuota" wire:model.lazy="kuota" class="mt-1 block w-full p-3 text-black rounded-lg border border-gray-200 focus:ring-2 focus:ring-red-600 focus:border-transparent" placeholder="Kuota">
                    @error('kuota') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="foto" class="font-semibold">Foto</label>
                    @if($btnUpdate)
                        <input type="file" id="foto" name="foto" wire:model="foto" class="mt-1 block w-full p-3 text-black rounded-lg border border-gray-200 focus:ring-2 focus:ring-red-600 focus:border-transparent">
                        <img src="{{ asset('storage/'.$fotoLama) }}" class="w-32 h-32 mt-2 rounded-md" alt="Foto Kelas">
                    @else
                        <input type="file" id="fotoLama" name="fotoLama" wire:model="fotoLama" class="mt-1 block w-full p-2 text-black bg-white border border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-red-600 focus:ring-opacity-50">
                    @endif
                    @error('foto') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        
        <div class="flex justify-end mt-6">
            <button type="submit" class="px-6 py-2 text-white bg-red-600 rounded-full hover:bg-red-700 focus:ring-2 focus:ring-red-600 focus:ring-offset-2">
                {{ $btnUpdate ? 'Update' : 'Create' }}
            </button>
        </div>
    </form>
</div>
