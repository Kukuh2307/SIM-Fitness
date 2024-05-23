<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ListAlat ;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class CreateAlat extends Component
{
    use WithFileUploads;

    public $id_alat;
    public $Nama_Alat;
    public $Jumlah;
    public $Kondisi_Alat;

    #[Rule('nullable|sometimes|image|max:1024')]
    public $Foto;

    public $Merk;

   

    public function create(){
        
        $this->valid_alatate([
            'id_alat'=>'required',
            'Nama_Alat'=> 'required',
            'Jumlah'=> 'required',
            'Kondisi_Alat'=> 'required',
            'Foto'=> 'required',
            'Merk'=> 'required',
        ]);

        try {

            $new_alat = new ListAlat;
            $new_alat->id_alat = $this->id_alat;
            $new_alat->Nama_Alat = $this->Nama_Alat;
            $new_alat->Jumlah = $this->Jumlah;
            $new_alat->Kondisi_Alat = $this->Kondisi_Alat;
            $new_alat->Merk = $this->Merk;
            $new_alat->Foto = $this->Foto;
            $new_alat->save();

            if($this->Foto){
                $this->Foto->store('uploads', 'public');
            }
    
    
            $this->reset('id_alat','Nama_Alat', 'Jumlah', 'Kondisi_Alat', 'Merk', 'Foto');

            return $this->redirect('admin.listing-alat');

        } catch (\Exception $e) {
            dd($e);
        }
    }

   
    

    public function render()
    {
        return view('livewire.create-alat');
    }
}
