<?php

namespace App\Http\Controllers\admin;
use App\Jurusan;
use App\User;
use App\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class LaporanController extends Controller
{
    //
    public function index() {
        $users = DB::table('users')->where('role','panitia')->get();

        $data = array(
            'users' => $users
        );
        return view('admin.laporan.lp_panitia',$data);
    }
    public function jurusan() {
        $data = array(
            'jurusan' => Jurusan::all()
        );
        return view('admin.laporan.lp_jurusan',$data);
    }
    public function berita() {
        $berita = DB::table('berita')
        ->join('kategoriberita', 'kategoriberita.id', '=', 'berita.kategoriberita_id')
        ->select('berita.*', 'kategoriberita.nama as nama_kategori')
        ->get();
            $data = array(
            'berita' => $berita
            );
        return view('admin.laporan.lp_berita',$data);
    }
    public function siswa() {
        $users = DB::table('users')->where('role','siswa')->get();

        $data = array(
            'users' => $users
        );
        return view('admin.laporan.lp_siswa',$data);
    }
}
