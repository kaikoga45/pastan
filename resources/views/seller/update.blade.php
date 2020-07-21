@extends('seller.layout')

@section('title')
Edit
@endsection

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="page-header">
            <div class="row">
                <div class="col-7 col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Barang</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/item">Barang</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-5 col-md-6 col-sm-12 text-right">
                    <a class="btn btn-danger" href="/item">
                        Batal Edit
                    </a>
                </div>
            </div>
        </div>
        @if (session('notImage'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ session('notImage') }}!</strong>
        </div>
        @endif
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Edit Keterangan Barang</h4>
                    <p class="mb-30">Silahkan mengubah keterangannya.</p>
                </div>
            </div>
            <form method="POST" action="/postUpdate" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" value="{{$data_item->item_id}}" name="id_item">
                <div class="form-group row">
                    <label class="col-12 col-sm-12 col-md-2 col-form-label">Nama</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" value="{{$data_item->item_name}}" name="name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-12 col-md-2 col-form-label">Stock</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" value="{{$data_item->item_stock}}" type="number" name="stock"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-12 col-md-2 col-form-label">Kategori</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" value="{{$data_item->item_category}}" type="text" name="category"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Harga</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" value="{{$data_item->item_price}}" type="number" name="price"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Jumlah yang didapatkan dengan harganya</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" value="{{$data_item->item_quantity_get}}" type="number"
                            name="price_get" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Jumlah minimum agar bisa dibeli</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" value="{{$data_item->item_minimum}}" type="number"
                            name="minimum_get" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Tipe Berat</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" value="{{$data_item->item_type_sell}}" type="text" name="type_sell">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Status Barang</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="custom-select col-12" name="status">
                            @if ($data_item->item_status == 'tersedia')
                            <option selected="{{$data_item->item_status}}">{{$data_item->item_status}}</option>
                            <option value="tidak tersedia">Tidak Tersedia</option>
                            @else
                            <option selected="{{$data_item->item_category}}">{{$data_item->item_status}}</option>
                            <option value="tersedia">Tersedia</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Gambar Barang</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control form-control-file" type="file" name="image">
                    </div>
                </div>
                <hr>
                <div class="col-12 col-md-6 col-sm-12 text-right">
                    <button class="btn btn-primary" type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection