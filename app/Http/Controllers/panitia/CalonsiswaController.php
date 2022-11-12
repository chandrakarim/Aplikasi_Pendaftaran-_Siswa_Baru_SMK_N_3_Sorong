<?php

namespace App\Http\Controllers\panitia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pendaftaran;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class CalonsiswaController extends Controller
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
    //dd($data);       
         return view('panitia.data_calon.index',$data);
    }
    public function konfirmasi($id,Request $request){
        $panitia_id = \Auth::user()->id;
        $p = Pendaftaran::findOrFail($id);
        $p->panitia_id =  $panitia_id;
        $p->status ='Di seleksi';
        $p->save();
       //dd($p);
        return redirect()->route('panitia.tambah.pengumuman')->with('success', 'Berhasil Mengkonfirmasi Siswa');

    }
}
