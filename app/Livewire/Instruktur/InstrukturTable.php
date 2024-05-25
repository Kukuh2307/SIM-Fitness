<?php

namespace App\Livewire\Instruktur;

use Livewire\Component;
use Livewire\WithPagination;

class InstrukturTable extends Component
{
    use WithPagination;

    public function render()
    {
        $instrukturs = \App\Models\Instruktur::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.instruktur.instruktur-table', [
            'instrukturs' => $instrukturs
        ]);
    }
}
