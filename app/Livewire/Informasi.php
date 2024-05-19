<?php

namespace App\Livewire;

use App\Models\Informasi as InformasiModel;

use Livewire\Component;

class Informasi extends Component
{
    public $dataInformasi;
    public function render()
    {
        $this->dataInformasi = InformasiModel::orderBy('id', 'desc')->get();
        return view('informasi', [
            'dataInformasi' => $this->dataInformasi,
        ]);
    }
}
