<?php

namespace App\Livewire\Transaksi;

use App\Models\Transaksi;
use Livewire\Component;
use Livewire\WithPagination;

class TransaksiTable extends Component
{
    use WithPagination;
    public $dataTransaksi;

    public function render()
    {
        $transaksi = Transaksi::orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.transaksi.transaksi-table', [
            'transaksis' => $transaksi,
        ]);
    }
}
