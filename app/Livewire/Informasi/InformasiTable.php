<?php

namespace App\Livewire\Informasi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Informasi as InformasiModel;

class InformasiTable extends Component
{
    use WithPagination;

    protected $listeners = ['informasiAdded' => 'render'];

    public function render()
    {
        $informations = InformasiModel::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.informasi.informasi-table', [
            'informations' => $informations,
        ]);
    }
}
