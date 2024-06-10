<?php

namespace App\Livewire\ListingAlat;

use App\Models\ListingAlat as ListingAlatModel;

use Livewire\Component;

class ListingAlatTable extends Component
{
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
    public function render()
    {
        $listing_alat = ListingAlatModel::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.listing-alat.listing-alat-table', [
            'alat' => $listing_alat,
        ]);
    }
}
