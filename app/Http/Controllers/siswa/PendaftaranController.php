<?php

namespace App\Http\Controllers\siswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jurusan;
use App\Pendaftaran;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
//use DB;
class PendaftaranController extends Controller
{
    //
    public function index(){
       // $today = Carbon::now()->isoFormat('D-MM-YYYY');
       $calon = Pendaftaran::all();
       $q = DB::table('calon_siswa')->select(DB::raw('MAX(RIGHT(kode_pcs,4)) as kode'));
       $kd = "";
       if($q->count()>0)
       {
        foreach($q->get() as $k)
        {
            $tmp = ((int)$k->kode)+1;
            $kd = sprintf("%04s", $tmp);
        }
       }
       else
       {
        $kd = "0001";
       }
        $data = array(
            'jurusan' => Jurusan::all(),
            //'pendaftaran' => Pendaftaran::all(),
            'pendaftaran' => $kd

        );
        //dd($data);
        return view('siswa.pendaftaran',$data ,compact('kd'));
    }
    public function create(){
        $calon = Pendaftaran::all();
        $q = DB::table('calon_siswa')->select(DB::raw('MAX(RIGHT(kode_pcs,4)) as kode'));
        $kd = "";
        if($q->count()>0)
        {
         foreach($q->get() as $k)
         {
             $tmp = ((int)$k->kode)+1;
             $kd = sprintf("%04s", $tmp);
         }
        }
        else
        {
         $kd = "0001";
        }
       // dd($q);
        //return "mbr-".$kd;
        return view('siswa.pendaftaran', compact('kd'));
    }
    public function store(Request $request){
       // $today = Carbon::now()->isoFormat('D-MM-YYYY');
    //    $calon = Pendaftaran::all();
    //    $q = DB::table('calon_siswa')->select(DB::raw('MAX(RIGHT(id,4)) as kode'));
    //    $kd = "";
    //    if($q->count()>0)
    //    {
    //     foreach($q->get() as $k)
    //     {
    //         $tmp = ((int)$k->kode)+1;
    //         $kd = sprintf("%04s", $tmp);
    //     }
    //    }
    //    else
    //    {
    //     $kd = "0001";
    //    }
        $tgl_daftar = date("Y-m-d H:i:s");
 
        $user_id = \Auth::user()->id;
        $status = "Diproses";
         //menyimpan berita ke database
         if($request->file('file_raport')){
            //simpan foto berita yang di upload ke direkteri public/storage/image_berita
        $file = $request->file('file_raport')->store('image_pendaftaran','public');
        Pendaftaran :: create([
            'kode_pcs' => $request->kode_pcs, 
            'user_id' => $user_id,
            'jurusan_id' => $request->jurusan_id,
            'nama_siswa' => $request->nama_siswa,
            'asal_sekolah' => $request->asal_sekolah,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => $request->agama,
            'jk' => $request->jk,
            'tgl_daftar' => $tgl_daftar,
            'tahun_ajaran' => $request->tahun_ajaran,
            'file_raport' => $file,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'status' => $status
        ]);
        // dd($request);
        //return redirect()->route('siswa.pendaftaran')
        return redirect()->route('siswa.pengumuman')->with('success', 'Berhasil Melakukan Pendaftaran');
        }

    }
}
