<?php
namespace App\Http\Controllers\admin;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class AdminController extends Controller
{
    //
   public function index() {
        $users = DB::table('users')->where('role','admin')->get();

        $data = array(
            'users' => $users
        );
    //dd( $data);
        return view('admin.data_admin.index',$data);
    }
    public function tambah(){


    return view('admin.data_admin.tambah');
    }
    public function store(Request $request){
        $role = "admin";
        $password = Hash::make($request->password);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'jk' => $request->jk,
            'no_tlp' => $request->no_tlp,
            'role' =>$role  ,
        ]);

    return redirect()->route('admin.data_admin.index')->with('success', 'Berhasil Menambahkan Admin');
  
    }
    public function edit($id)
    {
        //menampilkan form edit
        //dan mengambil data admin sesuai id dari parameter
        $data = array(
            'user' => $user = User::FindOrFail($id)
        );
        //dd($data);
        return view('admin.data_admin.edit',$data);  
    }
    public function update($id,Request $request)
    {
        $password = Hash::make($request->password);
         //ambil data dulu sesuai parameter $Id
         $adm = User::findOrFail($id);

         // Lalu update data nya ke database
      
         $adm->name = $request->name;
         $adm->email = $request->email;
         $adm->password = $password ;
         $adm->jk = $request->jk;
         $adm->no_tlp = $request->no_tlp;

         $adm->save();
       // dd($adm);
         return redirect()->route('admin.data_admin.index')->with('success', 'Berhasil Mengubah Admin');
    }
    public function delete($id)
    {
        //mengahapus data admin
        $ad = User::findOrFail($id);
        User::destroy($id);
        
        return redirect()->route('admin.data_admin.index')->with('success', 'Berhasil Menghapus Admin');
    }

}
