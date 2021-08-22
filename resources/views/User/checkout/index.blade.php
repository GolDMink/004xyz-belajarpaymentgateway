@extends('layouts.master')
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
                        <div class="card-header flex-column align-items-start">
                            <h4 class="card-title">Add New Address</h4>
                            <p class="card-text text-muted mt-25">Be sure to check "Deliver to this address" when you
                                have finished</p>
                        </div>
                        <div class="card-body">
                            <form action="{{route('checkout.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="invoice" id="invoice" value="{{$invoice->invoice}}">
                                    <div class="col-md-6 col-sm-12">
                                        <p>{{$invoice->invoice}}</p>
                                        <div class="form-group mb-2">
                                            <label for="checkout-name">Nama :</label>
                                            <input type="text" id="checkout-name" class="form-control" name="nama"
                                                placeholder="John Doe" value="{{auth::user()->name}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group mb-2">
                                            <label for="checkout-number">Nomor Hp:</label>
                                            <input type="number" id="checkout-number" class="form-control" name="hp"
                                                placeholder="0123456789" value="{{auth::user()->hp}}" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group mb-2">
                                            <label for="checkout-landmark">Alamat : </label>
                                            <input type="text" id="checkout-landmark" class="form-control" name="alamat"
                                                placeholder="Near Apollo Hospital" value="{{auth::user()->alamat}}" />
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="customer-card">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Rincian Pesanan</h4>
                            </div>
                            <div class="card-body actions">
                                <input type="hidden" name="total" value="{{$keranjang->total()}}">
                                <p class="card-text mb-0">Total : </p>
                                <p class="card-text">Rp. {{number_format($keranjang->total(),2)}}</p>
                                <div class="form-group">
                                    <label for="basicSelect">Pilih Bank</label>
                                    <select class="form-control" id="basicSelect" name="payment">
                                        <option value="bca">BCA</option>
                                        <option value="bni">BNI</option>
                                        <option value="bri">BRI</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block btn-next delivery-address mt-2">
                                    Proses
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')

@endpush
