@extends('panitia.layout.app')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
                <!-- <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Form Validation</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div> -->
                    @include('sweetalert::alert')
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Tambah Data Pengumuman</h2>
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
                                    <form  action="{{ route('panitia.pengumuman.store') }}" method="POST"  enctype="multipart/form-data">
                                        <!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                                        </p>
                                        <span class="section">Personal Info</span> -->
                                        @csrf
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ID PENGUMUMAN<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control"  name="kode_pgn" value="{{'PGN-'.$kd }}"   readonly />
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">JUDUL PENGUMUMAN<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="judul_pengumuman"  required="required" />
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">CALON SISWA</label>
                                            <div class="col-md-6 col-sm-6">
                                            <select required class="form-control" name="calon_siswa_id" id="exampleFormControlSelect2">
                                            <option value="" disabled selected>Pilih NAMA SISWA</option>
                                            @foreach ($pendaftaran as $calon)
                                                <option value="{{ $calon->id }}">{{ $calon->nama_siswa }}</option>
                                            @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">DESKRIPSI PENGUMUMAN<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="deskripsi" placeholder="Masukan Judul Berita" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">STATUS</label>
                                            <div class="col-md-6 col-sm-6">
                                            <select required class="form-control" name="status" id="exampleFormControlSelect2">
                                            <option value="" disabled selected>Pilih Kategori</option>
                                            <option value="Di Terima">Di Terima</option>
                                            <option value="Tidak Lulus Seleksi">Tidak Lulus Seleksi</option>

                                            </select>
                                            </div>
                                        </div>

     
                                        
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary">Submit</button>
                                                    <button type='reset' class="btn btn-success">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
@endsection