<?php

namespace App\Http\Controllers\Powner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class PownerController extends Controller
{
    public function index() {
        $now = Carbon::now();
        $mproject = DB::table('m_project')->where('status', '1')
        ->where('tanggal_ditutup', '>', $now)
        ->join('m_kategori_project', 'm_project.kategori_project', '=', 'm_kategori_project.id')
        ->select('m_project.*', 'm_kategori_project.kategori_project')
        ->get();
        // dd($mproject);
        
        return view('home', compact('mproject'));
    }
}
