<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Member extends Component
{
    public $countmember;

    public function mount()
    {
        $this->countmember = \App\Models\User::where('role', 'member')->count();
    }
    public function render()
    {
        return view('livewire.dashboard.member', [
            'countmember' => 'test',
        ]);
    }
}
