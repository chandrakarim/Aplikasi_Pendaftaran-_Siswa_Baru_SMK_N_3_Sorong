<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jurusan;
use App\Berita;
use App\Galeri;
class WelcomeController extends Controller
{
    public function index() {
        $data = array(
            'jurusan' => Jurusan::all(),
            'berita' => Berita::all(),
            'galeri' => Galeri::all()
        );
      // dd($data); 
        return view('user.welcome',$data);
    }
    //
   
}
