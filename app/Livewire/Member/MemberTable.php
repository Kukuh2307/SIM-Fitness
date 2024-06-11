<?php

namespace App\Livewire\Member;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User as Member;
use Illuminate\Support\Facades\DB;

class MemberTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

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
            ->where(function ($query) {
                $query->where('users.nama', 'like', '%' . $this->search . '%')
                    ->orWhere('users.Email', 'like', '%' . $this->search . '%')
                    ->orWhere('transaksis.Nama_Kelas', 'like', '%' . $this->search . '%')
                    ->orWhere('transaksis.Nama_Instruktur', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.member.member-table', [
            'members' => $members,
            'search' => $this->search
        ]);
    }
}
