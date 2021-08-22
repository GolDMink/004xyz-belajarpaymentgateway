@extends('layouts.master')
@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-detached content-center">
            <div class="content-body">
                <!-- Blog List -->
                <div class="blog-list-wrapper">
                    <!-- Blog List Items -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div id="carousel-keyboard" class="carousel slide" data-keyboard="true">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-keyboard" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-keyboard" data-slide-to="1"></li>
                                        <li data-target="#carousel-keyboard" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img class="card-img" src="{{asset('zsh/app-assets/images/slider/02.jpg')}}" alt="Blog Post pic" height="400" />
                                        </div>
                                        <div class="carousel-item">
                                            <img class="card-img" src="{{asset('zsh/app-assets/images/slider/02.jpg')}}" alt="Blog Post pic" height="400" />
                                        </div>
                                        <div class="carousel-item">
                                            <img class="card-img" src="{{asset('zsh/app-assets/images/slider/02.jpg')}}" alt="Blog Post pic" height="400" />
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel-keyboard" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel-keyboard" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Blog List Items -->
                </div>
                <!--/ Blog List -->
            </div>
        </div>
        <div class="content-detached content-left">
            <div class="row">
                <div class="col-12">
                    <section class="pt-5 pb-5">
                        <div class="card-title align-items-center col-12">
                            <h2 class="text-center">Daftar Produk</h2>
                            <p class="text-center">Pilih Produk favorit Kamu</p>
                            <div class="col text-right">
                                <a href="#" class="btn btn-sm shadow btn-primary mt-1">Selengkapnya</a>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row mb-md-2">
                                @foreach ($produks as $item)
                                <div class="col-md-6 col-lg-4">
                                    <div class="card shadow-sm border-light mb-4">
                                        <a href="#" class="position-relative">
                                            <img src="{{asset('zsh/app-assets/images/pages/eCommerce/1.png')}}" class="card-img-top"
                                                alt="image"> </a>
                                        <div class="card-body">
                                            <div class="item-wrapper">
                                                <div class="item-rating">
                                                    @if ($item->stok > 10)
                                                    <div class="badge badge-success mb-1">
                                                     Stok : {{$item->stok}}
                                                    </div>
                                                    @endif
                                                    <div class="badge badge-success mb-1">
                                                        Stok : {{$item->stok}}
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="item-price float-right">Rp. {{number_format($item->harga,2)}}</h6>
                                                </div>
                                            </div>
                                            <h6 class="item-name">
                                                <a class="text-body" href="app-ecommerce-details.html">{{$item->nama_produk}}</a>
                                                <span class="card-text item-company">By <a href="javascript:void(0)"
                                                        class="company-name">Apple</a></span>
                                            </h6>
                                            <div class="item-options text-center mt-3">
                                                <a href="{{ url('add-to-cart/'.$item->id) }}" class="btn btn-primary btn-cart">
                                                    <i data-feather="shopping-cart"></i>
                                                    <span class="add-to-cart">Add to cart</span>
                                                </a>
                                                <button type="button" class="btn btn-outline-primary" id="position-top-left">Top Left</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
