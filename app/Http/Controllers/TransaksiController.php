<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index() {
        return view('livewire.pages.auth.transaksi');
    }
}
