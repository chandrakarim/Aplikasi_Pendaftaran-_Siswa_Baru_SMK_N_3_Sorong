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
  @include('sweetalert::alert')
    <div class="row">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="btn btn-success">Profil Siswa</div>

                <div class="card-body">
                <form action="{{ route('siswa.edit_pendaftaran.update',['id' => $pendaftaran[0]->id])}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                    </p>
                    <span class="section">Personal Info</span> -->
                @if(isset($pendaftaran[0]))
                    <div class="field item form-group">
                    <input type="hidden" class="form-control"   name="user_id" />
                        <label class="col-form-label col-md-3 col-sm-3  label-align">ID Pendaftaran<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="kode_pcs" value="{{ $pendaftaran[0]->kode_pcs }}" readonly/>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Lengkap<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="nama_siswa" value="{{ $pendaftaran[0]->nama_siswa }}"/>
                        </div>
                    </div>  
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Asal Sekolah<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="asal_sekolah" value="{{ $pendaftaran[0]->asal_sekolah }}"/>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Tempat Lahir<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" class='optional' name="tempat_lahir" data-validate-length-range="5,15" type="text" value="{{ $pendaftaran[0]->tempat_lahir }}" />
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Lahir<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" class='date' type="date" name="tgl_lahir" value="{{ $pendaftaran[0]->tgl_lahir }}"></div>
                    </div>
                  
                    <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Jurusan<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                        <select  class="form-control" name="jurusan_id">
                        <option selected value="{{ $pendaftaran[0]->jurusan_id }}">{{ $pendaftaran[0]->nama_jurusan }}</option>
                        @foreach ($jurusan as $j)
                            <option value="{{ $j->id }}">{{ $j->nama }}</option>
                        @endforeach
                        </select>                   
                     </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Tahun Ajaran <span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" class='optional' name="tahun_ajaran" data-validate-length-range="5,15" type="text" value="{{ $pendaftaran[0]->tahun_ajaran }}" />
                        </div>
                    </div>
                
                    <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Kelamin<span class="required">*</span></label>
                    <div class="col-md-7 col-sm-7">
                        <select name ="jk" class="form-control">
                        <option selected value="{{ $pendaftaran[0]->jk }}">{{ $pendaftaran[0]->jk }}</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        </select>                   
                     </div>

                    <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">File Raport <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                    <input class="form-control" class='optional' name="file_raport" data-validate-length-range="5,15" type="file" />
                    <img src="{{ asset('storage/'.$pendaftaran[0]->file_raport) }}" alt="" class="img-responsive" width="100%" >
                        </div>
                    </div>
               
               
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Daftar<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" class='text' type="text" name="tgl_daftar" value="{{ \Carbon\Carbon::parse( $pendaftaran[0]->tgl_daftar)->format('d-m-Y') }}" readonly>
                        </div>
                    </div>
                        
                    <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Agama<span class="required">*</span></label>
                    <div class="col-md-7 col-sm-7">
                        <select name ="agama" class="form-control">
                        <option selected value="{{ $pendaftaran[0]->agama }}">{{ $pendaftaran[0]->agama }}-</option>
                        <option value="Islam">Islam</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Khonghucu">Khonghucu</option>
                        </select>                   
                     </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <textarea class="form-control" type="text" required="required" name="alamat">{{ ($pendaftaran[0]->alamat) }}</textarea></div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nomor Tlp<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" type="tel" class='tel' name="no_tlp" required='required' data-validate-length-range="8,20" value="{{ $pendaftaran[0]->no_tlp }}" /></div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">email<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" name="email" class='email' required="required" type="email" value="{{ $pendaftaran[0]->email }}" /></div>
                    </div>
                    <input type="hidden" class="form-control"   name="status" />
                @endif        
                    <input type="hidden" class="form-control"   name="status" />
                    <div class="field item form-group">
                    <label class="col-form-label col-md-6 col-sm-6  label-align"><span class="required">
                    <button type='submit' class="btn btn-primary">Simpan</button>
                    </span></label>
                    
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

