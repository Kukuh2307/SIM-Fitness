<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Instructor extends Component
{
    public $countinstructor;
    public function mount()
    {
        $this->countinstructor = \App\Models\Instruktur::count();
    }
    public function render()
    {
        return view('livewire.dashboard.instructor', [
            'countinstructor' => $this->countinstructor
        ]);
    }
}
