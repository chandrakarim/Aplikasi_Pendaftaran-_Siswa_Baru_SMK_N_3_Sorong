<?php

namespace App\Http\Controllers\panitia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pendaftaran;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class LaporancsiController extends Controller
{
    //
    public function index() {
        $panitia_id = \Auth::user()->id;
        $pendaftaran = DB::table('calon_siswa')
        ->join('jurusan', 'jurusan.id', '=', 'calon_siswa.jurusan_id')
        ->join('users', 'users.id', '=', 'calon_siswa.panitia_id')
        ->select('calon_siswa.*', 'jurusan.nama as nama_jurusan', 'users.name as nama_panitia')
        //->where('users.id',$panitia_id)
        ->get();
        $data = array(
    
            'pendaftaran' => $pendaftaran

        );
        return view('panitia.data_laporan.laporan_csi',$data);
    }
}
