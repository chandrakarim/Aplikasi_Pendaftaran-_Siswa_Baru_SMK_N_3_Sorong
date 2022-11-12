@extends('siswa.app')
@section('content')
<main id="main">
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Registrasi</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>Registrasi</li>
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
                <div class="btn btn-success">Form Registrasi Siswa</div>
                @include('sweetalert::alert')
                <div class="card-body">
                <form action="{{ route('siswa.registrasi.store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <!-- <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                    </p>
                    <span class="section">Personal Info</span> -->
                    <div class="field item form-group">
                    <input type="hidden" class="form-control"   name="user_id" />
                    <input class="form-control" type="hidden"  name="nis" value="{{'NIS-'.$nis }}" />
                        <label class="col-form-label col-md-3 col-sm-3  label-align">ID Registrasi Ulang Siswa<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control"  name="kode_rus" value="{{'RUS-'.$kd }}"   readonly/>
                        </div>
                    </div>

                    <div class="field item form-group">
                    <input type="hidden" class="form-control"   name="user_id" />
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nomor Seri Ijasah<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" type="number"  data-validate-length-range="6" data-validate-words="2" name="no_seri_ijazah" placeholder="Masukan Nomor Seri Ijasah" required="required" />
                        </div>
                    </div>
                    <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Upload File SKHUN <span class="required">*</span></label>
                    <div class="col-md-7 col-sm-7">
                    <input class="form-control" class='optional' name="file_skhun" data-validate-length-range="5,15" type="file" /></div>
                </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Ayah<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" class='optional' name="nama_ayah" data-validate-length-range="5,15" type="text" placeholder="Masukan Nama Ayah" /></div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Pekerjaan Ayah<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" class='optional' name="pekerjaan_ayah" data-validate-length-range="5,15" type="text" placeholder="Masukan Pekerjaan Ayah" /></div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Ibu<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" class='date' type="text" name="nama_ibu" required='required' placeholder="Masukan Nama Ibu" ></div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Pekerjaan Ibu<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" class='date' type="text" name="pekerjaan_ibu" required='required' placeholder="Masukan Pekerjaan Ibu"></div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat Orang Tua<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" class='date' type="text" name="alamat_ortu" required='required' placeholder="Masukan Alamat Orang Tua"></div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Wali<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" class='date' type="text" name="nama_wali" required='required' placeholder="Masukan Nama Wali"></div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat Wali<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" class='date' type="text" name="alamat_wali" required='required' placeholder="Masukan Alamat Wali"></div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Tinggal Bersama<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                        <select name ="tinggal_bersama" class="form-control">
                        <option>--Pilih Tinggal Bersama--</option>
                        <option value="OrangTua">OrangTua</option>
                        <option value="Sendiri">Sendiri</option>
                        <option value="Wali">Wali</option>
                        </select>                   
                     </div>
                     <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Asal Kelurahan<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" class='date' type="text" name="asal_kelurahan" required='required' placeholder="Masukan Asal Kelurahan"></div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Asal Kecematan<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" class='date' type="text" name="asal_kecematan" required='required' placeholder="Masukan Asal Kecematan"></div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Asal Kabupaten<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" class='date' type="text" name="asal_kabupaten" required='required' placeholder="Masukan Asal Kabupaten"></div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Asal Provinsi<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" class='date' type="text" name="asal_provinsi" required='required' placeholder="Masukan Asal Provinsi"></div>
                    </div>
                    <div class="row">
                    <div class="col-form-label col-md-4 col-sm-4  label-align">
                      <div class="field item form-group">
                <div class="col-md-6 col-sm-6">
                      <label>RT<span class="required">*</span></label>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="rt" id="rt" class="form-control" placeholder="Masukan RT">
                      </div>
                      </div>
                    </div>
                    <div class="col-form-label col-md-4 col-sm-4  label-align">
                      <div class="field item form-group">
                <div class="col-md-6 col-sm-6">
                      <label>RW<span class="required">*</span></label>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" name="rw" id="rw" class="form-control" placeholder="Masukan RW">
                      </div>
                      </div>
                    </div>
                  </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Golongan Darah<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                        <select name ="golongan_darah" class="form-control">
                        <option>--Pilih Golongan Darah--</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="O">O</option>
                        </select>                                      
                     </div>
                     <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Registrasi <span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" type="text" class='number' name="tgl_registrasi" value="{{\Carbon\Carbon::parse( $tgl_registrasi  )->format('d-m-Y')}}" readonly></div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Jumlah Saudara Kandung<span class="required">*</span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" type="text" class='number' name="jmlh_saudara_kandung" data-validate-minmax="10,100" required='required' placeholder="Masukan Jumlah Saudara Kandung"></div>
                    </div>
                    <input type="hidden" class="form-control"   name="status" />
                    <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align"><span class="required">
                    <button type='submit' class="btn btn-primary">Submit</button>
                    <button type='reset' class="btn btn-success">Reset</button>
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

