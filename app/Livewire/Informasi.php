<?php

namespace App\Livewire;

use App\Models\Informasi as InformasiModel;

use Livewire\Component;

class Informasi extends Component
{
    public $dataInformasi;
    public function render()
    {
        return view('informasi');
    }
}
