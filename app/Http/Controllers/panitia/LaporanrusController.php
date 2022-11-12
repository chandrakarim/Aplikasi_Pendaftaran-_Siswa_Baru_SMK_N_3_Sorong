<?php

namespace App\Http\Controllers\panitia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Registrasi;
use App\Pengumuman;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class LaporanrusController extends Controller
{
    //
    public function index(){
        $registrasi = DB::table('registrasi')
        ->join('calon_siswa', 'calon_siswa.user_id', '=', 'registrasi.calon_siswa_id')
        ->select('registrasi.*', 'calon_siswa.nama_siswa')
        ->get();
        $data = array(
            'registrasi' => $registrasi
        );
        return view('panitia.data_laporan.laporan_rus',$data);
    }
}
