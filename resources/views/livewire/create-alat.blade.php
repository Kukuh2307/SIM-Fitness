<div>
    <form  class="p-5 mx-auto lg:px-20" >
        <div class="flex gap-2 items-center mb-4">
            <label for="id_alat">ID</label>
            <input type="text" wire:model="id_alat" name="id_alat">
        </div>
        
        <div class="flex  gap-2 items-center mb-4">
            <label for="nama_alat">Nama Alat</label>
            <input type="text" wire:model="Nama_Alat" name="Nama_Alat">
        </div>
        <div class="flex gap-2 items-center mb-4">
            <label for="jumlah">Jumlah</label>
            <input type="text" wire:model="Jumlah" name="Jumlah">
        </div>
        <div class="flex gap-2 items-center mb-4">
            <label for="kondisi_alat">Kondisi Alat</label>
            <input type="text" wire:model="Kondisi_Alat" name="Kondisi_Alat">
        </div>
        <div class="flex gap-2 items-center mb-4">
            <label for="Merk">Merk</label>
            <input type="text" wire:model="Merk" name="Merk">
        </div>
        <div class="flex gap-2 items-center mb-4">
            <label for="foto">Foto</label>
            <input accept="image/png, image/jpeg, image/jpg" type="file" wire:model="Foto" name="foto">
        </div>
        <button wire:click.prevent="create" type="submit" class="px-6 py-2 bg-red-500 text-white rounded-full">Save</button>
    </form>
</div>
