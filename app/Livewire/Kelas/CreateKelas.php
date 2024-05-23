<?php

namespace App\Livewire\Kelas;

use App\Models\Instruktur;
use App\Models\Kelas as KelasModel;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateKelas extends Component
{
    use WithFileUploads;
    public $nama_kelas;
    public $deskripsi;
    public $biaya;
    public $id_instruktur;
    public $waktu_mulai;
    public $waktu_selesai;
    public $foto;
    public $kuota;
    public $hari;
    public $instrukturs = [];
    public $days = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
    public $btnUpdate = false;

    protected $listeners = [
        'kelas-edit' => 'loadKelas',
        'kelas-delete' => 'delete',
    ];

    public function loadKelas($event)
    {
        $listInstruktur = $this->instrukturs = Instruktur::all();
        $kelas = KelasModel::find($event['id']);

        $instruktur = \App\Models\Instruktur::find($kelas->id_instruktur);

        if ($kelas) {
            $this->nama_kelas = $kelas->Nama_Kelas;
            $this->deskripsi = $kelas->Deskripsi;
            $this->biaya = $kelas->Biaya;
            $this->id_instruktur = $listInstruktur->where('id', $instruktur->id)->first()->id;
            $this->waktu_mulai = $kelas->Waktu_Mulai;
            $this->waktu_selesai = $kelas->Waktu_Selesai;
            $this->kuota = $kelas->Kuota;
            $this->foto = $kelas->Foto;
            $this->hari = $kelas->Hari;
            $this->btnUpdate = true;
        }
    }

    public function store()
    {
        $rules = [
            'nama_kelas' => 'required',
            'deskripsi' => 'required',
            'biaya' => 'required',
            'id_instruktur' => 'required',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i',
            'hari' => 'required',
            'kuota' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
        $message = [
            'nama.required' => 'Nama harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'biaya.required' => 'Biaya harus diisi',
            'id_instruktur.required' => 'Silahkan memilih instruktur',
            'waktu_mulai.required' => 'Waktu mulai harus diisi',
            'waktu_selesai.required' => 'Waktu selesai harus diisi',
            'waktu_mulai.date_format' => 'Waktu mulai harus berformat HH:MM',
            'waktu_selesai.date_format' => 'Waktu selesai harus berformat HH:MM',
            'hari.required' => 'hari harus diisi',
            'kuota.required' => 'Kuota harus diisi',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'File harus berupa gambar',
            'foto.max' => 'File terlalu besar',
            'foto.mimes' => 'File harus jpeg,png,jpg',
        ];

        $this->validate($rules, $message);

        KelasModel::create([
            'Nama_Kelas' => $this->nama_kelas,
            'Deskripsi' => $this->deskripsi,
            'Biaya' => $this->biaya,
            'id_Instruktur' => $this->id_instruktur,
            'Waktu_Mulai' => $this->waktu_mulai,
            'Waktu_Selesai' => $this->waktu_selesai,
            'Hari' => $this->hari,
            'Kuota' => $this->kuota,
            'Foto' => $this->foto->store('images', 'public'),
        ]);

        $this->reset(['nama_kelas', 'deskripsi', 'biaya', 'id_instruktur', 'waktu_mulai', 'waktu_selesai', 'hari', 'kuota', 'foto']);
        $this->dispatch('KelasAdded');
        session()->flash('success', 'Kelas Berhasil ditambahkan');
    }

    public function update()
    {
        $rules = [
            'nama_kelas' => 'required',
            'deskripsi' => 'required',
            'biaya' => 'required',
            'id_instruktur' => 'required',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i',
            'hari' => 'required',
            'kuota' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
        $message = [
            'nama.required' => 'Nama harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'biaya.required' => 'Biaya harus diisi',
            'id_instruktur.required' => 'Silahkan memilih instruktur',
            'waktu_mulai.required' => 'Waktu mulai harus diisi',
            'waktu_selesai.required' => 'Waktu selesai harus diisi',
            'waktu_mulai.date_format' => 'Waktu mulai harus berformat HH:MM',
            'waktu_selesai.date_format' => 'Waktu selesai harus berformat HH:MM',
            'hari.required' => 'hari harus diisi',
            'kuota.required' => 'Kuota harus diisi',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'File harus berupa gambar',
            'foto.max' => 'File terlalu besar',
            'foto.mimes' => 'File harus jpeg,png,jpg',
        ];
        $this->validate($rules, $message);
        $data = KelasModel::find($this->kelas_id);
        if ($data) {
            $data->update([
                'Nama_Kelas' => $this->nama_kelas,
                'Deskripsi' => $this->deskripsi,
                'Biaya' => $this->biaya,
                'id_Instruktur' => $this->id_instruktur,
                'Waktu_Mulai' => $this->waktu_mulai,
                'Waktu_Selesai' => $this->waktu_selesai,
                'Hari' => $this->hari,
                'Kuota' => $this->kuota,
                'Foto' => $this->foto->store('images', 'public'),
            ]);
            $this->dispatch('KelasUpdated');
            $this->reset(['nama_kelas', 'deskripsi', 'biaya', 'id_instruktur', 'waktu_mulai', 'waktu_selesai', 'hari', 'kuota', 'foto']);
            session()->flash('success', 'Kelas Berhasil diupdate');
        }
    }

    public function delete($id)
    {
        $data = KelasModel::where('id', $id)->first();
        if ($data) {
            $data->delete();
            $this->dispatch('KelasDeleted');
            $this->reset(['nama_kelas', 'deskripsi', 'biaya', 'id_instruktur', 'waktu_mulai', 'waktu_selesai', 'hari', 'kuota', 'foto']);
            session()->flash('success', 'Kelas Berhasil dihapus');
        } else {
            session()->flash('error', 'Kelas tidak ditemukan');
        }
    }
    public function render()
    {
        $instruktur = \App\Models\Instruktur::all();
        return view('livewire.kelas.create-kelas', [
            'instrukturs' => $instruktur,
            'days' => $this->days,
        ]);
    }
}
