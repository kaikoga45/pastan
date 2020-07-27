@extends('seller.layout')

@section('title')
Detail Pesanan
@endsection

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="page-header">
            <div class="row">
                <div class="col-7 col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Detail Pesanan</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/transaction">Pesanan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Pesanan</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-5 col-md-6 col-sm-12 text-right">
                    <a class="btn btn-info" href="/transaction">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
        <div class="card-box mb-30">
            <h2 class="h4 pd-20" style="text-align: justify">Berikut ini sejumlah daftar pesanan yang diminta oleh
                "{{$data_order[0]->buyer_name}}"
            </h2>
            <table class="data table stripe hover nowrap">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Tipe Berat</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_order as $dto)
                    <tr>
                        <td>{{$dto->item_name}}</td>
                        <td>{{$dto->item_quantity}}</td>
                        <td>{{$dto->item_type_sell}}</td>
                        @if ($dto->note == null)
                        <td>Tidak Ada</td>
                        @else
                        <td>{{$dto->note}}</td>
                        @endif
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