@extends('buyer.layout')

@section('title')
Status Pesanan
@endsection

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="page-header">
            <div class="row">
                <div class="col-7 col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Pesanan</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                        </ol>
                    </nav>
                </div>
                @if (count($data_order)!=null)
                @if ($data_order[0]->status_order == 'Telah dikonfirmasi. Silahkan ditunggu!')
                <div class="col-5 col-md-6 col-sm-12 text-right">
                    <a class="btn btn-primary" href="/receiveOrder">
                        Telah Diterima
                    </a>
                </div>
                @endif
                @endif
            </div>
        </div>
        @if (session('notifyReceiveSuccess'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ session('notifyReceiveSuccess') }}!</strong>
        </div>
        @endif

        @if (session('addComplete'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ session('addComplete') }}!</strong>
        </div>
        @endif

        @if (count($data_order)!=null)
        @if ($data_order[0]->status_order == 'Telah dikonfirmasi. Silahkan ditunggu!')
        <div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Apabila anda telah menerima pesanannya, segera tekan tombol "Telah Diterima" agar bisa
                memberitahukan kepada penjual bahwa pesanan anda telah sampai!</strong>
        </div>
        @endif
        @endif
        <div class="card-box mb-30">
            <h2 class="h4 pd-20">Status Pesanan Anda</h2>
            <table class="data table stripe hover nowrap">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Tipe Berat</th>
                        <th>Total Harga</th>
                        <th>Status Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_order as $dto)
                    <tr>
                        <td>{{$dto->item_name}}</td>
                        <td>{{$dto->item_quantity}}</td>
                        <td>{{$dto->item_type_sell}}</td>
                        <td>{{$dto->total_price}}</td>
                        <td>{{$dto->status_order}}</td>
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