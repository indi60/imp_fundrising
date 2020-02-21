<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefDonasiProject;
use DB;
use App\MCProject;
use App\MKategoriProject;
use Carbon\Carbon;
class LihatProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function projectCat(Request $request) {
        $kategori_project = $request->kategori_project;

        $mproject = DB::table('m_kategori_project')
        ->join('m_project', 'm_kategori_project.id', '=', 'm_project.kategori_project')
        ->where('m_project.status', '1')
        ->where('m_project.kategori_project',$kategori_project)
        ->get();
        $mkategori = MKategoriProject::all();
        return view('lihat_project/view', compact('mproject', 'mkategori'));
    }
    public function gallery($id) {
        $mproject = MCProject::where('status', '1')->findOrFail($id);
        return view('lihat_project/gallery', compact('mproject'));
    }
    public function index()
    {
        $now = Carbon::now();
        $mproject = DB::table('m_project')->where('status', '1')
        ->where('tanggal_ditutup', '>', $now)
        ->join('m_kategori_project', 'm_project.kategori_project', '=', 'm_kategori_project.id')
        ->select('m_project.*', 'm_kategori_project.kategori_project')
        ->get();
        $mkategori = MKategoriProject::all();
        return view('lihat_project/index', compact('mproject', 'mkategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $mproject = MCProject::where('status', '1')
        // ->join('m_kategori_project', 'm_project.kategori_project', '=', 'm_kategori_project.id')
        // ->select('m_project.*', 'm_kategori_project.kategori_project')
        // ->findOrFail($id);
        // return view('lihat_project/show', compact('mproject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
