<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Keranjang extends Model
{
    protected $table = 'keranjang';
    protected $fillable = ['invoice','harga','jumlah','barang_id'];

    public function Produk(){
        return $this->belongsTo('App\Model\Product','barang_id','id');
    }

    public function data()
    {
        $data = Keranjang::with('produk')->where('user_id',Auth::user()->id)->get();
        return $data;
    }
    public function total()
    {
        $total=0;
        foreach($this->data() as $item){
            $total += $item->harga * $item->jumlah;
        }
        return $total;
    }
}
