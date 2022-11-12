<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kontak;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class KontakController extends Controller
{
    //
    public function index() {
        $data = array(
            'kontak' => Kontak::all()
        );
        
        return view('user.kontak',$data);
    }
    public function store(Request $request){
        Kontak :: create([
            'nama' => $request->nama,
            'email' => $request->email,
            'judul' => $request->judul,
            'komentar' => $request->komentar
        
        ]);
        return redirect()->route('user.kontak')->with('status','Berhasil Meambahkan kontak');
    }
}
