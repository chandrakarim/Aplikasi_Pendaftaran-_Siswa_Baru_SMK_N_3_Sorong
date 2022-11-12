<?php
use RealRashid\SweetAlert\Facades\Alert;


namespace App\Http\Controllers\admin;
use App\Jurusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class JurusanController extends Controller
{
    //
    public function index() {
        $data = array(
            'jurusan' => Jurusan::all()
        );
        return view('admin.data_jurusan.index',$data);
    }

    public function tambah(){

        return view('admin.data_jurusan.tambah');
    }
    public function store(Request $request){
        Jurusan :: create([
            'tahun_ajaran' => $request->tahun_ajaran,
            'nama' => $request->nama,
            'kuota' => $request->kuota
        ]);
        return redirect()->route('admin.jurusan')->with('success', 'Berhasil Menambahkan Jurusan');

    }
    public function edit($id){
        $data = array(
            'jurusan' => $jurusan = Jurusan::FindorFail($id)
        );
        return view('admin.data_jurusan.edit',$data);
    }
    public function update($id,Request $request)
    {
        $j = Jurusan::findorFail($id);

        $j->tahun_ajaran = $request->tahun_ajaran;
        $j->nama = $request->nama;
        $j->kuota = $request->kuota;

        $j->save();
        return redirect()->route('admin.jurusan')->with('success', 'Berhasil Mengubah Jurusan');
    }
    public function delete($id){
        $jur = Jurusan::findorFail($id);
        Jurusan::destroy($id);
        return redirect()->route('admin.jurusan')->with('success', 'Berhasil Menghapus Jurusan');
    }

}
