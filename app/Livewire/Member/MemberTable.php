<?php

namespace App\Livewire\Member;

use Livewire\Component;
use App\Models\User as Member;
use Illuminate\Support\Facades\DB;

class MemberTable extends Component
{

    public function render()
    {
        $members = Member::select(
            'users.nama',
            'users.Foto',
            'users.Email',
            DB::raw("DATE_FORMAT(users.Tanggal_bergabung, '%d-%m-%Y') as Tanggal_bergabung"),
            DB::raw("DATE_FORMAT(users.Tanggal_Berakhir, '%d-%m-%Y') as Tanggal_Berakhir"),
            'transaksis.Nama_Instruktur',
            'transaksis.Nama_Kelas'
        )
            ->join('transaksis', 'users.nama', '=', 'transaksis.Nama_User')
            ->where('users.role', 'member')
            ->paginate(10);

        return view('livewire.member.member-table', [
            'members' => $members
        ]);
    }
}
