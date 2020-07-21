@extends('seller.layout')

@section('title')
Barang
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
                            <li class="breadcrumb-item"><a href="/seller">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Barang</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-5 col-md-6 col-sm-12 text-right">
                    <a class="btn btn-primary" href="/addItem">
                        Tambah Barang
                    </a>
                </div>
            </div>
        </div>
        @if (session('processComplete'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ session('processComplete') }}!</strong>
        </div>
        @endif

        @if (session('changeStatusAbort'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ session('changeStatusAbort') }}!</strong>
        </div>
        @endif
        <div class="card-box mb-30">
            <h2 class="h4 pd-20">Best Selling Products</h2>
            <table class="data table stripe hover nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">Gambar</th>
                        <th>Nama</th>
                        <th>Stock</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Jumlah Dapat</th>
                        <th>Tipe Berat</th>
                        <th>Jumlah Minmum</th>
                        <th>Status</th>
                        <th class="datatable-nosort">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_item as $dtm)
                    <tr>
                        <td class="table-plus">
                            <img src="{{asset('storage/'.$dtm->item_image_path)}}" width="70" height="70" alt="">
                        </td>
                        <td>{{$dtm->item_name}}</td>
                        <td>{{$dtm->item_stock}}</td>
                        <td>{{$dtm->item_category}}</td>
                        <td>{{$dtm->item_price}}</td>
                        <td>{{$dtm->item_quantity_get}}</td>
                        <td>{{$dtm->item_type_sell}}</td>
                        <td>{{$dtm->item_minimum}}</td>
                        <td>{{$dtm->item_status}}</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                    role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="/changeStatus/{{$dtm->item_id}}"><i
                                            class="fa fa-dot-circle-o"></i>Ubah
                                        Status</a>
                                    <a class="dropdown-item" href="/edit/{{$dtm->item_id}}"><i
                                            class="dw dw-edit2"></i>Edit</a>
                                    <a class="dropdown-item" href="/delete/{{$dtm->item_id}}"><i
                                            class="dw dw-delete-3"></i>Hapus</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('document').ready(function(){
        $('.data').DataTable({
            scrollCollapse: true,
            scrollX: true,
            autoWidth: false,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "language": {
                "info": "_START_-_END_ of _TOTAL_ entries",
                searchPlaceholder: "Search"
            },
        });
    });
</script>
@endsection