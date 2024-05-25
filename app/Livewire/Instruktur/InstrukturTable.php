<?php

namespace App\Livewire\Instruktur;

use App\Models\Instruktur;
use Livewire\Component;
use Livewire\WithPagination;

class InstrukturTable extends Component
{
    use WithPagination;
    public $dataInstruktur;
    protected $listeners = [
        'InstrukturAdded', 'InstrukturUpdated', 'InstrukturDeleted' => 'render'
    ];

    public function edit($id)
    {
        $this->dispatch('instruktur-edit', ['id' => $id]);
    }

    public function delete($id)
    {
        $this->dispatch('instruktur-delete', ['id' => $id]);
    }

    public function render()
    {
        $instrukturs = Instruktur::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.instruktur.instruktur-table', [
            'instrukturs' => $instrukturs
        ]);
    }
}
