<?php

namespace App\Http\Controllers;

use App\model\Order;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Transaction;

class PaymentController extends Controller
{
    public function __construct()
    {
        $serverKey = Config::$serverKey= 'SB-Mid-server-ITkrr-tN0YnP3Tpdou8eBxGZ';
    }
    public function detailPayment ($id)
    {

        $data = json_decode(json_encode(Transaction::status($id)),true);
        // dd($data);
        return view('user.payment.detail',compact('data'));
    }
    public function sudahBayar($id){

        $data = json_decode(json_encode(Transaction::status($id)),true);
        if($data['transaction_status'] == "settlement"){
            Order::where('invoice',$id)->update(['status_pembayaran'=>'lunas']);
            return redirect()->route('myOrder');
        }else{
            toastr()->error('Lakukan Pembayaran dulu! ', 'Bayar Dulu!');
            return redirect()->back();
        }
    }
}
