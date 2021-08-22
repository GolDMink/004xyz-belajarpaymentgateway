@extends('layouts.master')
@push('css')
<link rel="stylesheet" type="text/css"
    href="{{asset('zsh/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}">
@endpush
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Toastr</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Extensions</a>
                                </li>
                                <li class="breadcrumb-item active">Toastr
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i
                                    class="mr-1" data-feather="check-square"></i><span
                                    class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i
                                    class="mr-1" data-feather="message-square"></i><span
                                    class="align-middle">Chat</span></a><a class="dropdown-item"
                                href="app-email.html"><i class="mr-1" data-feather="mail"></i><span
                                    class="align-middle">Email</span></a><a class="dropdown-item"
                                href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span
                                    class="align-middle">Calendar</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Produk</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $total = 0;
                                        @endphp
                                        <form action="{{route('keranjang.update')}}">
                                            @csrf
                                            @forelse ($datakeranjang as $item)
                                            <tr class="cart-page">
                                                <td>
                                                    <img class="d-block rounded mr-1"
                                                        src="{{asset('zsh/app-assets/images/pages/eCommerce/1.png')}}"
                                                        alt="donuts" width="100">
                                                </td>
                                                <td>{{$item->produk->nama_produk}}</td>
                                                <td>
                                                    <input type="hidden" name="barang_id[]" class="product_id"
                                                        value="{{$item->barang_id}}">
                                                    <div class="cart-item-qty">
                                                        <div class="input-group quantity">
                                                            <input type="hidden" name="jumlah[]" class="product_id"
                                                                value="{{$item->jumlah}}">
                                                            <input class="touchspin-cart product_id" type="number"
                                                                value="{{$item->jumlah}}">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    Rp. {{number_format($item->harga,2)}}
                                                </td>
                                                <td>
                                                    <a href="{{url('hapus-cart/'.$item->id)}}"
                                                        class="btn btn-sm btn-danger">
                                                        <i data-feather="trash" class="mr-25"></i>
                                                        Hapus</a>
                                                </td>
                                            </tr>
                                            @php
                                            $total += $item->harga * $item->jumlah;
                                            @endphp
                                            @empty
                                            <td></td>
                                            <td></td>
                                            <td>Data Keranjang Kosong</td>
                                            <td></td>
                                            <td></td>
                                            @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-6">
                                        <h4>Total : Rp. {{number_format($total,2)}}</h4>
                                    </div>
                                    <div class="col-6">
                                        @if (count($datakeranjang) > 0)
                                        <button type="submit" class="btn btn-success float-right">Update
                                            Keranjang</button>
                                        @else
                                        <a href="{{route('home.user')}}" class="btn btn-warning btn-md float-right">Kembali Belanja</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Jumlah Barang :</p>
                                    <p>Total : </p>
                                </div>
                                <div class="col-md-6">
                                    <p>{{count($datakeranjang)}}</p>
                                    <p>Rp. {{number_format($total,2)}}</p>
                                </div>
                            </div>
                            @if (count($datakeranjang) > 0)
                            <a href="{{route('checkout.index')}}" class="btn btn-block btn-primary">
                                <i data-feather="shopping-bag" class="mr-25"></i>
                                Checkout</a>
                            @else
                            <a href="#" class="btn btn-block btn-primary">
                                <i data-feather="shopping-bag" class="mr-25"></i>
                                Checkout</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection
@push('js')
<script src="{{asset('zsh/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')}}"></script>
@endpush
