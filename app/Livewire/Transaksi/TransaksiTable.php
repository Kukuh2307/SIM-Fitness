<?php

namespace App\Livewire\Transaksi;

use App\Models\Transaksi;
use Livewire\Component;
use Livewire\WithPagination;

class TransaksiTable extends Component
{
    use WithPagination;
    public $search = 'mulya';
    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $transaksis = Transaksi::where('Nama_User', 'like', '%' . $this->search . '%')
            ->orWhere('Nama_Instruktur', 'like', '%' . $this->search . '%')
            ->orWhere('Nama_Kelas', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.transaksi.transaksi-table', ['transaksis' => $transaksis, 'search' => $this->search]);
    }
}
