<?php

namespace App\Livewire\Landingpage;

use Livewire\Component;

class ClientSection extends Component
{
    public $clients;

    public function mount($clients)
    {
        $this->clients = $clients;
    }

    public function render()
    {
        return view('livewire.client-section');
    }
}
