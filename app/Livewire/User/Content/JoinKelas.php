<?php

namespace App\Livewire\User\Content;

use App\Models\Kelas;
use App\Models\Instruktur;
use Livewire\Component;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class JoinKelas extends Component
{
    public $title = 'Join Kelas';
    public $nama_kelas;
    public $instruktur;
    public $id_kelas;

    public function joinKelas(Request $request){
        $this->nama_kelas = $request->input('namaKelas');
        Session::put('namaKelas', $this->nama_kelas);
        $this->id_kelas = $request->input('id_kelas');
        $this->instruktur = Instruktur::where('id', $this->id_kelas)->pluck('Nama')->first();
        Session::put('instruktur', $this->instruktur);
        // dd(session());
        return Redirect::away('/membership');
    }

    public function render()
    {
        $kelas = Kelas::latest()->paginate(5);
        
        return view('livewire.user.content.join-kelas', [
            'title' => $this->title,
            'kelas' => $kelas,
            'namaKelas'=>$this->nama_kelas,
            'instruktur' => $this->instruktur,
        ]);
    }
}
