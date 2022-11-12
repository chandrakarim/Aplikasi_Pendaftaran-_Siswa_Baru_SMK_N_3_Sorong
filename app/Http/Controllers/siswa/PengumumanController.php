<?php

namespace App\Http\Controllers\siswa;
use App\Jurusan;
use App\Pendaftaran;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PengumumanController extends Controller
{
    //
    public function index(){
        $id_user = \Auth::user()->id;

        $pengumuman = DB::table('pengumuman')
        ->join('calon_siswa', 'calon_siswa.id', '=', 'pengumuman.calon_siswa_id')
        ->select('pengumuman.*', 'calon_siswa.user_id')
        ->where('calon_siswa.user_id',$id_user)
        ->get();
         

        $pendaftaran = DB::table('calon_siswa')
        ->join('jurusan', 'jurusan.id', '=', 'calon_siswa.jurusan_id')
        ->join('users', 'users.id', '=', 'calon_siswa.user_id')
        ->select('calon_siswa.*', 'jurusan.nama as nama_jurusan', 'users.name')
        ->where('calon_siswa.user_id',$id_user)
        ->get();
        
        $data = array(
            'pendaftaran' => $pendaftaran,
            'pengumuman' => $pengumuman

        );
       //dd($pengumuman);
    return view('siswa.pengumuman',$data);
    }
}
