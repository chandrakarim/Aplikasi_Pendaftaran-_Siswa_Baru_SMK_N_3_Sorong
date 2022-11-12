<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jurusan;
use Illuminate\Support\Facades\DB;
class JurusanController extends Controller
{
    //
    public function index() {
        $data = array(
            'jurusan' => Jurusan::all()
        );
        
        return view('user.jurusan',$data);
    }
}
