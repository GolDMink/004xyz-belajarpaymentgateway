<?php

namespace App\Http\Controllers;

use App\Model\Keranjang;
use App\model\Order;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->user = Auth::user();
        $this->order = new Order();
        $this->keranjang = new Keranjang();
    }

    public function addToCart($id)
    {
        $produk = Product::find($id);
        $datakeranjang = Keranjang::where('barang_id','=', $produk->id)->where('user_id','=',Auth::user()->id)->first();
        if($datakeranjang != null && $produk->stok != 0){
            $jumlah = $datakeranjang->jumlah + 1 ;
            $updateqty =  Keranjang::where('id',$datakeranjang->id)->update(['jumlah'=> $jumlah]);
        }elseif($produk->stok == 0){
            toastr()->error('Peringatan, Stok tidak mencukupi!', 'Stok tidak mencukupi!');
            return back();

        }else{
            $keranjang = new Keranjang();
            $keranjang->barang_id = $produk->id;
            $keranjang->harga = $produk->harga;
            $keranjang->jumlah = 1 ;
            $keranjang->user_id = Auth::user()->id;
            $keranjang->invoice = $this->order->generateCode();
            $keranjang->save();
        }
        toastr()->success('sukses menambahkan barang!', 'Barang masuk keranjang!',['timeOut'=>3000]);
        return redirect()->back();
    }

    public function detailKeranjang()
    {
        $datakeranjang = Keranjang::with('produk')->where('user_id',Auth::user()->id)->get();
        return view('User.keranjang.index',compact('datakeranjang'));
    }

    public function updateKeranjang(Request $request)
    {
        // return $request->all();
       for ($i=0; $i < count($request->barang_id); $i++) {
           DB::table('keranjang')->where('barang_id',$request->barang_id[$i])
           ->update([
               'jumlah'=>$request->jumlah[$i]
           ]);
       }
        toastr()->success('sukses update qty barang!', 'Update qty keranjang!');
        return redirect()->back();
    }

    public function hapusKeranjang($id)
    {
        $keranjang = Keranjang::where('id',$id)->delete();
        toastr()->success('sukses menghapus data keranjang!', 'Hapus data keranjang!');
        return redirect()->back();
    }


}
