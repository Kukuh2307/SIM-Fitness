<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\ListAlat;
use Livewire\WithPagination;

class Alat extends Component
{
    use WithPagination;

    public $alats;


    public function destroy($id_alat){
       
       $alat = ListAlat::where('id_alat', $id_alat);
    //    Storage::delete('public/upload/'. $alat->Foto);
       $alat->delete();
       echo "<script>window.location='/admin.listing-alat'</script>";
    }
   

    public function render()
    {
        $this->alats = ListAlat::latest()->paginate(5);
        return view('livewire.alat', [
            'alats'=> $this->alats
        ]);
    }
}
