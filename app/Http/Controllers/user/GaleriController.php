<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Galeri;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class GaleriController extends Controller
{
    //
    public function index() {
        $data = array(
            'galeri' => Galeri::all()
        );
        return view('user.galeri',$data);
    }

}
