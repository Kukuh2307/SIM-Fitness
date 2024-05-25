<?php

namespace App\Livewire\Instruktur;

use Livewire\Component;

class CreateInstruktur extends Component
{
    public $btnUpdate = false;
    public function render()
    {
        return view('livewire.instruktur.create-instruktur', []);
    }
}
