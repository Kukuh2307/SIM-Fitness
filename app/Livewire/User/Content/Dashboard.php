<?php

namespace App\Livewire\User\Content;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Kelas;
use Livewire\Component;
use App\Models\Transaksi;

class Dashboard extends Component
{
    public $title = 'Dashboard User';
    public function render()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $total_transaksi = Transaksi::where('Nama_User', $user->nama)->count();

        $transaksi_harian = Transaksi::where('Nama_User', $user->nama)
            ->whereNull('Nama_Kelas')
            ->whereNull('Nama_Instruktur')
            ->get();

        $transaksi_kelas = Transaksi::where('Nama_User', $user->nama)
            ->whereNotNull('Nama_Instruktur')
            ->whereNotNull('Nama_Kelas')
            ->get();;

        $kelas = Kelas::whereIn('Nama_Kelas', $transaksi_kelas->pluck('Nama_Kelas'))->get();

        $kuota_terisi = $kelas->sum(function ($kelas) {
            return Transaksi::where('Nama_Kelas', $kelas->Nama_Kelas)->count();
        });

        $total_transaksi_harian = $transaksi_harian->count();
        $total_transaksi_kelas = $total_transaksi - $total_transaksi_harian;

        return view('livewire.user.content.dashboard', [
            'title' => $this->title,
            'user' => $user,
            'total_transaksi' => $total_transaksi,
            'total_transaksi_harian' => $total_transaksi_harian,
            'total_transaksi_kelas' => $total_transaksi_kelas,
            'kuota_terisi' => $kuota_terisi,
            'kelas' => $kelas,
        ]);
    }
}
