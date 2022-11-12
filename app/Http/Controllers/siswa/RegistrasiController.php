<?php

namespace App\Http\Controllers\siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Registrasi;
use App\Pengumuman;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class RegistrasiController extends Controller
{
    //
    public function index(){
        $tgl_registrasi = date("Y-m-d H:i:s");
        //kode Rus
        $calon = Registrasi::all();
        $q = DB::table('registrasi')->select(DB::raw('MAX(RIGHT(kode_rus,4)) as kode'));
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
        //kode nis
        $calon = Registrasi::all();
        $q = DB::table('registrasi')->select(DB::raw('MAX(RIGHT(nis,4)) as kode'));
        $nis = "";
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->kode)+1;
                $nis = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $nis = "0001";
        }

  
         $data = array(
            
             'pengumuman' => Pengumuman::all(),
             'registrasi' => $kd,
             'tgl' => $tgl_registrasi,
             'nis' =>  $nis 
 
         );

    //dd($data);
    return view('siswa.registrasi',$data ,compact('kd','tgl_registrasi','nis'));
    }
    
    public function store(Request $request){
        $tgl_registrasi = date("Y-m-d H:i:s");
     

        $calon_siswa_id = \Auth::user()->id;
        $register = DB::table('calon_siswa')
        ->join('jurusan', 'jurusan.id', '=', 'calon_siswa.jurusan_id')
        ->join('users', 'users.id', '=', 'calon_siswa.user_id')
        ->select('calon_siswa.*', 'jurusan.nama as nama_jurusan', 'users.name')
        ->where('calon_siswa.user_id',$calon_siswa_id)
        ->get();
      
       //menyimpan data Registrasi ke database
       if($request->file('file_skhun')){
        //simpan foto data Registrasi yang di upload ke direkteri public/storage/image_registrasi
        $file = $request->file('file_skhun')->store('image_registrasi','public');
        Registrasi :: create([
            'kode_rus' => $request->kode_rus, 
            'calon_siswa_id' => $calon_siswa_id,
            'nis' => $request->nis,
            'no_seri_ijazah' => $request->no_seri_ijazah,
            'file_skhun' => $file,
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'alamat_ortu' => $request->alamat_ortu,
            'nama_wali' => $request->nama_wali,
            'alamat_wali' => $request->alamat_wali,
            'tinggal_bersama' => $request->tinggal_bersama,
            'asal_kelurahan' => $request->asal_kelurahan,
            'asal_kecematan' => $request->asal_kecematan,
            'asal_kabupaten' => $request->asal_kabupaten,
            'asal_provinsi' => $request->asal_provinsi,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'golongan_darah' => $request->golongan_darah,
            'tgl_registrasi' => $tgl_registrasi,
            'jmlh_saudara_kandung' => $request->jmlh_saudara_kandung
        ]);
//dd($request);
// return redirect()->route('siswa.registrasi')
        return redirect()->route('siswa.profil')->with('success', 'Berhasil Melakukan Registrasi');
       }
    
    }
}
