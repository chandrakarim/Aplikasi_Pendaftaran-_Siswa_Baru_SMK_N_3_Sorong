@extends('panitia.layout.app')
@section('content')
      <!-- page content -->
      <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
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
            </div>
            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                  <h2>DATA PENGUMUMAN</h2>
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
                    <p class="text-muted font-13 m-b-30">
                      Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                    </p>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                      <tr>
                          <th>NO</th>
                          <th>ID PENGUMUMAN</th>
                          <th>NAMA SISWA</th>
                          <th>Email</th>
                          <th>No.TLP</th>
                          <th>STATUS</th>
                          <th>JUDUL PENGUMUMAN</th>
                          <th>DESKRIPSI PENGUMUMAN</th>
                          <th>Nama Panitia</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($pengumuman as $no =>$pn)
                        <tr>
                          <td>{{ ++$no }}</td>
                          <td>{{ $pn->kode_pgn }}</td>
                          <td>{{ $pn->nama_siswa }}</td>
                          <td>{{ $pn->email }}</td>
                          <td>{{ $pn->no_tlp }}</td>
                          <td>{{ $pn->status }}</td>
                          <td>{{ $pn->judul_pengumuman }}</td>
                          <td>{{ $pn->deskripsi }}</td>
                          <td>{{ $pn->nama_panitia }}</td>
                       
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        <!-- /page content -->
@endsection