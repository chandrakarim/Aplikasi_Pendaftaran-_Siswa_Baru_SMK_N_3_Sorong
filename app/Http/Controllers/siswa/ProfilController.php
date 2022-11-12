<?php

namespace App\Http\Controllers\siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Registrasi;
use App\Pengumuman;
use App\Pendaftaran;
use App\Jurusan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    //
    public function index(){
        $id_user = \Auth::user()->id;
   
        $pendaftaran = DB::table('calon_siswa')
        ->join('jurusan', 'jurusan.id', '=', 'calon_siswa.jurusan_id')
        ->join('users', 'users.id', '=', 'calon_siswa.user_id')
        ->select('calon_siswa.*', 'jurusan.nama as nama_jurusan', 'users.name')
        ->where('calon_siswa.user_id',$id_user)
        ->get();

        $calon_siswa_id = \Auth::user()->id;
        $registrasi = DB::table('registrasi')
        ->select('registrasi.*')
        ->where('registrasi.calon_siswa_id',$calon_siswa_id)
        ->get();
        
        $data = array(
            'pendaftaran' => $pendaftaran,
            'registrasi' => $registrasi 
            

        );
    //dd($data);
        return view('siswa.profil',$data);
    }
    // function edit pendaftaran
    public function edit_pendaftaran($id){
        $id_user = \Auth::user()->id;
   
        $pendaftaran = DB::table('calon_siswa')
        ->join('jurusan', 'jurusan.id', '=', 'calon_siswa.jurusan_id')
        ->join('users', 'users.id', '=', 'calon_siswa.user_id')
        ->select('calon_siswa.*', 'jurusan.nama as nama_jurusan', 'users.name')
        ->where('calon_siswa.user_id',$id_user)
        ->get();
        $data = array(
            'pendaftaran' => $pendaftaran,   
            'jurusan' => Jurusan::all() 
        );
   // dd($data);
        return view('siswa.edit_pendaftaran',$data); 
    }
    public function update($id,Request $request){
        //ambil data dulu sesuai parameter $Id
        $pendaftaran[0] = Pendaftaran::findOrFail($id);

        $tgl_daftar = date("Y-m-d H:i:s");
 
        $user_id = \Auth::user()->id;
       
        if( $request->file('file_raport')){
             
            Storage::delete('public/'.$pendaftaran[0]->foto);
            $file = $request->file('file_raport')->store('image_pendaftaran','public');
            $pendaftaran[0]->file_raport = $file;
        }
       // $pendaftaran[0]->kode_pcs = $request->kode_pcs; 
        $pendaftaran[0]->user_id = $user_id;
        $pendaftaran[0]->jurusan_id = $request->jurusan_id;
        $pendaftaran[0]->nama_siswa = $request->nama_siswa;
        $pendaftaran[0]->asal_sekolah = $request->asal_sekolah;
        $pendaftaran[0]->tempat_lahir = $request->tempat_lahir;
        $pendaftaran[0]->tgl_lahir = $request->tgl_lahir;
        $pendaftaran[0]->agama = $request->agama;
        $pendaftaran[0]->jk = $request->jk;
        $pendaftaran[0]->tgl_daftar = $tgl_daftar;
        $pendaftaran[0]->tahun_ajaran = $request->tahun_ajaran;
       // $pendaftaran[0]->file_raport = $file;
        $pendaftaran[0]->no_tlp = $request->no_tlp;
        $pendaftaran[0]->email = $request->email;
        $pendaftaran[0]->alamat = $request->alamat;

        $pendaftaran[0]->save();

    return redirect()->route('siswa.profil')->with('success', 'Berhasil Mengubah Pendaftaran');

    }
    //function edit registrasi
    public function edit_registrasi($id){
        $calon_siswa_id = \Auth::user()->id;
        $registrasi = DB::table('registrasi')
        ->select('registrasi.*')
        ->where('registrasi.calon_siswa_id',$calon_siswa_id)
        ->get();
        
        $data = array(
            'registrasi' => $registrasi 
            
        );
   // dd($data);
        return view('siswa.edit_registrasi',$data); 
    }

    public function update_registrasi($id,Request $request){
        //ambil data dulu sesuai parameter $Id
        $registrasi[0] = Registrasi::findOrFail($id);

        $tgl_registrasi = date("Y-m-d H:i:s");

        $calon_siswa_id = \Auth::user()->id;

        $register = DB::table('calon_siswa')
        ->join('jurusan', 'jurusan.id', '=', 'calon_siswa.jurusan_id')
        ->join('users', 'users.id', '=', 'calon_siswa.user_id')
        ->select('calon_siswa.*', 'jurusan.nama as nama_jurusan', 'users.name')
        ->where('calon_siswa.user_id',$calon_siswa_id)
        ->get();
      
        if( $request->file('file_skhun')){
             
            Storage::delete('public/'.$registrasi[0]->foto);
            $file = $request->file('file_skhun')->store('image_registrasi','public');
            $registrasi[0]->file_skhun = $file;
        }    
        //$registrasi[0]->kode_rus = $request->kode_rus; 
        $registrasi[0]->calon_siswa_id = $calon_siswa_id;
       // $registrasi[0]->nis = $request->nis;
        $registrasi[0]->no_seri_ijazah = $request->no_seri_ijazah;
        //$registrasi[0]->file_skhun = $file;
        $registrasi[0]->nama_ayah = $request->nama_ayah;
        $registrasi[0]->pekerjaan_ayah = $request->pekerjaan_ayah;
        $registrasi[0]->nama_ibu = $request->nama_ibu;
        $registrasi[0]->pekerjaan_ibu = $request->pekerjaan_ibu;
        $registrasi[0]->alamat_ortu = $request->alamat_ortu;
        $registrasi[0]->nama_wali = $request->nama_wali;
        $registrasi[0]->alamat_wali = $request->alamat_wali;
        $registrasi[0]->tinggal_bersama = $request->tinggal_bersama;
        $registrasi[0]->asal_kelurahan = $request->asal_kelurahan;
        $registrasi[0]->asal_kecematan = $request->asal_kecematan;
        $registrasi[0]->asal_kabupaten = $request->asal_kabupaten;
        $registrasi[0]->asal_provinsi = $request->asal_provinsi;
        $registrasi[0]->rt = $request->rt;
        $registrasi[0]->rw = $request->rw;
        $registrasi[0]->golongan_darah = $request->golongan_darah;
        $registrasi[0]->tgl_registrasi = $tgl_registrasi;
        $registrasi[0]->jmlh_saudara_kandung = $request->jmlh_saudara_kandung;
        $registrasi[0]->save();

    return redirect()->route('siswa.profil')->with('success', 'Berhasil Mengubah Registrasi');

    }
}

