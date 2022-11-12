<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Berita;
use App\Kategoriberita;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class BeritaController extends Controller
{
    //
    public function index() {
        //membawa data produk yang di join dengan table kategori
        $berita = DB::table('berita')
                ->join('kategoriberita', 'kategoriberita.id', '=', 'berita.kategoriberita_id')
                ->select('berita.*', 'kategoriberita.nama as nama_kategori')
                ->get();
        $data = array(
        'berita' => $berita
        );
        return view('admin.data_berita.index',$data);
    }
    public function tambah() {
        $data = array(
            'kategoriberita' => Kategoriberita::all(),
        );
        return view('admin.data_berita.tambah',$data);
    }
    public function store(Request $request){
         //menyimpan berita ke database
        if($request->file('foto')){
            //simpan foto berita yang di upload ke direkteri public/storage/image_berita
        $file = $request->file('foto')->store('image_berita','public');
        Berita :: create([
            'judul' => $request->judul,
            'author' => $request->author,
            'tanggal' => $request->tanggal,
            'isi' => $request->isi,
            'foto' => $file,
            'kategoriberita_id' => $request->kategoriberita_id

        ]);
        return redirect()->route('admin.berita')->with('status','Berhasil Menambah Rekening');
        }
    }
    public function edit($id)
    {
        //menampilkan form edit
        //dan mengambil data berita sesuai id dari parameter
        $data = array(
            'berita' => $berita = Berita::FindOrFail($id)
        );
        return view('admin.data_berita.edit',$data);  
    }
    public function update($id,Request $request)
    {
         //ambil data dulu sesuai parameter $Id
         $b = Berita::findOrFail($id);

         // Lalu update data nya ke database
         if( $request->file('foto')){
             
             Storage::delete('public/'.$b->foto);
             $file = $request->file('foto')->store('image_berita','public');
             $b->foto = $file;
         }
         $b->judul = $request->judul;
         $b->author = $request->author;
         $b->tanggal = $request->tanggal;
         $b->isi = $request->isi;
         $b->kategoriberita_id = $request->kategoriberita_id;

         $b->save();
 
         return redirect()->route('admin.berita')->with('status','Berhasil Mengubah Kategori');
    }
    public function delete($id)
    {
        //mengahapus berita
        $brit = Berita::findOrFail($id);
        Berita::destroy($id);
        Storage::delete('public/'.$brit->foto);
        return redirect()->route('admin.berita')->with('status','Berhasil Mengahapus Produk');
    }
    public function detail($id)
    {
        //mengambil detail berita
        $data = array(
            'berita' => Berita::findOrFail($id)
        );
        return view('admin.data_berita.detail',$data);
    }
}
