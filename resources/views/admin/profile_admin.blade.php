@extends('admin.master')

@section('title', 'Manajemen Admin')

@section('extra_css')

    <style>
        .profile-user-img {
            width: 120px;
        }
    </style>

@endsection

@section('content-header')
<h1>
    Profile @if($data_admin->superadmin == true) SuperAdmin @else Admin @endif
    <small>Halaman profile admin</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('beranda_admin') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li><i class="fa fa-user fa-fw"></i> Profile</li>
</ol>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> ERROR!</h4>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </div>
        @elseif (session()->has('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="col-md-3 col-sm-12">

        <!-- Profile Image -->
        <div class="box box-primary solid">
            <div class="box-body box-profile">

                {{  Html::image(asset('storage/avatars/admin/'.$data_admin->foto), $data_admin->nama_lengkap,
                        [
                            'class' => 'profile-user-img img-responsive img-circle'
                        ])
                }}

                <h3 class="profile-username text-center">{{ $data_admin->nama_lengkap }}</h3>

                <p class="text-muted text-center">
                    @if($data_admin->superadmin == true)
                        Software Engineer
                    @else
                        Site Administrator
                    @endif
                </p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>SuperAdmin</b>
                        @if ($data_admin->superadmin == true)
                            <span class="label bg-green pull-right"><i class="fa fa-check"></i> Superadmin</span>
                        @else
                            <span class="label bg-red pull-right"><i class="fa fa-close"></i> Bukan Superadmin</span>
                        @endif
                    </li>
                    @if ($data_admin->superadmin == true)
                    <li class="list-group-item">
                        <b>Di Blokir</b>
                        @if ($data_admin->diblokir == true)
                            <span class="label bg-red pull-right"><i class="fa fa-ban"></i> Di Blokir</span>
                        @else
                            <span class="label bg-green pull-right"><i class="fa fa-check"></i> Tidak Di Blokir</span>
                        @endif
                    </li>
                    @endif
                    <li class="list-group-item">
                        <b>Bergabung</b> <a class="pull-right">{{ $data_admin->tanggal_bergabung }}</a>
                    </li>
                </ul>

                <a href="{{ route('beranda_admin') }}" class="btn btn-warning btn-block"><b><i class="fa fa-arrow-left fa-fw"></i> Kembali Ke Beranda</b></a>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-9">
        <div class="box box-primary box-solid">
            <div class="box-header">
                <h3 class="box-title">Informasi Detail</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-sm btn-warning btn-flat"><i class="fa fa-key fa-fw"></i> Ganti Password</button>
                </div>
            </div>
            <div class="box-body row">
                <div class="col-md-6">
                    <h3 class="profile-username">#ID Admin</h3>
                    <p class="text-muted">{{ $data_admin->id_admin }}</p>
                    <h3 class="profile-username">Nama lengkap</h3>
                    <p class="text-muted">{{ $data_admin->nama_lengkap }}</p>
                    <h3 class="profile-username">Superadmin</h3>
                    @if ($data_admin->superadmin == true)
                        <p><span class="label bg-green"><i class="fa fa-check"></i> Superadmin</span></p>
                    @else
                        <p><span class="label bg-red"><i class="fa fa-close"></i> Bukan Superadmin</span></p>
                    @endif
                </div>
                <div class="col-md-6">
                    <h3 class="profile-username">Email Admin</h3>
                    <p class="text-muted">{{ $data_admin->email }}</p>
                    <h3 class="profile-username">Tanggal Bergabung</h3>
                    <p class="text-muted">{{ $data_admin->tanggal_bergabung }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal modal-default fade" id="hapus_admin">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Anda Yakin Ingin Lanjutkan ?</h4>
                </div>
                {!! Form::open(['id' => 'form_hapus_admin']) !!}
                    <div class="modal-footer">
                        @csrf
                        <button type="button" class="btn pull-left" data-dismiss="modal">Batal</button>
                        <button type="submit" name="simpan" value="true" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i> Hapus admin</button>
                    </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection