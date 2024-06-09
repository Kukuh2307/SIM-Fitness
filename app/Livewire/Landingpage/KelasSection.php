<?php

namespace App\Livewire\Landingpage;

use App\Models\Kelas;
use Livewire\Component;

class KelasSection extends Component
{
    public $kelas;
    public $currSlide = 0;


    public function prevSlide()
    {
        $this->currSlide = ($this->currSlide === 0) ? count($this->kelas) - 1 : $this->currSlide - 1;
    }

    public function nextSlide()
    {
        $this->currSlide = ($this->currSlide === count($this->kelas) - 1) ? 0 : $this->currSlide + 1;
    }

    public function setSlide($index)
    {
        $this->currSlide = $index;
    }

    public function mount()
    {

        $this->kelas = Kelas::with('instruktur')->orderBy('id', 'desc')->get();
    }
    public function render()
    {
        return view('livewire.landingpage.kelas-section', [
            'kelas' => $this->kelas,
            'currSlide' => $this->currSlide
        ]);
    }
}
