@extends('buyer.layout')

@section('title')
Beranda
@endsection

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="vendors/images/banner-img.png" alt="">
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize" style="margin-top: 15px">
                        Selamat Datang <div class="weight-600 font-30 text-blue">Pengunjung!</div>
                    </h4>
                    <p class="font-18 max-width-600">Yuk belanja kebutuhan anda dengan cukup berada #DiRumahSaja</p>
                </div>
            </div>
        </div>
        @if (session('addComplete'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ session('addComplete') }}!</strong>
        </div>
        @endif
        @if (session('addError'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ session('addError') }}!</strong>
        </div>
        @endif
        @if (session('noteSuccess'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ session('noteSuccess') }}!</strong>
        </div>
        @endif
        <!-- Begin Display Product -->
        <div class="search-icon-box card-box mb-30">
            <input type="text" class="border-radius-10" id="myInput" onkeyup="myFunction()"
                placeholder="Pencarian bahan..." title="Type in a name">
            <i class="search_icon dw dw-search"></i>
        </div>
        <div class="product-wrap">
            <div class="product-list">
                <ul class="row" id="myUL">
                    @if ($item_data->count() == 0)
                    <strong>lol</strong>
                    @else
                    @foreach ($item_data as $itd)
                    @if ($itd->item_status == 'tersedia')
                    <li class="col-6 col-lg-4 col-md-6 col-sm-6">
                        <form method="POST" action="/addToCart">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{$itd->item_id}}" name="id_item_buy">
                            <input type="hidden" value="{{$itd->item_name}}" name="name_item_buy">
                            <div class="product-box">
                                <div class="producct-img"><img src="{{asset('image/'.$itd->item_image_path)}}" alt="">
                                </div>
                                <div class=" product-caption">
                                    <a>
                                        <p style="font-size: 15px; font-weight: bold">{{$itd->item_name}}</p>
                                    </a>
                                    <div class="price">
                                        <p style="color: black; font-size: 13px; margin-bottom: 5px">Rp.
                                            {{$itd->item_price}} /
                                            {{$itd->item_quantity_get}} {{$itd->item_type_sell}}</p>
                                        <p>Min {{$itd->item_minimum}} {{$itd->item_type_sell}} | Stock
                                            {{$itd->item_stock}}
                                            {{$itd->item_type_sell}} <br>Oleh : {{$itd->item_name_seller}}</p>
                                    </div>
                                    @if ($itd->item_stock == 0)
                                    <button class="btn btn-outline-secondary" style="width: 100%" type="button">
                                        Habis
                                    </button>
                                    @else
                                    <div class="form-group">
                                        <label>Ingin pesan</label>
                                        <input id="demo3_22" type="text" value="{{$itd->item_minimum}}" name="demo3_22">
                                    </div>
                                    <button class="btn btn-outline-primary" style="width: 100%" type="submit">
                                        Tambah
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <!-- End Display Product -->
        <!-- Begin Footer -->
        <div class="footer-wrap pd-20 mb-20 card-box">
            Template oleh <a href="https://github.com/dropways" target="_blank">Ankit
                Hingarajiya </a> | Sistem dibuat oleh <a href="https://www.instagram.com/kaikoga45/">Kai Koga</a>
        </div>
        <!-- End Footer -->
    </div>
</div>
@endsection