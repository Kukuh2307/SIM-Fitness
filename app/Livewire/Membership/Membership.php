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
            "merchant_profile_picture_url" => "",
            "reminder_date" => null,
            "success_redirect_url" => "http://127.0.0.1:8000/user-dashboard",
            'currency' => 'IDR',
            'should_send_email' => true,
            'recurring_payment_id' => $no_transaction,
        ]);

        $apiInstance = new InvoiceApi();
        $generateInvoice = $apiInstance->createInvoice($createInvoice);

        $order->invoice_url = $generateInvoice['invoice_url'];
        $order->save();

        $transaksi = new Transaksi();
        $transaksi->Nama_User = auth()->user()->nama;
        $transaksi->Email = auth()->user()->email;
        $transaksi->Total_Biaya = $request->input('price');
        $transaksi->Metode_Pembayaran = "Virtual Payment";
        $transaksi->Status = "pending";
        $transaksi->Nama_Instruktur = null;
        $transaksi->Nama_Kelas = null;
        $transaksi->no_transaction = $no_transaction;  // Update with correct column name
        $transaksi->save();

        return Redirect::away('/invoice-menu');
    }

    public function notificationCallback(Request $request)
    {
        $getToken = $request->headers->get('x-callback-token');
        $callbackToken = env('XENDIT_CALLBACK_TOKEN');

        try {
            $order = ModelsOrder::where('external_id', $request->external_id)->first();

            if (!$callbackToken) {
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Callback token Xendit not exists',
                ], Response::HTTP_NOT_FOUND);
            }
            if ($getToken !== $callbackToken) {
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Token callback invalid',
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            if ($order) {
                if ($request->status === "PAID") {
                    $order->update([
                        'status' => 'Completed'
                    ]);
                } else {
                    $order->update([
                        'status' => 'Failed'
                    ]);
                }
            }
            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'callback sent',
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function render()
    {
        return view('livewire.membership.membership');
    }
}
