<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ListAlat;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;


class EditAlat extends Component
{
    use WithFileUploads;

    public ListAlat $data_alat;

    public $id_alat;

    public $Nama_Alat;
    public $Jumlah;
    public $Kondisi_Alat;

    #[Rule('nullable|sometimes|image|max:1024')]
    public $Foto;

    public $Merk;

    public function mount($id_alat){
        $this->id_alat = $id_alat;

        $this->data_alat = ListAlat::where('id_alat', $id_alat)->first();
        $this->id_alat = $this->data_alat->id_alat;
            $this->Nama_Alat = $this->data_alat->Nama_Alat;
            $this->Jumlah = $this->data_alat->Jumlah;
            $this->Kondisi_Alat = $this->data_alat->Kondisi_Alat;
            $this->Merk = $this->data_alat->Merk;
            $this->Foto = $this->data_alat->Foto;
    }

    public function update(){
        $this->validate([
            
            'Nama_Alat'=> 'required',
            'Jumlah'=> 'required',
            'Kondisi_Alat'=> 'required',
            'Foto'=> 'required',
            'Merk'=> 'required',
        ]);



        try {
            ListAlat::where('id_alat',$this->id_alat)->update([
                'Nama_Alat' => $this->Nama_Alat,
                'Jumlah' => $this->Jumlah,
                'Kondisi_Alat' => $this->Kondisi_Alat,
                'Foto' => $this->Foto,
                'Merk' => $this->Merk,
            ]);

           
            
        } catch (\Exception $th) {
            dd($th);
        }
       
    }

    

    public function render()
    {
        return view('livewire.edit-alat');
    }
}
