<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    //
    protected $table = 'pengumuman';
    protected $fillable = ['id','kode_pgn','calon_siswa_id','judul_pengumuman','deskripsi','status'];
}
