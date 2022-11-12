<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\Kategoriberita;
use Illuminate\Support\Facades\DB;
class KategoriController extends Controller
{
    //
    public function beritaByKategori($id)
    {
        $kat= DB::table('kategoriberita')
        ->join('berita','berita.kategoriberita_id','=','kategoriberita.id')
        ->select(DB::raw('count(berita.kategoriberita_id) as jumlah, kategoriberita.*'))
        ->groupBy('kategoriberita.id')
        ->get();
       //menampilkan data sesua kategori yang diminta user
        $data = array(
            'berita' => Berita::where('kategoriberita_id',$id)->paginate(9),
            'kategoriberita' => Kategoriberita::findOrFail($id)
        );
        return view('user.kategori',$data);
    }
    public function detail($id){
        $kat= DB::table('kategoriberita')
        ->join('berita','berita.kategoriberita_id','=','kategoriberita.id')
        ->select(DB::raw('count(berita.kategoriberita_id) as jumlah, kategoriberita.*'))
        ->groupBy('kategoriberita.id')
        ->get();
        //mengambil detail produk
        $data = array(
            'berita' => Berita::findOrFail($id),
            'kategoriberita' =>$kat
        );
        return view('user.beritadetail',$data);
    }

}

