<?php

namespace App\Http\Controllers\Donatur;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class DonaturController extends Controller
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
