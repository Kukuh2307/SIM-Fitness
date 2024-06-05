<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Income extends Component
{
    public $countincome;
    public function mount()
    {
        $total = \App\Models\Transaksi::where('status', 'success')->sum('Total_Biaya');
        $this->countincome = 'Rp ' . number_format($total, 0, ',', '.');
    }
    public function render()
    {
        return view('livewire.dashboard.income', [
            'countincome' => $this->countincome
        ]);
    }
}
