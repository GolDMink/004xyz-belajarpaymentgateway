<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "order_detail";
    protected $fillable = [
        'order_id','barang_id','jumlah'
    ];
}
