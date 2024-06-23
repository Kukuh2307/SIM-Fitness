<?php

namespace App\Livewire\User\Content;

use App\Models\Kelas;
use Livewire\Component;

class JoinKelas extends Component
{
    public $title = 'Join Kelas';
    public function render()
    {
        $kelas = Kelas::latest()->paginate(5);
        return view('livewire.user.content.join-kelas', [
            'title' => $this->title,
            'kelas' => $kelas
        ]);
    }
}
