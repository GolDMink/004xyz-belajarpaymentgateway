<?php

namespace App\Http\Controllers;

use App\Model\Keranjang;
use App\model\Order;
use App\model\OrderDetail;
use App\Model\Product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\CoreApi;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->keranjang = new Keranjang();
    }
    public function index()
    {
        $keranjang = $this->keranjang;
        $invoice = Keranjang::distinct()->first(["invoice"]);
        if($invoice != null){
            return view('User.checkout.index',compact('keranjang','invoice'));
        }else{
            toastr()->error('Data keranjang anda kosong! ', 'Keranjang Kosong!',['timeOut'=>3000,'positionClass'=>'toast-bottom-right']);
            return redirect()->route('home.user');
        }
    }
    public function store(Request $request)
    {
        // return $request->all();
        Config::$serverKey= 'SB-Mid-server-ITkrr-tN0YnP3Tpdou8eBxGZ';
        $datakeranjang = $this->keranjang->data();
        foreach($datakeranjang as $key => $i){
            $item[] =  array(
                'id' => $i['id'],
                'price' => $i['harga'],
                'quantity' => $i['jumlah'],
                'name' => $i['produk']['nama_produk']
            );
        }

        try {
            $order = new Order();
            $order->invoice = $request->invoice;
            $order->user_id = Auth::user()->id;
            $order->alamat = $request->alamat;
            $order->total = $request->total;
            $order->metode_pembayaran = $request->payment;
            $order->status_pembayaran = "pending";
            $order->save();

            $payment = [
                'payment_type'=>'bank_transfer',
                'transaction_details'=>[
                    'order_id'=>$order->invoice,
                    'gross_amount' => $order->total
                ],
                'customer_details' => ['name' => Auth::user()->name],
                'item_details' => $item,
                'bank_transfer' => [
                    'bank' => $order->metode_pembayaran,
                ]
                ];
            foreach ($datakeranjang as $i){
                $order_detail = new OrderDetail();
                $order_detail->order_id = $order->id;
                $order_detail->barang_id = $i['barang_id'];
                $order_detail->jumlah = $i['jumlah'];
                $order_detail->save();
            }
            for($i=0;$i<count($datakeranjang);$i++){

            }
                $charge = CoreApi::charge($payment);
                Keranjang::where('user_id',Auth::user()->id)->delete();
                $data = json_decode(json_encode($charge),true);
            return redirect()->route('detail.order',$data['order_id']);
        } catch (\Exception $th) {
            dd($th);
            $code = $th->getCode();
            if($code){
                toastr()->error('Terjadi Error , Periksa Koneksi Anda!', 'Opps!',['timeOut'=>5000,'closeButton'=>true]);
                return redirect()->route('home.user');
            }
                toastr()->error('Anda telah melakukan transaksi sebelumnya , masuk ke "Pesanan Anda"! ', 'Opps!',['timeOut'=>5000,'closeButton'=>true]);
                return redirect()->route('home.user');
            die();
        }
    }
}
