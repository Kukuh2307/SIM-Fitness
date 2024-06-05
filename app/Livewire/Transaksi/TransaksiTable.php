<?php

namespace App\Livewire\Transaksi;

use App\Models\User;
use Livewire\Component;
use App\Models\Transaksi;
use Livewire\WithPagination;

class TransaksiTable extends Component
{
    use WithPagination;
    public $search = '';
    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function approve($id)
    {
        $transaksi = Transaksi::find($id);
        // dd($transaksi);
        $user = User::where('nama', $transaksi->Nama_User)->first();
        // dd($user);
        if ($transaksi) {
            $transaksi->update([
                'Status' => 'success'
            ]);
        }
        if ($user) {
            $user->update([
                'Role' => 'member',
                'Tanggal_Bergabung' => now(),
                'Tanggal_Berakhir' => now()->addMonth()
            ]);
        }
        $this->reset('search');
        session()->flash('success', 'Transaksi Berhasil diapprove');
    }

    public function reject($id)
    {
        $transaksi = Transaksi::find($id);
        if ($transaksi) {
            $transaksi->update([
                'Status' => 'failed'
            ]);
        }
        $this->reset('search');
        session()->flash('success', 'Transaksi Berhasil dibatalkan');
    }


    public function render()
    {
        $transaksisQuery = Transaksi::orderBy('status', 'asc')->orderBy('created_at', 'desc');

        if (!empty($this->search)) {
            $transaksisQuery->where(function ($query) {
                $query->where('Nama_User', 'like', '%' . $this->search . '%')
                    ->orWhere('Nama_Instruktur', 'like', '%' . $this->search . '%')
                    ->orWhere('Nama_Kelas', 'like', '%' . $this->search . '%');
            });
        }

        $transaksis = $transaksisQuery->paginate(10);

        return view('livewire.transaksi.transaksi-table', [
            'transaksis' => $transaksis,
            'search' => $this->search ?? ''
        ]);
    }
}
