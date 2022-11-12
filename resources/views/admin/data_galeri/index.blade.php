@extends('admin.layout.app')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <!-- <div class="page-title">
              <div class="title_left">
                <h3>Users <small>Some examples to get you started</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div> -->

        <div class="clearfix"></div>
        @include('sweetalert::alert')
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                  <a href="{{ route ('admin.tambah.galeri') }}" class="btn btn-primary"  role="button">Tambah Data</a>
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
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                            <h2>Data Galeri <small>Users</small></h2>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <!-- <th>ID Berita</th> -->
                          <th>Nama</th>
                          <th>Tanggal</th>
                          <th>Foto</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($galeri as $g)
                        <tr>
                          <td>{{ $g->id }}</td>
                          <td>{{ $g->judul }}</td>
                          <td>{{ $g->tanggal }}</td>
                          <td><img src="{{ asset('storage/'.$g->foto) }}" alt="" class="img-responsive" width="140px" ></td>
                          <td align="center">
                          <button type="button" class="btn btn-outline-success"><a href="#">Detail</button>
                          <button type="button" class="btn btn-outline-primary"><a href="#">Edit</button>
                          <button type="button" class="btn btn-outline-danger">
                            <a href="{{ route('admin.galeri.delete',['id'=>$g->id]) }}" onclick="return confirm('Yakin Hapus data')">Hapus</button>
                          
                          </td>
                        </tr>
                     @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
           
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

@endsection