<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Order;
use App\Models\Kelas;
use App\Models\Instruktur;

use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public function render()
    {

        $dataMember = Order::orderBy('created_at', 'desc')->latest()->paginate(10);
        $sum = Order::sum('price');
        $jumlah_member = Order::count();
        $jumlah_kelas = Kelas::count();
        $jumlah_instruktur = Instruktur::count();
        return view('livewire.dashboard',[
            'datas' => $dataMember,
            'sums'=>$sum,
            'jumlah_member'=>$jumlah_member,
            'jumlah_kelas'=>$jumlah_kelas,
            'jumlah_instruktur'=>$jumlah_instruktur,
        ]);
    }
}
