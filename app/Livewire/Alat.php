<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ListAlat;

class Alat extends Component
{
    public function render()
    {
        $listAlat = ListAlat::all();
        return view('livewire.alat',[
            'alats' => $listAlat,
        ]);
    }
}
