<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Informasi extends Component
{
    public $countInformasi;
    public function mount()
    {
        $this->countInformasi = \App\Models\Informasi::count();
    }
    public function render()
    {
        return view('livewire.dashboard.informasi', [
            'countInformasi' => $this->countInformasi
        ]);
    }
}
