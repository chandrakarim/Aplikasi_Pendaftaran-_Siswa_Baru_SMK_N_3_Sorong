<?php

namespace App\Http\Controllers\admin;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PanitiaController extends Controller
{
    //
    public function index() {
        $users = DB::table('users')->where('role','panitia')->get();

        $data = array(
            'users' => $users
        );
        return view('admin.data_panitia.index',$data);
    }
    public function tambah(){


    return view('admin.data_panitia.tambah');
    }
    public function store(Request $request){

        $role = "panitia";
        $password = Hash::make($request->password);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'jk' => $request->jk,
            'no_tlp' => $request->no_tlp,
            'role' =>$role  ,
        ]);

    return redirect()->route('admin.data_panitia.index')->with('success', 'Berhasil Menambahkan Panitia');
  
    }
    public function edit($id)
    {
        //menampilkan form edit
        //dan mengambil data panitia sesuai id dari parameter
        $data = array(
            'user' => $user = User::FindOrFail($id)
        );
        //dd($data);
        return view('admin.data_panitia.edit',$data);  
    }
    public function update($id,Request $request)
    {   //membuat password Hash
        $password = Hash::make($request->password);
         //ambil data dulu sesuai parameter $Id
         $pn = User::findOrFail($id);
         // Lalu update data nya ke database
         $pn->name = $request->name;
         $pn->email = $request->email;
         $pn->password = $password ;
         $pn->jk = $request->jk;
         $pn->no_tlp = $request->no_tlp;

         $pn->save();
       // dd($adm);
         return redirect()->route('admin.data_panitia.index')->with('success', 'Berhasil Mengubah Panitia');
    }
    public function delete($id)
    {
        //mengahapus data panitia
        $pn = User::findOrFail($id);
        User::destroy($id);
        
        return redirect()->route('admin.data_panitia.index')->with('success', 'Berhasil Menghapus Panitia');
    }

}
