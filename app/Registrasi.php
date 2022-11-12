<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    //
    protected $table = 'registrasi';
    protected $fillable = ['id','kode_rus','calon_siswa_id','nis','no_seri_ijazah','file_skhun','nama_ayah','pekerjaan_ayah','nama_ibu','pekerjaan_ibu','alamat_ortu','nama_wali','alamat_wali','tinggal_bersama','asal_kelurahan','asal_kecematan','asal_kabupaten','asal_provinsi','rt','rw','golongan_darah','tgl_registrasi','jmlh_saudara_kandung'];
}
