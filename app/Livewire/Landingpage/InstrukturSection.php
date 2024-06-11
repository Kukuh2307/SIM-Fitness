<?php

namespace App\Livewire\Landingpage;

use Livewire\Component;
use App\Models\Instruktur;

class InstrukturSection extends Component
{
    public $instruktur;
    public function render()
    {
        $this->instruktur = Instruktur::orderBy('created_at', 'desc')->limit(3)->get();
        return view('livewire.landingpage.instruktur-section', [
            'instruktur' => $this->instruktur
        ]);
    }
}
