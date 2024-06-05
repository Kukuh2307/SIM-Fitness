<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Kelas extends Component
{
    public $countclass;
    public function mount()
    {
        $this->countclass = \App\Models\Kelas::count();
    }
    public function render()
    {
        return view('livewire.dashboard.kelas', [
            'countclass' => $this->countclass
        ]);
    }
}
