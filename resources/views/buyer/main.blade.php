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
        <!-- Begin Category -->
        <div class="row">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-30">
                            <div class="card bg-dark card-box">
                                <img class="card-img" src="vendors/images/img1.jpg" alt="Card image">
                                <div class="card-img-overlay">
                                    <h5 class="card-title weight-500">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in.</p>
                                    <p class="card-text">Last updated 3 mins ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-30">
                            <div class="card bg-dark card-box">
                                <img class="card-img" src="vendors/images/img1.jpg" alt="Card image">
                                <div class="card-img-overlay">
                                    <h5 class="card-title weight-500">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in.</p>
                                    <p class="card-text">Last updated 3 mins ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- End Category -- >
        <!-- Begin Display Product -->
        <div class="product-wrap">
            <div class="product-list">
                <ul class="row">
                    @if ($item_data->count() == 0)
                    <strong>lol</strong>
                    @else
                    @foreach ($item_data as $itd)
                    <li class="col-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="product-box">
                            <div class="producct-img"><img src="{{$itd->item_image_path}}" alt=""></div>
                            <div class="product-caption">
                                <p style="font-size: 15px; font-weight: bold">{{$itd->item_name}}</p>
                                <div class="price">
                                    <p style="color: black; font-size: 13px; margin-bottom: 5px">Rp.
                                        {{$itd->item_price}} /
                                        {{$itd->item_quantity_get}} {{$itd->item_type_sell}}</p>
                                    <p>Min {{$itd->item_minimum}} {{$itd->item_type_sell}}</p>
                                </div>
                                <a href="#" class="btn btn-outline-primary" style="width: 100%">Beli</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
            <div class="blog-pagination mb-30">
                <div class="btn-toolbar justify-content-center mb-15">
                    <div class="btn-group">
                        <a href="#" class="btn btn-outline-primary prev"><i class="fa fa-angle-double-left"></i></a>
                        <a href="#" class="btn btn-outline-primary">1</a>
                        <a href="#" class="btn btn-outline-primary">2</a>
                        <span class="btn btn-primary current">3</span>
                        <a href="#" class="btn btn-outline-primary">4</a>
                        <a href="#" class="btn btn-outline-primary">5</a>
                        <a href="#" class="btn btn-outline-primary next"><i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
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