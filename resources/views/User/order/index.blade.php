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
                        <h2 class="content-header-title float-left mb-0">Transaksi Saya</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Transaksi Saya
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
            <section id="basic-tabs-components">
                <div class="row match-height">
                    <!-- Basic Tabs starts -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Transaksi Saya</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pending-tab" data-toggle="tab" href="#pending" aria-controls="pending" role="tab" aria-selected="true">Pending</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="lunas-tab" data-toggle="tab" href="#lunas" aria-controls="lunas" role="tab" aria-selected="false">Lunas</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="pending" aria-labelledby="pending-tab" role="tabpanel">
                                        <div class="table-responsive" id="pending">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-nowrap">#</th>
                                                        <th scope="col" class="text-nowrap">Invoice</th>
                                                        <th scope="col" class="text-nowrap">User</th>
                                                        <th scope="col" class="text-nowrap">Alamat</th>
                                                        <th scope="col" class="text-nowrap">Total</th>
                                                        <th scope="col" class="text-nowrap">Metode Pembayaran</th>
                                                        <th scope="col" class="text-nowrap">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($orderPending as $item)
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>{{$item->invoice}}</td>
                                                        <td>{{$item->user_id}}</td>
                                                        <td>{{$item->alamat}}</td>
                                                        <td>{{$item->total}}</td>
                                                        <td>{{$item->metode_pembayaran}}</td>
                                                        <td>{{$item->status_pembayaran}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="lunas" aria-labelledby="lunas-tab" role="tabpanel">
                                      <div class="table-responsive" id="lunas">
                                        <table class="table mb-0" >
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-nowrap">#</th>
                                                    <th scope="col" class="text-nowrap">Invoice</th>
                                                    <th scope="col" class="text-nowrap">User</th>
                                                    <th scope="col" class="text-nowrap">Alamat</th>
                                                    <th scope="col" class="text-nowrap">Total</th>
                                                    <th scope="col" class="text-nowrap">Metode Pembayaran</th>
                                                    <th scope="col" class="text-nowrap">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $no = 1;
                                                @endphp
                                            @foreach ($orderLunas as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->invoice}}</td>
                                                <td>{{$item->user_id}}</td>
                                                <td>{{$item->alamat}}</td>
                                                <td>{{$item->total}}</td>
                                                <td>{{$item->metode_pembayaran}}</td>
                                                <td>{{$item->status_pembayaran}}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Basic Tabs ends -->
        </div>
    </div>
</div>
@endsection
