<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    //
    protected $table = 'calon_siswa';
    protected $fillable = ['id','kode_pcs','user_id','jurusan_id','nama_siswa','asal_sekolah','tempat_lahir','tgl_lahir','agama','jk','tgl_daftar','tahun_ajaran','file_raport','no_tlp','email','alamat','status'];
}
