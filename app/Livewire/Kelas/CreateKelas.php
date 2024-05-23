<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas as KelasModel;
use Livewire\Component;

class CreateKelas extends Component
{
    public $nama_kelas;
    public $deskripsi;
    public $biaya;
    public $id_instruktur;
    public $waktu_mulai;
    public $waktu_selesai;
    public $hari;
    public $kuota;
    public $days = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];

    public function store()
    {
        $rules = [
            'nama_kelas' => 'required',
            'deskripsi' => 'required',
            'biaya' => 'required',
            'id_instruktur' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'hari' => 'required',
            'kuota' => 'required',
        ];
        $message = [
            'nama.required' => 'Nama harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'biaya.required' => 'Biaya harus diisi',
            'id_instruktur.required' => 'Silahkan memilih instruktur',
            'waktu_mulai.required' => 'Waktu mulai harus diisi',
            'waktu_selesai.required' => 'Waktu selesai harus diisi',
            'hari.required' => 'Hari harus diisi',
            'kuota.required' => 'Kuota harus diisi',
        ];
        $this->validate($rules, $message);
        KelasModel::create([
            'nama_kelas' => $this->nama_kelas,
            'deskripsi' => $this->deskripsi,
            'biaya' => $this->biaya,
            'id_instruktur' => $this->id_instruktur,
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
            'hari' => $this->hari,
            'kuota' => $this->kuota,
        ]);

        $this->reset(['nama_kelas', 'deskripsi', 'biaya', 'id_instruktur', 'waktu_mulai', 'waktu_selesai', 'hari', 'kuota']);
        $this->dispatch('KelasCreated');
        session()->flash('message', 'Kelas Berhasil ditambahkan');
    }
    public function render()
    {
        $instruktur = \App\Models\Instruktur::all();
        $jumlahInstruktur = \App\Models\Instruktur::count();
        return view('livewire.kelas.create-kelas', [
            'instrukturs' => $instruktur,
            'days' => $this->days,
        ]);
    }
}
