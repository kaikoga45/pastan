@extends('seller.layout')

@section('title')
Panduan
@endsection

@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Topik yang Sering Ditanyakan</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/seller">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Bantuan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="faq-wrap">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq1">
                                Bagaimana kegunaan status menjual di halaman dashboard?
                            </button>
                        </div>
                        <div id="faq1" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Status menjual tersebut mempunyai fungsi agar bisa menentukan apakah semua barang yang
                                dijual oleh anda akan ditampilkan ke halaman pembeli. Jika status menjual adalah Aktif,
                                maka semua barang yang berstatus "tersedia" akan ditampilkan ke halaman pembeli. Namun
                                jika status menjual adalah istrahat, maka semua barang anda tidak akan ditampilkan di
                                halaman pembeli.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq2">
                                Apa kegunaan status barang di halaman barang?
                            </button>
                        </div>
                        <div id="faq2" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Status barang berfungsi agar bisa menentukan apakah barang tersebut akan ditampilkan ke
                                halaman pembeli. Apabila status barangnya adalah tersedia maka barang tersebut akan
                                ditampilkan ke halaman pembeli. Namun jika status barang adalah tidak tersedia, maka
                                barang tersebut tidak akan ditampilkan di halaman pembeli.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq3">
                                Apa yang harus dilakukan apabila ada pesanan di halaman pesanan?
                            </button>
                        </div>
                        <div id="faq3" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Apabila ada pesanan, maka anda tinggal mengklik tombol "Terima Pesanan" disamping data
                                orang yang ada pesan agar bisa memberitahukan kepada pemesan bahwa pesannya sedang
                                diproses. Untuk melihat apa saja yang dipesankan, anda bisa melihat dengan
                                cara klik tombol "Lihat Detail" yang akan menampilkan informasi berupa nama barang,
                                jumlah barang, tipe berat, serta catatan dari pembelinya.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq4">
                                Kenapa ada muncul pesan "Anda telah dipilih untuk memanggil tukang ojek..." saat setelah
                                tekan tombol "Terima Pesanan" di halaman pesanan?
                            </button>
                        </div>
                        <div id="faq4" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                Apabila anda menerima pesan tersebut, maka itu menandakan bahwa pemesan telah memesan
                                sebuah barang yang tidak dijual oleh anda alias barang yang dijual oleh penjual lainnya.
                                Tindakan anda apabila menerima pesan tersebut yaitu segera persiapkan pesanannya dan
                                segera panggil tukang ojek untuk mengambil pesannya. Lalu anda meminta tukang ojeknya
                                untuk menjemput barang lainnya yang telah dipesan oleh pemesan ke penjual yang namanya
                                sudah disebutkan dalam pesan "Anda telah dipilih untuk memanggil tukang ojek...".
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq5">
                                Bagaimana cara menambahkan data barang?
                            </button>
                        </div>
                        <div id="faq5" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                1. Pergi ke menu barang dengan cara klik simbol yang berbentuk tiga garis, kemudian
                                pilih menu barang.<br>
                                2. Dengan mengklik menu barang, anda akan dibawakan ke halaman barang yang menampilkan
                                semua data barang. Untuk menambahkan data barang, silahkan klik tombol biru yang ada
                                tulisan "Tambah Barang".<br>
                                3. Kemudian anda silahkan masukkan semua keterangan mengenai barang yang anda ingin
                                tambahkan ke sistem PasTan melalui kolom inputan yang sudah tersedia.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq6">
                                Bagaimana cara melakukan perubahan keterangan barangnya?
                            </button>
                        </div>
                        <div id="faq6" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                1. Pergi ke menu barang, dengan cara klik sebuah simbol yang ada garis tiga yang
                                terletak di pojok kiri atas. Lalu pilih menu barang. <br>
                                2. Setelah anda menekan menu barang, akan dibawakan ke halaman barang yang menampilkan
                                semua data barang anda telah masukkan sebelumnnya. Untuk mengubah keterangnnya, silahkan
                                anda geser ke kanan di bagian kolom yang ditampilkan sampai ketemu tanda tiga titik di
                                bagian kolom "Aksi". <br>
                                3. Klik tanda tiga titik tersebut, lalu pilih menu "edit". Anda akan dibawakan ke
                                halaman perubahan keterangan barang yang anda ingin ubah. Silahkan merubahkan data yang
                                anda ingin ubah di bagian kolom-kolom yang tersedia.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq7">
                                Bagaimana cara menghapuskan barang tersebut?
                            </button>
                        </div>
                        <div id="faq7" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                1. Pergi ke menu barang, dengan cara klik sebuah simbol yang ada garis tiga yang
                                terletak di pojok kiri atas. Lalu pilih menu barang. <br>
                                2. Setelah anda menekan menu barang, akan dibawakan ke halaman barang yang menampilkan
                                semua data barang anda telah masukkan sebelumnnya. Untuk menghapuskan barangnya,
                                silahkan
                                anda geser ke kanan di bagian kolom yang ditampilkan sampai ketemu tanda tiga titik di
                                bagian kolom "Aksi". <br>
                                3. Klik tanda tiga titik tersebut, lalu pilih menu "hapus". Setelah telah pilih menu
                                "hapus" tersebut, maka semua data yang berkaitan dengan barang yang anda pilih telah
                                berhasil dihapuskan.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq8">
                                Bagaimana cara mengubah status barang tersebut?
                            </button>
                        </div>
                        <div id="faq8" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                1. Pergi ke menu barang, dengan cara klik sebuah simbol yang ada garis tiga yang
                                terletak di pojok kiri atas. Lalu pilih menu barang. <br>
                                2. Setelah anda menekan menu barang, akan dibawakan ke halaman barang yang menampilkan
                                semua data barang anda telah masukkan sebelumnnya. Untuk mengubah status barangnya,
                                silahkan
                                anda geser ke kanan di bagian kolom yang ditampilkan sampai ketemu tanda tiga titik di
                                bagian kolom "Aksi". <br>
                                3. Klik tanda tiga titik tersebut, lalu pilih menu "Ubah status". Setelah telah pilih
                                menu
                                "Ubah Status" tersebut, maka status barang tersebut telah berhasil dirubah.
                            </div>
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