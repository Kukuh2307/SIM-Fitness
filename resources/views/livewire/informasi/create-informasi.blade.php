<div class="py-4">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
    @if (session()->has('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <form wire:submit.prevent="store">
        @csrf
        <div class="flex flex-col gap-3">
            <input type="text" name="judul" wire:model="judul" class="w-full p-2 text-black bg-white rounded-lg" placeholder="Judul">
            <textarea name="deskripsi" wire:model="deskripsi" id="deskripsi" cols="30" rows="10" class="w-full p-2 text-black bg-white rounded-lg"></textarea>
        </div>
        @if ($btnUpdate == true)
        <div class="flex justify-end mt-3">
            <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded-full" wire:click.prevent="update">Update</button>
        </div>
        @else
        <div class="flex justify-end mt-3">
            <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded-full">Create</button>
        </div>
        @endif
    </form>
</div>


 {{-- <div class="py-4">
    <div x-data="{ showSuccess: @entangle('session.success').defer, showErrors: @entangle('errors.any()').defer }" x-init="@this.on('informasiAdded', () => { setTimeout(() => showSuccess = false, 3000); })">
        <template x-if="showErrors">
            <div>
                @foreach ($errors->all() as $error)
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        </template>

        <template x-if="showSuccess">
            <div x-init="setTimeout(() => showSuccess = false, 3000)" class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                {{ session('success') }}
            </div>
        </template>
    </div>

    <form wire:submit.prevent="store">
        @csrf
        <div class="flex flex-col gap-3">
            <input type="text" name="judul" wire:model="judul" class="w-full p-2 text-black bg-white rounded-lg" placeholder="Judul">
            <textarea name="deskripsi" wire:model="deskripsi" id="deskripsi" cols="30" rows="10" class="w-full p-2 text-black bg-white rounded-lg"></textarea>
        </div>
        <div class="flex justify-end mt-3">
            <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded-full">Create</button>
        </div>
    </form>
</div> --}}

