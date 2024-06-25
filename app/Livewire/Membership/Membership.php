<?php

namespace App\Livewire\Membership;

use Livewire\Component;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\InvoiceItem;

use App\Models\Membership as ModelsOrder;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Session;

class Membership extends Component
{
    public function __construct()
    {
        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
    }
    

    public function createInvoice(Request $request)
    {
        $no_transaction = "Gym-" . rand();
        $order = new ModelsOrder();
        $order->no_transaction = $no_transaction;
        $order->external_id = $no_transaction;
        $order->member_name = auth()->user()->nama;
        $order->member_email = auth()->user()->email;
        $order->plan_name = $request->input('item_name');
        $order->bulan = $request->input('bulan');
        $order->metode_pembayaran = "Virtual Payment";
        $order->price = $request->input('price');

        $items = new InvoiceItem([
            'name' => $request->input('item_name'),
            'price' => $request->input('price'),
            'quantity' => $request->input('qty'),
            'payer_email' => auth()->user()->email,
        ]);

        $createInvoice = new CreateInvoiceRequest([
            'external_id' => $no_transaction,
            'description' => "Pembelian Paket Membership " . $request->input('item_name') . " atas nama " . auth()->user()->nama . "\n email: " . auth()->user()->email,
            'payer_email' => auth()->user()->email,
            'amount' => $request->input('price'),
            'invoice_duration' => 172800,
            'items' => array($items),
            "success_redirect_url" => "http://127.0.0.1:8000/user-dashboard",
            'currency' => 'IDR',
            'should_send_email' => true,
        ]);

        $apiInstance = new InvoiceApi();
        $generateInvoice = $apiInstance->createInvoice($createInvoice);

        $order->invoice_url = $generateInvoice['invoice_url'];
        $order->save();
        
        $namaKelas = Session::get('namaKelas');
        $namaInstruktur = Session::get('instruktur');
        $transaksi = new Transaksi();
        $transaksi->Nama_User = auth()->user()->nama;
        $transaksi->Email = auth()->user()->email;
        $transaksi->Total_Biaya = $request->input('price');
        $transaksi->Metode_Pembayaran = "Virtual Payment";
        $transaksi->Status = "pending";
        $transaksi->Nama_Instruktur = $namaInstruktur;
        $transaksi->Nama_Kelas = $namaKelas;
        $transaksi->Transaksi_ID = $no_transaction;  
        $transaksi->no_transaction = $no_transaction;
        // dd($transaksi);
        $transaksi->save();

        return Redirect::away('/invoice-menu');
    }


    public function render()
    {
        return view('livewire.membership.membership');
    }
}
