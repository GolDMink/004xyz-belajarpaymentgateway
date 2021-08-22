<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\model\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->order = new Order();
    }
    public function myOrder(){
        $orderLunas = $this->order->myOrder('lunas');
        $orderPending = $this->order->myOrder('pending');
        return view('user.order.index',compact('orderLunas','orderPending'));
    }
}
