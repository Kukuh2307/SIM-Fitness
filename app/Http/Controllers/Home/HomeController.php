<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private function getClient()
    {
        return [
            [
                'id' => 1,
                'desc' => '"Brook presents your services with flexible, convenient and customizable layouts. You can select your favorite layouts & elements for various purposes with unlimited customization possibilities. Pixel-perfect replication of the designer\'s intended design.',
                'img' => '/assets/img-8.jpg',
                'clientName' => "Butler"
            ],
            [
                'id' => 2,
                'desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus consectetur, magnam eos optio laboriosam quaerat voluptates! Inventore molestiae voluptatibus repudiandae quos blanditiis, soluta ratione? Totam quos voluptas a laborum exercitationem",
                'img' => '/assets/img-9.jpg',
                'clientName' => "Chiris Harris"
            ],
            [
                'id' => 3,
                'desc' => '"Brook presents your services with flexible, convenient and customizable layouts. You can select your favorite layouts & elements for various purposes with unlimited customization possibilities. Pixel-perfect replication of the designer\'s intended design.',
                'img' => '/assets/img-10.jpg',
                'clientName' => "Martin"
            ],
            [
                'id' => 4,
                'desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus consectetur, magnam eos optio laboriosam quaerat voluptates! Inventore molestiae voluptatibus repudiandae quos blanditiis, soluta ratione? Totam quos voluptas a laborum exercitationem",
                'img' => '/assets/img-12.jpg',
                'clientName' => "Thomos"
            ]
        ];
    }

    public function index()
    {
        return view('livewire.landingpage.home', [
            'client' => $this->getClient(),
            'test' => 'test'
        ]);
    }
}
