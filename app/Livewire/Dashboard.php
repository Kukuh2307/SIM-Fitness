<?php

namespace App\Livewire;

use App\Models\Instruktur;
use App\Models\Kelas;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $countmembers;
    public $countinstruktur;
    public $countclass;
    public $countincome;

    public function mount()
    {
        $this->countmembers = User::where('role', 'member')->count();
        $this->countinstruktur = Instruktur::count();
        $this->countclass = Kelas::count();
        $this->countincome = Transaksi::where('status', 'success')->sum('total_harga');
    }

    public function render()
    {
        return view('dashboard', [
            'countmembers' => $this->countmembers,
            'countinstruktur' => $this->countinstruktur,
            'countclass' => $this->countclass,
            'countincome' => $this->countincome
        ]);
    }
}
