<?php

namespace App\Livewire\User\Component;

use Livewire\Component;

class Sidebar extends Component
{
    public $title;

    public function mount($title)
    {
        $this->title = $title;
    }
    public function render()
    {
        return view('livewire.user.component.sidebar', [
            'title' => $this->title
        ]);
    }
}
