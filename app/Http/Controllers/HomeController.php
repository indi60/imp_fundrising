<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MCproject;
use DB;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $mproject = DB::table('m_project')->where('status', '1')
        ->join('m_kategori_project', 'm_project.kategori_project', '=', 'm_kategori_project.id')
        ->select('m_project.*', 'm_kategori_project.kategori_project')
        ->get();
        // dd($mproject);
        
        return view('home', compact('mproject'));
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
        $mproject = MCProject::where('status', '1')
        ->join('m_kategori_project', 'm_project.kategori_project', '=', 'm_kategori_project.id')
        ->select('m_project.*', 'm_kategori_project.kategori_project')
        ->findOrFail($id);
        return view('show', compact('mproject'));
    }

    public function gallery($id) {
        $mproject = MCProject::where('status', '1')->findOrFail($id);
        return view('gallery', compact('mproject'));
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
