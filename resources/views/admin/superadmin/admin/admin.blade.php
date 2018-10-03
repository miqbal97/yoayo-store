@extends('admin.master')

@section('title', 'Manajemen Admin')

@section('extra_css')

    {{ Html::style('admin_assets/component/datatables.net-bs/css/dataTables.bootstrap.min.css') }}

@endsection

@section('content-header')
<h1>
    Manajamen Akun Admin
    <small>Halaman manajemen akun admin</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('beranda_admin') }}"><i class="fa fa-home"></i> Beranda</a></li>
    <li><i class="fa fa-terminal fa-fw"></i> Superadmin</li>
    <li class="active"><i class="fa fa-users fa-fw"></i> Admin</li>
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
        <div class="box box-solid box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Table Akun Admin
                </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#tambah_admin">
                        <i class="fa fa-plus fa-fw"></i> Buat Akun Admin
                    </button>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover" id="table_admin">
                    <thead>
                        <tr>
                            <th>ID Admin</th>
                            <th>Nama Admin</th>
                            <th>SuperAdmin</th>
                            <th>Di Blokir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1; ?>
                        @foreach ($data_admin as $item)
                            <tr>
                                <td id="id_{{ $counter }}">{{ $item->id_admin }}</td>
                                <td>{{ $item->nama_lengkap  }}</td>
                                <td>
                                    @if ($item->superadmin == true)
                                        <span class="label bg-green"><i class="fa fa-check fa-fw"></i> SuperAdmin</span>
                                    @else
                                        <span class="label bg-red"><i class="fa fa-close fa-fw"> Bukan SuperAdmin</i></span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->diblokir == true)
                                        <span class="label bg-red"><i class="fa fa-ban fa-fw"></i> Di Blokir</span>
                                    @else
                                        <span class="label bg-green"><i class="fa fa-check fa-fw"></i> Tidak Di Blokir</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                            Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#" class="detail_admin"><i class="fa fa-user fa-fw"></i> Lihat Profile </a>
                                            </li>
                                            <li>
                                                <a href="#" class="hapus_admin" data-toggle="modal" data-target="#hapus_admin" id="{{ $counter }}">
                                                    <i class="fa fa-trash fa-fw"></i> Hapus Akun
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php $counter++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
<div class="modal modal-default fade" id="tambah_admin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Admin</h4>
            </div>
            {!! Form::open(['route' => 'tambah_admin', 'id' => 'form_tambah_admin', 'enctype' => 'multipart/form-data']) !!}
                <div class="modal-body row">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            {!! Form::label('inp_nama_admin', 'Nama Lengkap Admin') !!}
                            {!! Form::text('nama_lengkap',  null, ['id' => 'inp_nama_admin', 'class' => 'form-control']) !!}
                            <span class="help-block"><small>Masukan nama admin tanpa karakter khusus dan angka</small></span>
                        </div>
                        <div class="form-group has-feedback">
                            {!! Form::label('inp_email_aktif', 'Email Aktif') !!}
                            {!! Form::email('email',  null, ['id' => 'inp_email_aktif', 'class' => 'form-control']) !!}
                            <span class="help-block"><small>Silahkan masukan email aktif </small></span>
                        </div>
                        <div class="form-group has-feedback">
                            {!! Form::label('inp_foto_admin', 'Foto Admin') !!}
                            {!! Form::file('foto', ['id' => 'inp_foto_admin', 'class' => 'form-control' , 'style' => 'border: none;', 'accept' => '.jpg, .jpeg, .png']) !!}
                            <span class="help-block"><small>Silahkan pilih foto admin</small></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            {!! Form::label('inp_password', 'Password Sementara') !!}
                            {!! Form::password('password', ['id' => 'inp_password', 'class' => 'form-control']) !!}
                            <span class="help-block"><small>Silahkan masukan password admin tanpa karakter khusus</small></span>
                        </div>
                        <div class="form-group has-feedback">
                            <button type="button" class="btn btn-primary" id="password_generator">Dapatkan Password Default</button>
                            <span class="help-block"><small>Silahkan ulangi password admin di atas</small></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="simpan" value="true" class="btn btn-primary">Simpan Data Admin</button>
                </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
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

@section('extra_js')

    {{ Html::script('admin_assets/component/datatables.net/js/jquery.dataTables.min.js') }}
    {{ Html::script('admin_assets/component/datatables.net-bs/js/dataTables.bootstrap.min.js') }}

    <script>
        $(document).ready(function() {
            $('#table_admin').DataTable({
                'lengthChange': false,
                'length': 10,
                'searching': false
            })
        })
    </script>

@endsection