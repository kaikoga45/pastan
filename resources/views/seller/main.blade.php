@extends('seller.layout')

@section('title')
Beranda
@endsection

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-4" style="padding-bottom: 10px">
                    <img src="vendors/images/banner-img.png" alt="">
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        Selamat datang, {{Auth::user()->name}}!
                    </h4>
                    <p class="font-18 max-width-600" style="text-align: justify">Anda saat ini berada dalam sistem yang
                        mana anda bisa melakukan manajemen
                        data-data barang
                        yang akan dijual!</p>
                </div>
            </div>
        </div>
        <div class="page-header">
            <div class="row">
                <div class="col-7 col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Status Menjual : {{$status_seller}}</h4>
                    </div>
                </div>
                @if ($status_seller == "Aktif")
                <div class="col-5 col-md-6 col-sm-12 text-right">
                    <a class="btn btn-primary" href="/changeStatusSeller">
                        Ubah
                    </a>
                </div>
                @else
                <div class="col-5 col-md-6 col-sm-12 text-right">
                    <a class="btn btn-warning" href="/changeStatusSeller">
                        Ubah
                    </a>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="project-info-left" style="padding-top: 0px">
                            <div class="icon box-shadow bg-blue text-white">
                                <i class="fa fa-cube"></i>
                            </div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">{{$data_item->count()}}</div>
                            <div class="weight-600 font-14">Barang Tersimpan Di Sistem</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="project-info-left" style="padding-top: 0px">
                            <div class="icon box-shadow bg-light-green text-white">
                                <i class="dw dw-wind"></i>
                            </div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">{{$zero_stock->count()}}</div>
                            <div class="weight-600 font-14">Barang stock habis</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="project-info-left" style="padding-top: 0px">
                            <div class="icon box-shadow bg-light-orange text-white">
                                <i class="dw dw-user2"></i>
                            </div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">{{$check_order->count()}}</div>
                            <div class="weight-600 font-14">Orang ada pesan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Begin Footer -->
        <div class="footer-wrap pd-20 mb-20 card-box">
            Template oleh <a href="https://github.com/dropways" target="_blank">Ankit
                Hingarajiya </a> | Sistem dibuat oleh <a href="https://www.instagram.com/kaikoga45/">Kai Koga</a>
        </div>
        <!-- End Footer -->
    </div>
</div>
@endsection