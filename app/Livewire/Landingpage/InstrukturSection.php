<?php

namespace App\Livewire\Landingpage;

use Livewire\Component;

class InstrukturSection extends Component
{
    public $instruktur;

    public function mount($instruktur)
    {
        $this->instruktur = $instruktur;
    }
    public function render()
    {
        return view('livewire.landingpage.instruktur-section', [
            'instruktur' => $this->instruktur
        ]);
    }
}
