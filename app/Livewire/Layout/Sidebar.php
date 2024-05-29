<?php

namespace App\Livewire\Layout;

use Log;
use Livewire\Component;

class Sidebar extends Component
{
    public $title;
    public function render()
    {
        return view('livewire.layout.sidebar');
    }
}
