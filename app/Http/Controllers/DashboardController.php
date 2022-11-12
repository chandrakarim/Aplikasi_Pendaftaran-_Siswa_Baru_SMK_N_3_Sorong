<?php

namespace App\Http\Controllers;
use App\User;
use App\Berita;
use App\Jurusan;
use App\Galeri;
use App\Kontak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    //
    public function index() {

        $panitia = DB::table('users')
        ->select(DB::raw('COUNT(id) as total_user'))
        ->where('role','=','panitia')
        ->first();

        $siswa = DB::table('users')
        ->select(DB::raw('COUNT(id) as total_user'))
        ->where('role','=','siswa')
        ->first();

        $berita = DB::table('berita')
        ->select(DB::raw('COUNT(id) as total_berita'))
        //->where('role','=','siswa')
        ->first();

        $jurusan = DB::table('jurusan')
        ->select(DB::raw('COUNT(id) as total_jurusan'))
        //->where('role','=','siswa')
        ->first();

        $galeri = DB::table('galeri')
        ->select(DB::raw('COUNT(id) as total_galeri'))
        //->where('role','=','siswa')
        ->first();

        $kontak = DB::table('kontak')
        ->select(DB::raw('COUNT(id) as total_kontak'))
        //->where('role','=','siswa')
        ->first();

        $data = array (
            'panitia' => $panitia,
            'siswa' => $siswa,
            'berita' => $berita,
            'jurusan' => $jurusan,
            'galeri' => $galeri,
            'kontak' => $kontak
        );
        return view('admin/dashboard',$data);
    }
}
