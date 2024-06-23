<?php

namespace App\Livewire\User\Content;

use App\Models\User;
use Livewire\Component;
use App\Models\Transaksi;

class TransaksiHarian extends Component
{
    public $title = 'Transaksi Harian';
    public function render()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $transaksi_harian = Transaksi::where('Nama_User', $user->nama)
            ->whereNull('Nama_Kelas')
            ->whereNull('Nama_Instruktur')
            ->get();
        return view('livewire.user.content.transaksi-harian', [
            'title' => $this->title,
            'transaksi_harian' => $transaksi_harian
        ]);
    }
}
