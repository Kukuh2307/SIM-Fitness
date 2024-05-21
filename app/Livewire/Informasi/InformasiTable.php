<?php

namespace App\Livewire\Informasi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Informasi as InformasiModel;

class InformasiTable extends Component
{
    use WithPagination;

    public $dataInformasi;

    protected $listeners = [
        'informasiAdded',
        'informasiUpdated', 'informasiDeleted' => 'render'
    ];

    public function edit($id)
    {
        $this->dispatch('informasi-edit', ['id' => $id]);
    }

    public function delete($id)
    {
        $this->dispatch('informasi-delete', ['id' => $id]);
    }

    public function informasiUpdateResetInput()
    {
        $this->dispatch('informasi-update-reset-input');
    }

    public function render()
    {
        $dataInformasi = InformasiModel::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.informasi.informasi-table', [
            'informations' => $dataInformasi,
        ]);
    }
}
