@extends('siswa.app')
@section('content')
<main id="main">
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Profil</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>Profil</li>
      </ol>
    </div>

  </div>
</section>
<!-- End Breadcrumbs -->
<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">

    <div class="row">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="btn btn-success">Profil Siswa</div>

                <div class="card-body">
                <form  enctype="multipart/form-data">
                    @csrf
                    <!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                    </p>
                    <span class="section">Personal Info</span> -->
                @if(isset($pendaftaran[0]))
                    <div class="field item form-group">
                    <input type="hidden" class="form-control"   name="user_id" />
                        <label class="col-form-label col-md-3 col-sm-3  label-align">ID Pendaftaran<span class="required">*</span></label>
                        : {{ $pendaftaran[0]->kode_pcs }}
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Lengkap<span class="required">*</span></label>
                        : {{ $pendaftaran[0]->nama_siswa }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Asal Sekolah<span class="required">*</span></label>
                        : {{ $pendaftaran[0]->asal_sekolah }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Tempat, Tanggal Lahir<span class="required">*</span></label>
                        : {{ $pendaftaran[0]->tempat_lahir }},{{ \Carbon\Carbon::parse( $pendaftaran[0]->tgl_lahir)->format('d-m-Y') }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Jurusan<span class="required">*</span></label>
                        : {{ $pendaftaran[0]->nama_jurusan }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Tahun Ajaran <span class="required">*</span></label>
                        : {{ $pendaftaran[0]->tahun_ajaran }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Kelamin<span class="required">*</span></label>
                        : {{ $pendaftaran[0]->jk }}
                    <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">File Raport <span class="required">*</span></label>
                    <img src="{{ asset('storage/'.$pendaftaran[0]->file_raport) }}" alt="" class="img-responsive" width="100%" >
               
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Daftar<span class="required">*</span></label>
                        {{ \Carbon\Carbon::parse( $pendaftaran[0]->tgl_daftar)->format('d-m-Y') }}
                        <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Agama<span class="required">*</span></label>
                        : {{ $pendaftaran[0]->agama }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat<span class="required">*</span></label>
                        : {{ $pendaftaran[0]->alamat }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nomor Tlp<span class="required">*</span></label>
                        : {{ $pendaftaran[0]->no_tlp }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">email<span class="required">*</span></label>
                        : {{ $pendaftaran[0]->email }}
                    <input type="hidden" class="form-control"   name="status" />
                @endif  
            @if(isset($registrasi[0]))
           

                    <div class="field item form-group">
                    <input type="hidden" class="form-control"   name="user_id" />
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nomor Seri Ijasah<span class="required">*</span></label>
                : {{ $registrasi[0]->no_seri_ijazah }}
                    </div>
                    <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">File SKHUN <span class="required">:</span></label>
                    <img src="{{ asset('storage/'.$registrasi[0]->file_skhun) }}" alt="" class="img-responsive" width="100%" >

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Ayah<span class="required">*</span></label>
                        : {{ $registrasi[0]->nama_ayah }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Pekerjaan Ayah<span class="required">*</span></label>
                        : {{ $registrasi[0]->pekerjaan_ayah }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Ibu<span class="required">*</span></label>
                        : {{ $registrasi[0]->nama_ibu }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Pekerjaan Ibu<span class="required">*</span></label>
                        : {{ $registrasi[0]->pekerjaan_ibu }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat Orang Tua<span class="required">*</span></label>
                        : {{ $registrasi[0]->alamat_ortu }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Wali<span class="required">*</span></label>
                        : {{ $registrasi[0]->nama_wali }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat Wali<span class="required">*</span></label>
                        : {{ $registrasi[0]->alamat_wali }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Tinggal Bersama<span class="required">*</span></label>
                        : {{ $registrasi[0]->tinggal_bersama }}
                     <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Asal Kelurahan<span class="required">*</span></label>
                        : {{ $registrasi[0]->asal_kelurahan }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Asal Kecematan<span class="required">*</span></label>
                        : {{ $registrasi[0]->asal_kecematan }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Asal Kabupaten<span class="required">*</span></label>
                        : {{ $registrasi[0]->asal_kabupaten }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Asal Provinsi<span class="required">*</span></label>
                        : {{ $registrasi[0]->asal_provinsi }}
                    <div class="row">
                    <div class="col-form-label col-md-4 col-sm-4  label-align">
                      <div class="field item form-group">
                <div class="col-md-6 col-sm-6">
                      <label>RT<span class="required"> : {{ $registrasi[0]->rt }}</span></label>
                      </div>
                      <div class="col-md-6 col-sm-6">
                     
                      </div>
                      </div>
                    </div>
                    <div class="col-form-label col-md-4 col-sm-4  label-align">
                      <div class="field item form-group">
                <div class="col-md-6 col-sm-6">
                      <label>RW<span class="required"> : {{ $registrasi[0]->rw }}</span></label>
                      </div>
                      <div class="col-md-6 col-sm-6">
                     
                      </div>
                      </div>
                    </div>
                  </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Golongan Darah<span class="required">*</span></label>
                        : {{ $registrasi[0]->golongan_darah }}
                     <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Registrasi <span class="required">*</span></label>
                        : {{ \Carbon\Carbon::parse( $registrasi[0]->tgl_registrasi)->format('d-m-Y') }}  
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Jumlah Saudara Kandung<span class="required">*</span></label>
                        : {{ $registrasi[0]->jmlh_saudara_kandung }}
            @endif       
                    <input type="hidden" class="form-control"   name="status" />
                    <div class="field item form-group">
                                <label class="col-form-label col-md-6 col-sm-6  label-align"><span class="required">
                            @if(isset($pendaftaran[0]))        
                                <a href="{{ route('siswa.edit_pendaftaran',['id'=>$pendaftaran[0]->id]) }}" button type="submit" class="btn btn-primary">Edit Pendaftaran</a>
                            @endif 
                            @if(isset($registrasi[0]))
                                <a href="{{ route('siswa.edit_registrasi',['id'=>$registrasi[0]->id]) }}" button type='submit' class="btn btn-success">Edit Registrasi</a>
                            @endif 
                    </div>
                </form>
                </div>
            
            </div>
        </div>
    </div>
</div>
</div>
  </div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{ asset('adminassets') }}/vendors/validator/multifield.js"></script>
    <script src="{{ asset('adminassets') }}/vendors/validator/validator.js"></script>
    
    <!-- Javascript functions	-->
	<script>
		function hideshow(){
			var password = document.getElementById("password1");
			var slash = document.getElementById("slash");
			var eye = document.getElementById("eye");
			
			if(password.type === 'password'){
				password.type = "text";
				slash.style.display = "block";
				eye.style.display = "none";
			}
			else{
				password.type = "password";
				slash.style.display = "none";
				eye.style.display = "block";
			}

		}
	</script>

    <script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);

    </script>

    <!-- jQuery -->
    <script src="{{ asset('adminassets') }}/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('adminassets') }}/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="{{ asset('adminassets') }}/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="{{ asset('adminassets') }}/vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <!-- <script src="{{ asset('adminassets') }}/vendors/validator/validator.js"></script> -->

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('adminassets') }}/build/js/custom.min.js"></script>
</section><!-- End Blog Section -->
</main><!-- End #main -->
@endsection

