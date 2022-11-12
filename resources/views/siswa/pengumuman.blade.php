@extends('siswa.app')
@section('content')
<main id="main">
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Pengumuman</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>Pengumuman</li>
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
                <div class="btn btn-success">Form Pengumuman</div>

                <div class="card-body">
                <form class="" action="" method="post" novalidate>
                    <!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                    </p>
                    <span class="section">Personal Info</span> -->
                @if(isset($pengumuman[0]))
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Judul Pengumuman</label>
                        : {{ $pengumuman[0]->judul_pengumuman }}
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Deskripsi :<span class="required"></span></label>
                        : {{ $pengumuman[0]->deskripsi }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Status<span class="required"></span></label>
                        :
                        @if($pengumuman[0]->status == $pendaftaran[0]->status);
                        <button type="button" class="btn btn-outline-success">
                         {{ $pendaftaran[0]->status }}</button>
                    <div class="field item form-group">
                        @elseif($pengumuman[0])
                        <button type="button" class="btn btn-outline-success">
                         {{ $pengumuman[0]->status }}</button>
                         @endif
                 @endif
                 
                @if(isset($pendaftaran[0]))
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">ID Registrasi<span class="required"></span></label>
                        : {{ $pendaftaran[0]->kode_pcs }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nama<span class="required"></span></label>
                        : {{ $pendaftaran[0]->nama_siswa }}

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Jurusan<span class="required"></span></label>
                        : {{ $pendaftaran[0]->nama_jurusan }}
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Asal Sekolah<span class="required"></span></label>
                        : {{ $pendaftaran[0]->asal_sekolah }}

                    
             
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Tempat,Tanggal Lahir<span class="required"></span></label>
                        : {{ $pendaftaran[0]->tempat_lahir }},{{ \Carbon\Carbon::parse( $pendaftaran[0]->tgl_lahir)->format('d-m-Y') }}


                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Kelamin<span class="required"></span></label>
                        : {{ $pendaftaran[0]->jk }}
                    <div class="ln_solid">
                        <div class="form-group">
                     @if(isset($pengumuman[0]))    
                        @if($pengumuman[0]->status == "Di Terima")
                            <div class="col-md-6 offset-md-3">
                                <!-- <button type='submit' class="btn btn-primary">Submit</button> -->
                                <a href="{{ route ('siswa.registrasi') }}" class="btn btn-success">REGISTRASI SISWA</a>
                            
                                <p class="text-danger">
                                <small >Jika Status Pengumuman Di Terima,Silahkan Klik Tombol Registrasi Siswa Untuk melakukan Proses Registrasi Ulang.</p></small>
                            </div>
                     
                        @endif    
                        </div>
                    @endif 
                    </div>
                @endif 
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

