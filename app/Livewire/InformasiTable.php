<?php

namespace App\Http\Livewire;

use App\Models\Informasi;
use Livewire\Component;

class InformasiTable extends Component
{
    public $informasis;

    public function mount()
    {
        $this->informasis = Informasi::all();
    }

    public function render()
    {
        return view('livewire.informasi-table', [
            'informasis' => $this->informasis,
        ]);
    }
}
