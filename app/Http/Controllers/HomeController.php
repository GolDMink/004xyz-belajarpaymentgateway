<?php

namespace App\Http\Controllers;

use App\Model\Keranjang;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->keranjang = new Keranjang();
    }
    public function index()
    {
        $produks = Product::all();
        // dd($produks);
        return view('user.beranda',compact('produks'));
    }
}
