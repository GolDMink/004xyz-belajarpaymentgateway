<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\model\Order;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Transaction;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->order = new Order();
        $serverKey = Config ::$serverKey= 'SB-Mid-server-ITkrr-tN0YnP3Tpdou8eBxGZ';
    }
    public function myOrder(){
        $orderLunas = $this->order->myOrder('lunas');
        $orderPending = $this->order->myOrder('pending');
        return view('user.order.index',compact('orderLunas','orderPending'));
    }

    public function detailOrder($id)
    {
        $data = json_decode(json_encode(Transaction::status($id)),true);
        // dd($data);
        return view('user.order.detail',compact('data'));
    }
}
