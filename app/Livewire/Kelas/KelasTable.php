<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas as KelasModel;
use Livewire\Component;
use Livewire\WithPagination;

class KelasTable extends Component
{
    use WithPagination;

    public $dataKelas;

    protected $listeners = [
        'KelasAdded', 'KelasUpdated', 'KelasDeleted' =>
        'render'
    ];

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
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.kelas.kelas-table', [
            'kelas' => $kelas,
        ]);
    }
}
