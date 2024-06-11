<?php

namespace App\Livewire\ListingAlat;

use Livewire\Component;
use App\Models\ListingAlat;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateListingAlat extends Component
{
    use WithFileUploads;
    public $btnUpdate = false;
    public $alat_id;
    public $nama_alat;
    public $jumlah;
    public $kondisi;
    public $foto;
    public $fotoLama;
    public $merk;
    public $listeners = [
        'listing-alat-edit' => 'loadAlat',
        'listing-alat-delete' => 'delete',
    ];

    public function loadAlat($data)
    {
        $alat = ListingAlat::find($data['id']);
        // dd($alat);
        if ($alat) {
            $this->alat_id = $alat->id;
            $this->nama_alat = $alat->Nama_Alat;
            $this->kondisi = $alat->Kondisi_Alat;
            $this->merk = $alat->Merk;
            $this->jumlah = $alat->Jumlah;
            $this->btnUpdate = true;
            $this->fotoLama = $alat->Foto;
        }
    }

    public function store()
    {
        $rules = [
            'nama_alat' => 'required',
            'jumlah' => 'required',
            'kondisi' => 'required',
            'merk' => 'required',
            'fotoLama' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
        $messages = [
            'nama_alat.required' => 'Nama harus diisi',
            'jumlah.required' => 'Jumlah harus diisi',
            'kondisi.required' => 'Kondisi harus diisi',
            'merk.required' => 'Merk harus diisi',
            'fotoLama.required' => 'Foto harus diisi',
            'fotoLama.image' => 'File harus berupa gambar',
            'fotoLama.max' => 'File terlalu besar',
            'fotoLama.mimes' => 'File harus jpeg,png,jpg',
        ];
        $this->validate($rules, $messages);
        $alat = ListingAlat::create([
            'Nama_Alat' => $this->nama_alat,
            'Jumlah' => $this->jumlah,
            'Kondisi_Alat' => $this->kondisi,
            'Merk' => $this->merk,
            'Foto' => $this->fotoLama->store('images', 'public'),
        ]);
        $this->dispatch('listing-alat-store');
        $this->reset('nama_alat', 'kondisi', 'merk', 'picture', 'jumlah');
        session()->flash('success', 'Data Berhasil ditambahkan');
    }

    public function update()
    {
        $rules = [
            'nama_alat' => 'required',
            'jumlah' => 'required',
            'kondisi' => 'required',
            'merk' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
        $messages = [
            'nama_alat.required' => 'Nama harus diisi',
            'jumlah.required' => 'Jumlah harus diisi',
            'kondisi.required' => 'Kondisi harus diisi',
            'merk.required' => 'Merk harus diisi',
            'foto.image' => 'File harus berupa gambar',
            'foto.max' => 'File terlalu besar',
            'foto.mimes' => 'File harus jpeg,png,jpg',
        ];

        $this->validate($rules, $messages);

        $alat = ListingAlat::find($this->alat_id);
        if ($alat) {
            if ($this->foto && $this->foto instanceof \Illuminate\Http\UploadedFile) {
                // Hapus foto lama jika ada
                if ($alat->Foto && Storage::disk('public')->exists($alat->Foto)) {
                    Storage::disk('public')->delete($alat->Foto);
                }
                // Simpan foto baru
                $fotopath = $this->foto->store('images', 'public');
            } else {
                // Gunakan foto lama
                $fotopath = $alat->Foto;
            }

            $alat->update([
                'Nama_Alat' => $this->nama_alat,
                'Jumlah' => $this->jumlah,
                'Kondisi_Alat' => $this->kondisi,
                'Merk' => $this->merk,
                'Foto' => $fotopath,
            ]);

            $this->dispatch('AlatUpdated');
            $this->btnUpdate = false;
            $this->reset('nama_alat', 'kondisi', 'merk', 'foto', 'jumlah');
            session()->flash('success', 'Data Berhasil diupdate');
        }
    }

    public function delete($data)
    {
        $alat = ListingAlat::find($data['id']);
        if ($alat) {
            $alat->delete();
            $this->dispatch('AlatDeleted');
            $this->reset('nama_alat', 'kondisi', 'merk', 'foto', 'jumlah');
            session()->flash('success', 'Data Berhasil dihapus');
        }
    }

    public function render()
    {
        return view('livewire.listing-alat.create-listing-alat');
    }
}
