<?php

namespace App\Http\Controllers\panitia;
use App\User;
use App\Registrasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    //
    public function index() {

        $siswa = DB::table('users')
        ->select(DB::raw('COUNT(id) as total_user'))
        ->where('role','=','siswa')
        ->first();

        $pengumuman = DB::table('pengumuman')
        ->select(DB::raw('COUNT(id) as total_pengumuman'))
        //->where('role','=','siswa')
        ->first();

        $registrasi = DB::table('registrasi')
        ->select(DB::raw('COUNT(id) as total_registrasi'))
        //->where('role','=','siswa')
        ->first();

        $pengumuman_tidak = DB::table('pengumuman')
        ->select(DB::raw('COUNT(id) as total_tidak'))
        ->where('status','=','Tidak Lulus Seleksi')
        ->first();

        $pengumuman_terima = DB::table('pengumuman')
        ->select(DB::raw('COUNT(id) as total_terima'))
        ->where('status','=','Di Terima')
        ->first();

        $seleksi = DB::table('calon_siswa')
        ->select(DB::raw('COUNT(id) as total_seleksi'))
        ->where('status','=','Di seleksi')
        ->first();

         $data = array (
            'siswa' => $siswa,
            'pengumuman' => $pengumuman,
            'registrasi' => $registrasi,
        );
       // dd($data);
        return view('panitia/dashboard',$data ,compact('pengumuman_tidak','pengumuman_terima','seleksi'));
    }
}
