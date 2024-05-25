<?php

namespace App\Livewire\Instruktur;

use Livewire\Component;
use App\Models\Instruktur;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateInstruktur extends Component
{
    use WithFileUploads;
    public $nama;
    public $id_instruktur;
    public $email;
    public $deskripsi;
    public $spesialis;
    public $biaya;
    public $foto;
    public $fotoLama;
    public $btnUpdate = false;
    public $listeners = [
        'instruktur-edit' => 'loadInstruktur',
        'instruktur-delete' => 'delete',
    ];

    public function loadInstruktur($event)
    {
        $instruktur = Instruktur::find($event['id']);
        if ($instruktur) {
            $this->nama = $instruktur->Nama;
            $this->email = $instruktur->Email;
            $this->deskripsi = $instruktur->Deskripsi;
            $this->spesialis = $instruktur->Spesialis;
            $this->biaya = $instruktur->Biaya;
            $this->btnUpdate = true;
            $this->fotoLama = $instruktur->Foto;
            $this->id_instruktur = $instruktur->id;
        }
    }

    public function store()
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required|email',
            'deskripsi' => 'required',
            'spesialis' => 'required',
            'biaya' => 'required',
            'fotoLama' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
        $messages = [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus berformat email',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'spesialis.required' => 'Spesialis harus diisi',
            'biaya.required' => 'Biaya harus diisi',
            'fotoLama.required' => 'Foto harus diisi',
            'fotoLama.image' => 'File harus berupa gambar',
            'fotoLama.max' => 'File terlalu besar',
            'fotoLama.mimes' => 'File harus jpeg,png,jpg',
        ];
        $this->validate($rules, $messages);
        Instruktur::create([
            'Nama' => $this->nama,
            'Email' => $this->email,
            'Deskripsi' => $this->deskripsi,
            'Spesialis' => $this->spesialis,
            'Biaya' => $this->biaya,
            'Foto' => $this->fotoLama->store('images', 'public'),
        ]);
        $this->reset(['nama', 'email', 'deskripsi', 'spesialis', 'biaya', 'fotoLama', 'btnUpdate']);
        $this->dispatch('InstrukturAdded');
        session()->flash('success', 'Instruktur Berhasil ditambnahkan');
    }

    public function update()
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required|email',
            'deskripsi' => 'required',
            'spesialis' => 'required',
            'biaya' => 'required',
            'foto' => 'nullable',
        ];
        $messages = [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus berformat email',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'spesialis.required' => 'Spesialis harus diisi',
            'biaya.required' => 'Biaya harus diisi',
        ];

        $this->validate($rules, $messages);
        $data = Instruktur::find($this->id_instruktur);
        if ($data) {
            if ($this->foto && $this->foto instanceof \Illuminate\Http\UploadedFile) {
                $fotoPath = $this->foto->store('images', 'public');
            } elseif ($this->foto && $this->foto !== $data->Foto) {
                Storage::delete($data->Foto);
                $fotoPath = $this->foto->store('images', 'public');
            } else {
                $fotoPath = $data->Foto;
            }

            $data->update([
                'Nama' => $this->nama,
                'Email' => $this->email,
                'Deskripsi' => $this->deskripsi,
                'Spesialis' => $this->spesialis,
                'Biaya' => $this->biaya,
                'Foto' => $fotoPath,
            ]);
            $this->reset(['nama', 'email', 'deskripsi', 'spesialis', 'biaya', 'foto', 'btnUpdate']);
            $this->dispatch('InstrukturUpdated');
            session()->flash('success', 'Instruktur Berhasil diupdate');
        }
    }

    public function delete($id)
    {
        $data = Instruktur::where('id', $id)->first();
        if ($data) {
            $data->delete();
            $this->dispatch('InstrukturDeleted');
            $this->reset(['nama', 'email', 'deskripsi', 'spesialis', 'biaya', 'btnUpdate']);
            session()->flash('success', 'Instruktur Berhasil dihapus');
        } else {
            session()->flash('error', 'Instruktur tidak ditemukan');
        }
    }

    public function render()
    {
        return view('livewire.instruktur.create-instruktur', []);
    }
}
