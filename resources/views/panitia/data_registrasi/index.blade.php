@extends('panitia.layout.app')
@section('content')
      <!-- page content -->
      <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users <small>Some examples to get you started</small></h3>
              </div>
              @include('sweetalert::alert')
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
                    <h2>Data Registrasi Ulang Siswa<small>Users</small></h2>
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
                          <th>TGL REGISTRASI</th>
                          <th>ID REGISTRASI</th>
                          <th>Nama Siswa</th>
                          <th>NO. SERI IJAZAH</th>
                          <th>NAMA AYAH</th>
                          <th>PEKERJAAN AYAH</th>
                          <th>NAMA IBU</th>
                          <th>PEKERJAAN IBU :</th>
                          <th>ALAMAT ORANGTUA :</th>
                          <th>NAMA WALI :</th>
                          <th>ALAMAT WALI :</th>
                          <th>TINGGAL BERSAMA :</th>
                          <th>ASAL KELURAHAN :</th>
                          <th>ASAL KECEMATAN :</th>
                          <th>ASAL KABUPATEN :</th>
                          <th>ASAL PROVINSI :</th>
                          <th>RT :</th>
                          <th>RW :</th>
                          <th>GOLONGAN DARAH :</th>
                          <th>JUMLAH SAUDARA KANDUNG :</th>
                          <th>FILE :</th>
                          <th>AKSI :</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($registrasi as $no =>$r)
                        <tr>
                          <td>{{ ++$no  }}</td>
                          <td>{{ \Carbon\Carbon::parse( $r->tgl_registrasi)->format('d-m-Y') }}</td>
                          <td>{{ $r->kode_rus }}</td>
                          <td>{{ $r->nama_siswa }}</td>
                          <td>{{ $r->no_seri_ijazah }}</td>
                          <td>{{ $r->nama_ayah }}</td>
                          <td>{{ $r->pekerjaan_ayah }}</td>
                          <td>{{ $r->nama_ibu }}</td>
                          <td>{{ $r->pekerjaan_ibu }}</td>
                          <td>{{ $r->alamat_ortu }}</td>
                          <td>{{ $r->nama_wali }}</td>
                          <td>{{ $r->alamat_wali }}</td>
                          <td>{{ $r->tinggal_bersama }}</td>
                          <td>{{ $r->asal_kelurahan }}</td>
                          <td>{{ $r->asal_kecematan }}</td>

                          <td>{{ $r->asal_kabupaten }}</td>
                          <td>{{ $r->asal_provinsi }}</td>
                          <td>{{ $r->rt }}</td>
                          <td>{{ $r->rw }}</td>
                          <td>{{ $r->golongan_darah }}</td>
                          <td>{{ $r->jmlh_saudara_kandung }}</td>
                          <td><img src="{{ asset('storage/'.$r->file_skhun) }}" alt="" class="img-responsive" width="100%" ></td>
                          <td><button type="button" class="btn btn-outline-success">
                          <a href="#">EDIT</button>
                          </td>
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