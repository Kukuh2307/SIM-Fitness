<?php

namespace App\Livewire\Instruktur;

use Livewire\Component;
use App\Models\Instruktur;
use App\Models\Kelas;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CreateInstruktur extends Component
{
    use WithFileUploads;

    public $nama;
    public $id_instruktur;
    public $email;
    public $deskripsi;
    public $spesialis;
    public $spesialis_other;
    public $biaya;
    public $foto;
    public $fotoLama;
    public $btnUpdate = false;
    public $spesialisOptions = [];

    protected $listeners = [
        'instruktur-edit' => 'loadInstruktur',
        'instruktur-delete' => 'delete',
    ];

    public function loadInstruktur($event)
    {
        $instruktur = Instruktur::find($event['id']);
        if ($instruktur) {
            $this->id_instruktur = $instruktur->id;
            $this->nama = $instruktur->Nama;
            $this->email = $instruktur->Email;
            $this->deskripsi = $instruktur->Deskripsi;
            $this->spesialis = in_array($instruktur->Spesialis, $this->spesialisOptions->pluck('Nama_Kelas')->toArray()) ? $instruktur->Spesialis : 'other';
            $this->spesialis_other = $this->spesialis === 'other' ? $instruktur->Spesialis : null;
            $this->biaya = (int) $instruktur->Biaya;
            $this->btnUpdate = true;
            $this->fotoLama = $instruktur->Foto;
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
            'fotoLama.mimes' => 'File harus jpeg, png, jpg',
        ];

        $this->validate($rules, $messages);

        $spesialis = $this->spesialis == 'other' ? $this->spesialis_other : $this->spesialis;

        Instruktur::create([
            'Nama' => $this->nama,
            'Email' => $this->email,
            'Deskripsi' => $this->deskripsi,
            'Spesialis' => $spesialis,
            'Biaya' => $this->biaya,
            'Foto' => $this->fotoLama->store('images', 'public'),
        ]);

        $this->reset(['nama', 'email', 'deskripsi', 'spesialis', 'spesialis_other', 'biaya', 'fotoLama', 'btnUpdate']);
        $this->dispatch('InstrukturAdded');
        session()->flash('success', 'Instruktur Berhasil ditambahkan');
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
            $spesialis = $this->spesialis == 'other' ? $this->spesialis_other : $this->spesialis;

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
                'Spesialis' => $spesialis,
                'Biaya' => $this->biaya,
                'Foto' => $fotoPath,
            ]);

            $this->reset(['nama', 'email', 'deskripsi', 'spesialis', 'spesialis_other', 'biaya', 'foto', 'btnUpdate']);
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
        $this->spesialisOptions = Kelas::all();
        return view('livewire.instruktur.create-instruktur', [
            'spesialisOptions' => $this->spesialisOptions,
        ]);
    }
}
