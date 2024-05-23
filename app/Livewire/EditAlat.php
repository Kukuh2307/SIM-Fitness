<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ListAlat;
use Illuminate\Support\Facades\Storage;
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

    public function update()
{
    $this->validate([
        'Nama_Alat' => 'required',
        'Jumlah' => 'required',
        'Kondisi_Alat' => 'required',
        'Foto' => 'nullable|image|max:1024',
        'Merk' => 'required',
    ]);

    try {
        if ($this->Foto) {
            if ($this->Foto->isFile()) {
                Storage::delete('public/' . $this->data_alat->Foto);
            }
            $filename = $this->Foto->store('uploads', 'public');
        } else {
            $filename = $this->data_alat->Foto;
        }

        ListAlat::where('id_alat', $this->id_alat)->update([
            'Nama_Alat' => $this->Nama_Alat,
            'Jumlah' => $this->Jumlah,
            'Kondisi_Alat' => $this->Kondisi_Alat,
            'Foto' => $filename,
            'Merk' => $this->Merk,
        ]);

        $this->reset('Foto');
        $this->Foto = $filename;

        return redirect()->to('/admin.listing-alat');
    } catch (\Exception $th) {
        dd($th);
    }
}

    

    public function render()
    {
        return view('livewire.edit-alat');
    }
}
