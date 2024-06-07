<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DailyMember;

class InvoiceHarian extends Component
{
    public function render()
    {
        $dailyMember = DailyMember::latest()->first();
        return view('livewire.invoice-harian',[
            'dailymember'=>$dailyMember,
        ]);
    }
}
