@extends('layouts.master')
@section('content')
<style>
    /* .feather,
    [feather-check] {
        width: 120px;
        height: 120px;
        color: #28C76F;
    } */
    .row#copy{
        justify-content: center;
    }
    .img-logobank{
        max-width: 300px;
    }
</style>
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
            <div class="col-12">
                <div class="card align-center">
                    <div class="card-body text-center">
                        <h3>Transaksi Berhasil</h3>
                        <p>Mohon Segera Selesaikan Pembayaran</p>
                        {{-- <i data-feather='check'></i> --}}
                        <div class="col-12 mb-2 mt -2">
                            @php
                                $bank = $data['va_numbers'][0]['bank'];
                                @endphp
                                @if ($bank =='bca')
                                <img class="img-logobank" src="{{asset('zsh/app-assets/images/logobank/logo-bank-bca.png')}}">
                                @elseif ($bank == 'bri')
                                <img class="img-logobank" src="{{asset('zsh/app-assets/images/logobank/logo-bank-bri.png')}}">
                                @endif
                            <h5><strong>Nominal Bayar : {{number_format($data['gross_amount'])}}</strong></h5>
                        </div>
                        <div class="col-12 ">
                            <h6><strong>Waktu sisa pembayaran</strong></h6>
                            <h4 class="text-danger">00.219.10</h4>
                        </div>
                        <h5 class="mt-3"><strong>Nomor Virtual Akun</strong></h5>
                        <div class="row" id="copy">
                            <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control " id="copy-to-clipboard-input" value="{{$data['va_numbers'][0]['va_number']}}" />
                                </div>
                            </div>
                            <div class="col-sm-0">
                                <button class="btn btn-outline-primary" id="btn-copy">Salin</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <a href="{{url('sudahBayar/'.$data['order_id'])}}" class="btn btn-warning">Kembali</a>
                            <a href="{{url('sudahBayar/'.$data['order_id'])}}" class="btn btn-primary">Upload Bukti Pembayaran</a>
                            <a href="{{url('sudahBayar/'.$data['order_id'])}}" class="btn btn-success">Sudah Bayar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset('zsh/app-assets/js/scripts/extensions/ext-component-clipboard.js')}}"></script>
@endpush
