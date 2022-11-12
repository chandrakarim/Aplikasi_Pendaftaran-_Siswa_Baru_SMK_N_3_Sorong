<?php

namespace App\Http\Controllers\siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jurusan;
use App\Berita;
use App\Galeri;
class DashboardController extends Controller
{
    //
    public function index() {
        $data = array(
            'jurusan' => Jurusan::all(),
            'berita' => Berita::all(),
            'galeri' => Galeri::all()
        );
        return view('siswa/dashboard',$data);
    }
}
