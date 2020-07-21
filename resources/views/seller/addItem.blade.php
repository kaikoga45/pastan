@extends('seller.layout')

@section('title')
Tambah Item
@endsection

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="page-header">
            <div class="row">
                <div class="col-7 col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Tambah Item</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/item">Barang</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-5 col-md-6 col-sm-12 text-right">
                    <a class="btn btn-danger" href="/item">
                        Batal Tambah
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
                    <h4 class="text-blue h4">Tambah Data Barang</h4>
                    <p class="mb-30">Silahkan menambah dengan mengisi kotak dibawah ini.</p>
                </div>
            </div>
            <form method="POST" action="/postAddItem" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-12 col-sm-12 col-md-2 col-form-label">Nama</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Nama Barang" name="name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-12 col-md-2 col-form-label">Stock</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" placeholder="Jumlah Stock Barangnya" type="number" name="stock"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-12 col-md-2 col-form-label">Kategori</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" placeholder="Kategori Barangnya" type="text" name="category"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Harga</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" placeholder="Harga Barangnya" type="number" name="price" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Jumlah Didapatkan</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" placeholder="Jumlah Barang Didapatkan Dengan Harganya" type="number"
                            name="price_get" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Jumlah Minimum</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" placeholder="Jumlah minimum agar bisa dibeli" type="number"
                            name="minimum_get" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Tipe Berat</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" placeholder="Misalnya ikat, ons, dll." type="text" name="type_sell">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Status Barang</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="custom-select col-12" name="status">
                            <option selected="tersedia" value="tersedia">tersedia</option>
                            <option value="tidak tersedia">tidak tersedia</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Gambar Barang</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control form-control-file" type="file" name="image" required>
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