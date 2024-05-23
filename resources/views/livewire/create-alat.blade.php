<div>
    
    <form  class="p-5 mx-auto lg:px-20 " >
        <div class="flex gap-5">
            <div class="flex gap-2 items-center mb-4">
                
                <input type="text" wire:model="id_alat" name="id_alat" placeholder="ID Alat">
            </div>
            
            <div class="flex  gap-2 items-center mb-4">
                
                <input type="text" wire:model="Nama_Alat" name="Nama_Alat" placeholder="Nama Alat">
            </div>
            <div class="flex gap-2 items-center mb-4">
               
                <input type="text" wire:model="Jumlah" name="Jumlah" placeholder="Jumlah">
            </div>
        </div>
        <div class="flex gap-5">
            <div class="flex gap-2 items-center mb-4">
                <input type="text" wire:model="Kondisi_Alat" name="Kondisi_Alat" placeholder="Kondisi Alat">
            </div>
            <div class="flex gap-2 items-center mb-4">
                <input type="text" wire:model="Merk" name="Merk" placeholder="Merk">
            </div>
            <div class="flex gap-2 items-center mb-4">
                <input accept="image/png, image/jpeg, image/jpg" type="file" wire:model="Foto" name="foto">
            </div>
        </div>
        <button wire:click.prevent="create" type="submit" class="px-6 py-2 bg-red-500 text-white rounded-full">Save</button>
    </form>
    
</div>
