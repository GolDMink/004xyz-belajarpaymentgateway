<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Order extends Model
{

    protected $table = "order";
    public function generateCode(){
        $unique_no = Order::orderBy('id', 'DESC')->pluck('id')->first();
        // dd($unique_no);
        if($unique_no == null or $unique_no == ""){
        #If Table is Empty
        $unique_no = 1;
        }
        else{
        #If Table has Already some Data
        $unique_no = $unique_no + 1;
        }
        $finalcode = 'INV'.date('Ymd').Auth::user()->id.$unique_no;
        return $finalcode;
    }

    public function myOrder($status)
    {
        $data = DB::table('order')
                ->where('user_id',Auth::user()->id)
                ->where('status_pembayaran',$status)
                ->get();
        return $data;
    }
}
