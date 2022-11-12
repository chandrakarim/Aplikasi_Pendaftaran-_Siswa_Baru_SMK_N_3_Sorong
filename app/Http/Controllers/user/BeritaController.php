<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Berita;
use App\Kategoriberita;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    //
    public function index() {
    //membawa data berita yang di join dengan table kategori
    $kat= DB::table('kategoriberita')
        ->join('berita','berita.kategoriberita_id','=','kategoriberita.id')
        ->select(DB::raw('count(berita.kategoriberita_id) as jumlah, kategoriberita.*'))
        ->groupBy('kategoriberita.id')
        ->get();
        $data = array(
            'berita' => Berita::paginate(5),
            'kategoriberita' =>$kat
        );
        return view('user.berita',$data);
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
