<?php

namespace App\Livewire\Informasi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Informasi as InformasiModel;
use Illuminate\Support\Facades\URL;

class InformasiTable extends Component
{
    use WithPagination;

    public $search = '';
    protected $queryString = ['search'];

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

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $dataInformasi = $this->getInformasiQuery()->paginate(10);

        return view('livewire.informasi.informasi-table', [
            'informations' => $dataInformasi,
        ]);
    }

    private function getInformasiQuery()
    {
        $query = InformasiModel::query();

        $query->orderBy('created_at', 'desc');

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('Judul', 'like', '%' . $this->search . '%')
                    ->orWhere('Deskripsi', 'like', '%' . $this->search . '%');
            });
        }

        return $query;
    }
}
