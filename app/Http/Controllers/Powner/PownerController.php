<?php

namespace App\Http\Controllers\Powner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PownerController extends Controller
{
    public function index() {
        $mproject = DB::table('m_project')->where('status', '1')
        ->join('m_kategori_project', 'm_project.kategori_project', '=', 'm_kategori_project.id')
        ->select('m_project.*', 'm_kategori_project.kategori_project')
        ->get();
        // dd($mproject);
        
        return view('home', compact('mproject'));
    }
}
