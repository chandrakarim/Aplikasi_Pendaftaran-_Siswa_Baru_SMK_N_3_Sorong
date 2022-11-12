@extends('admin.layout.app')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Form Tambah Data Admin</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <form method="POST" action="{{ route('admin.data_panitia.update',['id' => $user->id]) }}">
                @csrf
                <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Silahkan Masukan Username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Silahkan Masukan email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" value="{{ $user->password }}" id="exampleInputPassword1" placeholder="Silahkan Masukan Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password_confirmation" value="{{ $user->password}}"   id="exampleInputPassword1" placeholder="Silahkan Masukan Konfirmasi Password">
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select name="jk" class="form-control" >
                    <option selected value="{{ $user->jk }}">{{ $user->jk }}</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Tlp</label>
                    <input type="number" class="form-control" name="no_tlp" value="{{ $user->no_tlp }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Silahkan Masukan Nomor Tlp">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /page content -->
@endsection