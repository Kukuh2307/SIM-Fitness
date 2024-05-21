<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User as MemberModel;
use Livewire\WithPagination;

class Member extends Component
{
    use WithPagination;
    public $dataMember;

    
    public $search="";
    

    public function render()

    {
        $searchTerm = '%'.$this->search.'%';
        $this->dataMember = MemberModel::latest()->where('nama', 'LIKE', $searchTerm)->paginate(5);
        return view('livewire.member',[
            'dataMember'=>$this->dataMember,
        ]);
    }
}
