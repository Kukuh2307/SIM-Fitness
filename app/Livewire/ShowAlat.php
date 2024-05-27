<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ListAlat;
use Livewire\WithPagination;

class ShowAlat extends Component
{
    use WithPagination;

    protected $listeners = [
        'AlatAdded', 'AlatUpdated', 'AlatDeleted' => 'render'
    ];

    public function edit($id)
    {
        $this->dispatch('alat-edit', ['id' => $id]);
    }

    public function delete($id)
    {
        $this->dispatch('alat-delete', ['id' => $id]);
    }

    public function render()
    {
        $alats = ListAlat::orderBy('id', 'desc')->paginate(10);
        return view('livewire.show-alat', [
            'alats' => $alats,
        ]);
    }
}
