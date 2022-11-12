<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategoriberita;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class KategoriberitaController extends Controller
{
    //
    public function index(){

        $data = array(
            'kategoriberita' => Kategoriberita::all()
        );
        return view('admin.data_kategori_berita.index',$data);
    }
    public function tambah(){

        return view('admin.data_kategori_berita.tambah');
    }

    public function store(Request $request){
        //menyimpan kategori ke database
       Kategoriberita :: create([
           'nama' => $request->nama
       ]);
       return redirect()->route('admin.kategori')->with('success', 'Berhasil Menambahkan Kategori Berita');
       }
   
}
