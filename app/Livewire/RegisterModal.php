<?php

namespace App\Livewire;

use Livewire\Component;

class RegisterModal extends Component
{
    public $showModal = false;

    protected $listeners = ['showRegisterModal' => 'showModal'];

    public function showModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.register-modal');
    }
}
