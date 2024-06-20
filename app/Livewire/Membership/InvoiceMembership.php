<?php

namespace App\Livewire\Membership;

use Livewire\Component;
use App\Models\Membership;

class InvoiceMembership extends Component
{
    public function render()
    {
        $invoice = Membership::latest()->first();
        return view('livewire.membership.invoice-membership',[
            'invoice'=>$invoice,
        ]);
    }
}
