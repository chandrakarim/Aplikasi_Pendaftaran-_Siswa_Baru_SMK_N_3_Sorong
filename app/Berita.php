<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    //
    protected $table = 'berita';
    protected $fillable = ['id','judul','author','tanggal','isi','foto','kategoriberita_id'];
}
