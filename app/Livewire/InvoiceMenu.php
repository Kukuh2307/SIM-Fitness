<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class InvoiceMenu extends Component
{
    public function render()
    {
        $invoice = Order::latest()->first();
        return view('livewire.invoice-menu',[
            'invoice'=>$invoice,
        ]);
    }
}
