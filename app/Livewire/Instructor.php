<?php

namespace App\Livewire;

use App\Models\Instruktur as InstrukturModel;

use Livewire\Component;

class Instructor extends Component
{
    public $dataInstruktur;
    public function render()
    {
        $this->dataInstruktur = InstrukturModel::orderBy('id_kelas', 'Nama');
        return view('livewire.instructor', [
            'dataInstruktur' => $this->dataInstruktur,
        ]);
    }
}
