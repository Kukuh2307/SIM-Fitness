<?php

namespace App\Livewire\Instruktur;

use App\Models\Instruktur;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\URL;

class InstrukturTable extends Component
{
    use WithPagination;
    public $search = '';

    protected $listeners = [
        'InstrukturAdded', 'InstrukturUpdated', 'InstrukturDeleted' => 'render'
    ];

    protected $queryString = ['search'];

    public function edit($id)
    {
        $this->dispatch('instruktur-edit', ['id' => $id]);
    }

    public function delete($id)
    {
        $this->dispatch('instruktur-delete', ['id' => $id]);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $instrukturs = $this->getInstruktursQuery()->paginate(10);
        return view('livewire.instruktur.instruktur-table', [
            'instrukturs' => $instrukturs,
            'search' => $this->search ?? ''
        ]);
    }

    private function getInstruktursQuery()
    {
        $query = Instruktur::query();

        $query->orderBy('created_at', 'desc');

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('Nama', 'like', '%' . $this->search . '%')
                    ->orWhere('Email', 'like', '%' . $this->search . '%')
                    ->orWhere('Spesialis', 'like', '%' . $this->search . '%')
                    ->orWhere('Biaya', 'like', '%' . $this->search . '%');
            });
        }

        return $query;
    }
}
