<?php

namespace App\Livewire\ListingAlat;

use App\Models\ListingAlat as ListingAlatModel;
use Livewire\Component;
use Livewire\WithPagination;

class ListingAlatTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public $listeners = [
        'AlatDeleted', 'AlatUpdated' => 'render',
    ];

    public function edit($id)
    {
        $this->dispatch('listing-alat-edit', ['id' => $id]);
    }

    public function delete($id)
    {
        $this->dispatch('listing-alat-delete', ['id' => $id]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $listing_alat = $this->getListingAlatQuery()->paginate(10);
        return view('livewire.listing-alat.listing-alat-table', [
            'alat' => $listing_alat,
        ]);
    }

    private function getListingAlatQuery()
    {
        $query = ListingAlatModel::query();

        $query->orderBy('created_at', 'desc');

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('Nama_Alat', 'like', '%' . $this->search . '%')
                    ->orWhere('Jumlah', 'like', '%' . $this->search . '%')
                    ->orWhere('Kondisi_Alat', 'like', '%' . $this->search . '%')
                    ->orWhere('Merk', 'like', '%' . $this->search . '%');
            });
        }

        return $query;
    }
}
