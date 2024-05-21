<?php

namespace App\Livewire\Informasi;

use App\Models\Informasi as InformasiModel;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreateInformasi extends Component
{
    public $informasi_id;
    public $judul;
    public $deskripsi;


    public $btnUpdate = false;

    // menangkap event dari tabel informasi
    protected $listeners = [
        'informasi-edit' => 'loadInformasi',
        'informasi-delete' => 'delete',
    ];

    // fungsi untuk mendapatkan id dan informasi lain  yang di edit dari komponent tabel informasi
    public function loadInformasi($event)
    {
        $informasi = InformasiModel::find($event['id']);
        if ($informasi) {
            $this->informasi_id = $informasi->id;
            $this->judul = $informasi->Judul;
            $this->deskripsi = $informasi->Deskripsi;
            $this->btnUpdate = true;
        }
    }

    public function store()
    {
        $id_user = Auth::id();
        $rules = [
            'judul' => 'required',
            'deskripsi' => 'required',
        ];
        $messages = [
            'judul.required' => 'Judul harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
        ];

        $this->validate($rules, $messages);
        // Simpan data
        InformasiModel::create([
            'id_user' => $id_user,
            'Judul' => $this->judul,
            'Deskripsi' => $this->deskripsi
        ]);

        // Clear the input fields
        $this->reset(['judul', 'deskripsi']);

        // Dispatch event setelah data berhasil disimpan untuk di kirim ke komponen lain
        $this->dispatch('informasiAdded');

        session()->flash('success', 'Informasi Berhasil disimpan');
    }

    public function update()
    {
        $id_user = Auth::id();
        $rules = [
            'judul' => 'required',
            'deskripsi' => 'required',
        ];
        $messages = [
            'judul.required' => 'Judul harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
        ];

        $this->validate($rules, $messages);
        $data = InformasiModel::find($this->informasi_id);
        $data->update([
            'id_user' => $id_user,
            'Judul' => $this->judul,
            'Deskripsi' => $this->deskripsi
        ]);
        $this->btnUpdate = false;
        $this->dispatch('informasiUpdated');
        $this->reset(['judul', 'deskripsi']);
        session()->flash('success', 'Informasi Berhasil diupdate');
    }

    public function delete($id)
    {
        $informasi = InformasiModel::where('id', $id)->first();
        if ($informasi) {
            $informasi->delete();
            session()->flash('success', 'Informasi Berhasil dihapus');
            $this->dispatch('informasiDeleted');
            // Optionally, you can reset form fields if needed
            $this->reset(['informasi_id', 'judul', 'deskripsi', 'btnUpdate']);
        } else {
            session()->flash('error', 'Informasi tidak ditemukan');
        }
    }


    public function render()
    {
        return view('livewire.informasi.create-informasi');
    }
}
