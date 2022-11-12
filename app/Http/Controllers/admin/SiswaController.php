<?php

namespace App\Http\Controllers\admin;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class SiswaController extends Controller
{
    //
    public function index() {
        $users = DB::table('users')->where('role','siswa')->get();

        $data = array(
            'users' => $users
        );
        return view('admin.data_siswa.index',$data);
    }
    public function reset($id)
    {
        //menampilkan form edit
        //dan mengambil data admin sesuai id dari parameter
        $data = array(
            'user' => $user = User::FindOrFail($id)
        );
        //dd($data);
        return view('admin.data_siswa.reset',$data);  
    }
    public function update($id,Request $request)
    {
        $password = Hash::make($request->password);
         //ambil data dulu sesuai parameter $Id
         $sis = User::findOrFail($id);

         // Lalu update data nya ke database
      
         $sis->name = $request->name;
         $sis->email = $request->email;
         $sis->password = $password ;
         $sis->jk = $request->jk;
         $sis->no_tlp = $request->no_tlp;

         $sis->save();
       // dd($adm);
         return redirect()->route('admin.data_siswa.index')->with('success', 'Berhasil Mereset Siswa');
    }

}
