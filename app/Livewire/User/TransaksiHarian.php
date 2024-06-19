<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Transaksi;
use Midtrans\Snap;
use Midtrans\Config;

class TransaksiHarian extends Component
{
    public $Nama_User;
    public $Nama_Transaksi = 'Transaksi_Harian';
    public $Email;
    public $Total_Biaya = 25000;
    public $response = [];

    protected $rules = [
        'Nama_User' => 'required|string|max:255',
        'Email' => 'required|email|max:255',
    ];

    public function mount()
    {
        $this->Nama_User = auth()->user()->nama;
        $this->Email = auth()->user()->email;
    }

    public function store()
    {
        $validatedData = $this->validate();

        DB::transaction(function () use ($validatedData) {
            $transaksiID = Str::uuid()->toString();

            $transaksi = Transaksi::create([
                'id' => $transaksiID,
                'Nama_User' => $validatedData['Nama_User'],
                'Nama_Instruktur' => '',
                'Nama_Kelas' => '',
                'Total_Biaya' => $this->Total_Biaya,
                'Metode_Pembayaran' => 'Midtrans',
                'Status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Config::$serverKey = config('midtrans.server_key');
            Config::$isProduction = config('midtrans.is_production');
            Config::$isSanitized = config('midtrans.is_sanitized');
            Config::$is3ds = config('midtrans.is_3ds');

            $params = [
                'transaction_details' => [
                    'order_id' => 'TransaksiHarian_' . $transaksiID,
                    'gross_amount' => $this->Total_Biaya,
                ],
                'customer_details' => [
                    'first_name' => $validatedData['Nama_User'],
                    'email' => $validatedData['Email'],
                ],
                'item_details' => [
                    [
                        'id' => '1',
                        'price' => $this->Total_Biaya,
                        'quantity' => 1,
                        'name' => 'Transaksi Harian',
                    ]
                ],
            ];

            $snapToken = Snap::getSnapToken($params);
            $transaksi->snap_token = $snapToken;
            $transaksi->save();

            $this->response['snap_token'] = $snapToken;
        });

        return redirect()->route('home')->with('success', 'Transaksi Berhasil');
    }

    public function render()
    {
        return view('livewire.user.transaksi-harian');
    }
}
