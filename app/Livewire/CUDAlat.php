<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ListAlat;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CUDAlat extends Component
{
    use WithFileUploads;
    
    public $nama_alat;
    public $jumlah;
    public $kondisi;
    public $foto_pertama;
    public $foto_baru;
    public $id;

    public $btnUpdate = false;

    public $listeners = [
        'alat-edit' => 'loadAlat',
        'alat-delete' => 'delete',
    ];

    
    public function loadAlat($event)
    {
        $alat = ListAlat::find($event['id']);
        if ($alat) {
            $this->nama_alat = $alat->Nama_Alat;
            $this->jumlah = $alat->Jumlah;
            $this->kondisi = $alat->Kondisi_Alat;
            $this->foto_baru = $alat->Foto;
            $this->id = $alat->id;
            $this->btnUpdate = true;
        }
    }

    public function update(){
        $rules = [
            'nama_alat' => 'required',
            'jumlah' => 'required',
            'kondisi' => 'required',
            'foto_pertama' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $messages = [
            'nama_alat.required' => 'Nama alat harus diisi',
            'jumlah.required' => 'Jumlah harus diisi',
            'kondisi.required' => 'Kondisi alat harus diisi',
        ];

        $validated= $this->validate($rules, $messages);
        $data = ListAlat::find($this->id);

        if ($data) {
            if ($this->foto_baru && $this->foto_baru instanceof \Illuminate\Http\UploadedFile) {
                $fotoPath = $this->foto_baru->store('alats', 'public');
            } elseif ($this->foto_baru && $this->foto_baru !== $data->Foto) {
                Storage::delete($data->Foto);
                $fotoPath = $this->foto_baru->store('alats', 'public');
            } else {
                $fotoPath = $data->Foto;
            }
        }

        ListAlat::where('id', $this->id)->update([
            'Nama_Alat'=>$this->nama_alat,
            'Jumlah' => $this->jumlah,
            'Kondisi_Alat' => $this->kondisi,
            'Foto' => $fotoPath,
        ]);
        $data->update($validated);
        $this->reset(['nama_alat', 'jumlah', 'kondisi', 'foto_pertama', 'btnUpdate']);
        $this->dispatch('AlatUpdated');
        session()->flash('success', 'Alat Berhasil diupdate');

    }

    public function store(){
        $rules = [
            'nama_alat' => 'required',
            'jumlah' => 'required',
            'kondisi' => 'required',
            'foto_pertama' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $messages = [
            'nama_alat.required' => 'Nama alat harus diisi',
            'jumlah.required' => 'Jumlah harus diisi',
            'kondisi.required' => 'Kondisi alat harus diisi',
            
            'foto_pertama.required' => 'Foto harus diisi',
            'foto_pertama.image' => 'File harus berupa gambar',
            'foto_pertama.max' => 'File terlalu besar',
            'foto_pertama.mimes' => 'File harus jpeg,png,jpg',
        ];

        $this->validate($rules, $messages);

        ListAlat::create([
            'Nama_Alat'=>$this->nama_alat,
            'Jumlah' => $this->jumlah,
            'Kondisi_Alat' => $this->kondisi,
            'Foto' => $this->foto_pertama->store('alats', 'public')
        ]);

        $this->reset(['nama_alat', 'jumlah', 'kondisi', 'foto_pertama', 'btnUpdate']);
        $this->dispatch('AlatCreated');
        session()->flash('success', 'Alat Berhasil ditambahkan');
    }

    public function delete($id)
    {
        $data = ListAlat::where('id', $id)->first();
        if ($data) {
            $data->delete();
            $this->dispatch('AlatDeleted');
            $this->reset(['nama_alat', 'jumlah', 'kondisi', 'foto_pertama', 'btnUpdate']);
            session()->flash('success', 'Alat Berhasil dihapus');
        } else {
            session()->flash('error', 'Alat tidak ditemukan');
        }
    }

    public function render()
    {
        return view('livewire.c-u-d-alat');
    }
}
