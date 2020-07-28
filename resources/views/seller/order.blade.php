@extends('seller.layout')

@section('title')
Pesanan
@endsection

@php
$seller = Auth::user();
$data_order = \App\buyerOrder::distinct()->select('buyer_name','buyer_address', 'buyer_phone_number',
'id_buyer',
'sender', 'sender_name', 'status_alone', 'status_order')->where('id_seller','=', $seller->id)->get();
@endphp

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
                            <li class="breadcrumb-item"><a href="/seller">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if (session('processComplete'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ session('processComplete') }}!</strong>
        </div>
        @endif

        @if (session('infoWhereToSendIt'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p style="text-align: justify">{{ session('infoWhereToSendIt') }} <br>
                @php
                $seller = Auth::user();
                $distinct_seller_info = \App\buyerOrder::distinct()->select('id_seller')->where('id_buyer','=',
                $id_user)->get();
                foreach ($distinct_seller_info as $dsi) {
                if($dsi->id_seller != $seller->id){
                $name_send = \App\item::where('item_id_seller','=', $dsi->id_seller)->first();
                echo '- '." ".$name_send->item_name_seller;
                echo '<br>';
                }
                }
                echo '.';
                @endphp
            </p>
        </div>
        @php
        session()->forget('infoWhereToSendIt');
        @endphp
        @endif
        @php
        $no = 1;
        @endphp
        <div class="card-box mb-30">
            <h2 class="h4 pd-20">Data Pesanan Terbaru</h2>
            <table class="data table stripe hover nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Alamat</th>
                        <th>Nomor Kontak</th>
                        <th>Barang Yang Dipesan</th>
                        <th>Total Harga</th>
                        <th>Tindakan Anda</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $wait_confirm_status = "Menunggu konfirmasi penjual";
                    $confirm_status = "Telah dikonfirmasi. Silahkan ditunggu!";
                    $true_alone = "true";
                    @endphp
                    @foreach ($data_order as $dto)
                    @php
                    $total_price = \App\buyerOrder::where([['id_buyer','=', $dto->id_buyer],['id_seller', '=',
                    $seller->id]])->sum('total_price');
                    @endphp
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$dto->buyer_name}}</td>
                        <td>{{Crypt::decrypt($dto->buyer_address)}}</td>
                        <td>{{Crypt::decrypt($dto->buyer_phone_number)}}</td>
                        <td><a href="/showDetailOrder/{{$dto->id_buyer}}" class="btn btn-primary">Lihat Detail</a></td>
                        <td>{{$total_price}}</td>
                        <td>

                            @if ($dto->sender == $seller->id && $dto->status_order == $wait_confirm_status)
                            <a href="/confirmOrder/{{$dto->id_buyer}}" class="btn btn-primary">Terima Pesanan</a>
                            @elseif($dto->sender == $seller->id && $dto->status_order == $confirm_status)
                            @if ($dto->status_alone == $true_alone)
                            <p>Persiapkan pesanannya untuk <br>
                                segera kirim ke alamat pemesan!</p>
                            @else
                            <p>Persiapkan pesanannya untuk <br>
                                segera kirim ke alamat pemesan! <br>
                                Kemudian minta ke tukang ojek <br>
                                untuk mengambil pesanan <br>
                                ke beberapa orang yang <br>
                                disebutkan sebelumnya!</p>
                            @endif
                            @else
                            <p>Mempersiapkan pesanannya.<br>
                                Pedagang bernama <br>
                                "{{$dto->sender_name}}" telah<br>
                                dipilih untuk <br>
                                memanggil tukang ojek!</p>
                            @endif
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
                searchPlaceholder: "Pencarian"
            },
        });
    });
</script>
@endsection