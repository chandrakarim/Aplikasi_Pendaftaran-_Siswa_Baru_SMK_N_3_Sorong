<?php

namespace App\Http\Controllers\admin;
use App\Kontak;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class KontakController extends Controller
{
    //
    public function index() {
        $data = array(
            'kontak' => Kontak::all()
        );
        
        return view('admin.data_kontak.index',$data);
    }
    public function delete($id){
        $kon = Kontak::findorFail($id);
        Kontak::destroy($id);
        return redirect()->route('admin.kontak')->with('success', 'Berhasil Menghapus Kontak');
    }
}
