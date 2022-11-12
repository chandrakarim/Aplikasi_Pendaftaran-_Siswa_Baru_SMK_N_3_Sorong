<?php

namespace App\Http\Controllers\siswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    //
    public function index() {
        
        return view('siswa.tentang');
    }
}
