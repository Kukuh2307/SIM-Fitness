<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\ListAlat;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;


class Alat extends Component
{
    use WithPagination;

    public $alats;


    public function destroy($id_alat){
       
       $alat = ListAlat::where('id_alat', $id_alat)->first();
        if ($alat) {
        
        if ($alat->Foto) {
            Storage::delete('public/' . $alat->Foto);
        }
        }
       $alat->delete();
        return redirect()->to('/admin.listing-alat');
    }
   

    public function render()
    {
        $this->alats = ListAlat::latest()->paginate(5);
        return view('livewire.alat', [
            'alats'=> $this->alats
        ]);
    }
}
