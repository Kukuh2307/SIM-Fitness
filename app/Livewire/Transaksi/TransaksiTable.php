<?php

namespace App\Livewire\Transaksi;

use App\Models\User;

use App\Models\Membership;
use Livewire\Component;
use App\Models\Transaksi;
use Livewire\WithPagination;
use Illuminate\Support\Facades\URL;

class TransaksiTable extends Component
{
    use WithPagination;

    public $search = '';
    public $isDashboard = false; // Properti untuk menentukan apakah sedang di halaman dashboard
    protected $queryString = ['search'];

    public $bulan;

    

    public function mount()
    {
        // Check if the current URL is /dashboard
        if (URL::current() === url('dashboard')) {
            $this->isDashboard = true;
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function approve($id)
    {
        $transaksi = Transaksi::find($id);
        $user = User::where('nama', $transaksi->Nama_User)->first();
        $member = Transaksi::where("Nama_Kelas", 'AND', "Nama_Instruktur")->exist();

        $this->bulan = new Membership();
        $this->bulan = $this->bulan->bulan;

        if ($transaksi) {
            $transaksi->update(['Status' => 'success']);
        }

        if ($member) {
            $user->update([
                'Role' => 'member',
                'Tanggal_Bergabung' => now(),
                'Tanggal_Berakhir' => now()->addMonth($this->bulan)
            ]);
        }
        

        $this->reset('search');
        session()->flash('success', 'Transaksi Berhasil diapprove');
    }

    public function reject($id)
    {
        $transaksi = Transaksi::find($id);

        if ($transaksi) {
            $transaksi->update(['Status' => 'failed']);
        }

        $this->reset('search');
        session()->flash('success', 'Transaksi Berhasil dibatalkan');
    }

    private function getTransaksisQuery()
    {
        $query = Transaksi::query();

        if ($this->isDashboard) {
            $query->where('status', 'pending');
        }

        $query->orderBy('created_at', 'desc');

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('Nama_User', 'like', '%' . $this->search . '%')
                    ->orWhere('Nama_Instruktur', 'like', '%' . $this->search . '%')
                    ->orWhere('Nama_Kelas', 'like', '%' . $this->search . '%')
                    ->orWhere('Metode_Pembayaran', 'like', '%' . $this->search . '%')
                    ->orWhere('Status', 'like', '%' . $this->search . '%');
            });
        }

        return $query;
    }

    public function render()
    {
        $transaksis = $this->getTransaksisQuery()->paginate(10);
        return view('livewire.transaksi.transaksi-table', [
            'transaksis' => $transaksis,
            'search' => $this->search ?? ''
        ]);
    }
}
