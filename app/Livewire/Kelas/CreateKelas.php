<?php

namespace App\Livewire\Kelas;

use Livewire\Component;
use App\Models\Instruktur;
use App\Models\Kelas as KelasModel;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateKelas extends Component
{
    use WithFileUploads;
    public $kelas_id;
    public $nama_kelas;
    public $deskripsi;
    public $biaya;
    public $id_instruktur;
    public $waktu_mulai;
    public $waktu_selesai;
    public $fotoLama;
    public $foto;
    public $kuota;
    public $hari;
    public $kelas;
    public $instrukturs = [];
    public $days = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
    public $btnUpdate = false;
    protected $listeners = [
        'kelas-edit' => 'loadKelas',
        'kelas-delete' => 'delete',
    ];

    public function loadKelas($event)
    {
        $kelas = KelasModel::find($event['id']);
        $this->instrukturs = Instruktur::all();

        if ($kelas) {
            $this->kelas_id = $event['id'];
            $this->nama_kelas = $kelas->Nama_Kelas;
            $this->deskripsi = $kelas->Deskripsi;
            $this->biaya = $kelas->Biaya;
            $this->id_instruktur = $kelas->id_Instruktur;
            $this->waktu_mulai = \Carbon\Carbon::parse($kelas->Waktu_Mulai)->format('H:i');
            $this->waktu_selesai = \Carbon\Carbon::parse($kelas->Waktu_Selesai)->format('H:i');
            $this->kuota = $kelas->Kuota;
            $this->hari = $kelas->Hari;
            $this->btnUpdate = true;
            $this->fotoLama = $kelas->Foto;
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
            'fotoLama' => 'required|image|mimes:jpeg,png,jpg|max:2048',
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
            'fotoLama.required' => 'Foto harus diisi',
            'fotoLama.image' => 'File harus berupa gambar',
            'fotoLama.max' => 'File terlalu besar',
            'fotoLama.mimes' => 'File harus jpeg,png,jpg',
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
            'Foto' => $this->fotoLama->store('images', 'public'),
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
            'foto' => 'nullable',
        ];
        $messages = [
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
        ];
        $this->validate($rules, $messages);

        $data = KelasModel::find($this->kelas_id);
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
                'Nama_Kelas' => $this->nama_kelas,
                'Deskripsi' => $this->deskripsi,
                'Biaya' => $this->biaya,
                'id_Instruktur' => $this->id_instruktur,
                'Waktu_Mulai' => $this->waktu_mulai,
                'Waktu_Selesai' => $this->waktu_selesai,
                'Hari' => $this->hari,
                'Kuota' => $this->kuota,
                'Foto' => $fotoPath,
            ]);

            $this->btnUpdate = false;
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
        $this->instrukturs = Instruktur::all();
        $this->kelas = KelasModel::all();
        return view('livewire.kelas.create-kelas', [
            'instrukturs' => $this->instrukturs,
            'kelas' => $this->kelas,
            'days' => $this->days,
        ]);
    }
}
