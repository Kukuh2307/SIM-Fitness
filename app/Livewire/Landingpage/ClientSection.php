<?php

namespace App\Livewire\Landingpage;

use Livewire\Component;

class ClientSection extends Component
{
    public $client;
    public $currSlide = 0;

    public function mount($client)
    {
        $this->client = $client;
    }

    public function prevSlide()
    {
        $this->currSlide = ($this->currSlide === 0) ? count($this->client) - 1 : $this->currSlide - 1;
    }

    public function nextSlide()
    {
        $this->currSlide = ($this->currSlide === count($this->client) - 1) ? 0 : $this->currSlide + 1;
    }

    public function setSlide($index)
    {
        $this->currSlide = $index;
    }

    public function render()
    {
        return view('livewire.landingpage.client-section', [
            'client' => $this->client,
            'currSlide' => $this->currSlide,
        ]);
    }
}
