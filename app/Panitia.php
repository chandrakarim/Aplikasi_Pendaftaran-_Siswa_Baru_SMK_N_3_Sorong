<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Panitia extends Model
{
    //
    protected $table = 'panitia';
    protected $fillable = [
        'nip','name','email','jk','no_tlp','password','role'
    ];

}
