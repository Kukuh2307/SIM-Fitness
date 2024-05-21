<?php

namespace App\Livewire\Informasi;

use App\Models\Informasi as InformasiModel;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreateInformasi extends Component
{
    public $judul;
    public $deskripsi;

    public function store()
    {
        // try {
        // } catch (\Throwable $th) {
        //     session()->flash('errors', $th->getMessage());
        // }

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

        InformasiModel::create([
            'id_user' => $id_user,
            'Judul' => $this->judul,
            'Deskripsi' => $this->deskripsi
        ]);

        // Clear the input fields
        $this->reset(['judul', 'deskripsi']);

        // Dispatch event setelah data berhasil disimpan untuk di kirim ke komponen lain
        $this->dispatchBrowserEvent('informasiAdded');

        session()->flash('success', 'Informasi Berhasil disimpan');
    }

    public function render()
    {
        return view('livewire.informasi.create-informasi');
    }
}
