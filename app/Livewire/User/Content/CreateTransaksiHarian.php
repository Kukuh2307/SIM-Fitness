<?php

namespace App\Livewire\User\Content;

use Livewire\Component;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class CreateTransaksiHarian extends Component
{
    public $namaUser;
    public $emailUser;
    public $metodePembayaran;

    protected $rules = [
        'namaUser' => 'required|string',
        'emailUser' => 'required|email',
        'metodePembayaran' => 'required|string',
    ];

    public function create()
    {
        $this->validate();

        Transaksi::create([
            'Nama_User' => $this->namaUser,
            'Email' => $this->emailUser,
            'Total_Biaya' => 25000,
            'Metode_Pembayaran' => $this->metodePembayaran,
            'Status' => 'pending',
        ]);

        session()->flash('message', 'Transaksi berhasil dibuat.');
    }

    public function render()
    {
        return view('livewire.user.content.create-transaksi-harian');
    }
}
