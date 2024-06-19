<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\ListingAlat;

class Alat extends Component
{
    public $countalat;

    public function mount()
    {
        $this->countalat = ListingAlat::count();
    }

    public function render()
    {
        return view('livewire.dashboard.alat', [
            'countalat' => $this->countalat
        ]);
    }
}
