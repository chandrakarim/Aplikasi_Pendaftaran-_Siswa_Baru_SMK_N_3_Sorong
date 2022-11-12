<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Galeri;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class GaleriController extends Controller
{
    //
    public function index() {
        $data = array(
            'galeri' => Galeri::all()
        );
        return view('admin.data_galeri.index',$data);
    }
    public function tambah(){

        return view('admin.data_galeri.tambah');
    }
    public function store(Request $request){
        //menyimpan berita ke database
       if($request->file('foto')){
           //simpan foto berita yang di upload ke direkteri public/storage/image_berita
       $file = $request->file('foto')->store('image_galeri','public');
       Galeri :: create([
           'judul' => $request->judul,
           'tanggal' => $request->tanggal,
           'foto' => $file

       ]);
       return redirect()->route('admin.galeri')->with('success', 'Berhasil Menambahkan Galeri');
       }
   }
   public function delete($id)
   {
       //mengahapus galeri
       $gal = Galeri::findOrFail($id);
       Galeri::destroy($id);
       Storage::delete('public/'.$gal->foto);
       return redirect()->route('admin.galeri')->with('success', 'Berhasil Menghapus Galeri');
   }
}
