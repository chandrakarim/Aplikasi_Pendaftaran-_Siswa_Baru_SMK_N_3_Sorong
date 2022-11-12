<?php

namespace App\Http\Controllers\siswa;
use App\Http\Controllers\Controller;
use App\Berita;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    //
    public function index() {
        $data = array(
            'berita' => Berita::all()
        );
        return view('siswa.berita',$data);
    }
    public function detail($id){
        //mengambil detail produk
        $data = array(
            'berita' => Berita::findOrFail($id)
        );
        return view('siswa.beritadetail',$data);
    }
}
