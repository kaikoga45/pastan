@extends('buyer.layout')

@section('title')
Profil
@endsection

@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Profile</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profil</li>
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

            @if (session('noProfileData'))
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{ session('noProfileData') }}!</strong>
            </div>
            @endif

            @if (session('notImage'))
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{ session('notImage') }}!</strong>
            </div>
            @endif

            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="profile-photo">
                            <img src="{{asset('image/'.$data_user->image_path)}}" alt="" class="avatar-photo">
                        </div>
                        <h5 class="text-center h5 mb-0">{{$data_user->name}}</h5>
                        <p class="text-center text-muted font-14">Bergabung sejak {{$data_user->created_at}}</p>
                        <div class="profile-info">
                            <h5 class="mb-20 h5 text-blue">Kontak Informasi</h5>
                            <ul>
                                <li>
                                    <span>Alamat Email:</span>
                                    {{$data_user->email}}
                                </li>
                                <li>
                                    <span>Nomor Telepon</span>
                                    @if ($data_user->phone_number == null)
                                    Belum dimasukkan!
                                    @else
                                    {{Crypt::decrypt($data_user->phone_number)}}
                                    @endif
                                </li>
                                <li>
                                    <span>Alamat tempat tinggal:</span>
                                    @if ($data_user->address == null)
                                    Belum dimasukkan!
                                    @else
                                    {{Crypt::decrypt($data_user->address)}}
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                    <div class="card-box height-100-p overflow-hidden">
                        <div class="profile-tab height-100-p">
                            <div class="tab height-100-p">
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#setting"
                                            role="tab">Settings</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    @php
                                    if ($data_user->phone_number == null && $data_user->address == null){
                                    $phone_number = "";
                                    $address = "";
                                    }else{
                                    $phone_number = Crypt::decrypt($data_user->phone_number);
                                    $address = Crypt::decrypt($data_user->address);
                                    }
                                    @endphp

                                    <!-- Setting Tab start -->
                                    <div class="tab-pane fade height-100-p active show" id="setting" role="tabpanel">
                                        <div class="profile-setting">
                                            <form method="POST" action="/postUpdateProfileBuyer"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <ul class="profile-edit-list row">
                                                    <li class="weight-500 col-md-6">
                                                        <h4 class="text-blue h5 mb-20">Ubah informasi pribadi anda</h4>
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input class="form-control form-control-lg" type="text"
                                                                value="{{$data_user->name}}" name="name" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nomor Telepon</label>
                                                            <input class="form-control form-control-lg" type="text"
                                                                name="phone_number" value="{{$phone_number}}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <textarea class="form-control" name="address"
                                                                required>{{$address}}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Foto Profil</label>
                                                            <input class="form-control form-control-file" type="file"
                                                                name="image">
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <input type="submit" class="btn btn-primary"
                                                                value="Update Informasi">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Setting Tab End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection