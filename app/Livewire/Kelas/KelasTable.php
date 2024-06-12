<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas as KelasModel;
use Livewire\Component;
use Livewire\WithPagination;

class KelasTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    protected $listeners = [
        'KelasAdded', 'KelasUpdated', 'KelasDeleted' => 'render'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function edit($id)
    {
        $this->dispatch('kelas-edit', ['id' => $id]);
    }

    public function delete($id)
    {
        $this->dispatch('kelas-delete', ['id' => $id]);
    }

    public function render()
    {
        $kelas = KelasModel::with('instruktur')
            ->where('Nama_Kelas', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.kelas.kelas-table', [
            'kelas' => $kelas,
        ]);
    }
}
