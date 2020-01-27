<?php

namespace App\Http\Controllers\Powner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefLaporanProject;
use Session;
use DataTables;
use DB;
class LaporanProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jsonLProject() {
        $lproject = DB::table('ref_laporan_project')
        ->join('m_project', 'ref_laporan_project.project_id', '=', 'm_project.id')
        ->select('ref_laporan_project.*', 'm_project.nama_project')
        ->get();

            return Datatables::of($lproject)
            ->addColumn('action', function($lproject){
                // if ($lproject->status ==  0 || $lproject->status == 2) {
                    # code...
                    return  
                    '<form method="POST" action="'.('/powner/laporan_project/'.$lproject->id).'"> <input type="hidden" name="_token" id="csrf-token" value="'. Session::token().'" /> 
                    <input type="hidden" name="_method" value="DELETE"> 
                    <a href="'.('/powner/laporan_project/'.$lproject->id.'/edit').'" class="btn btn-warning btn-sm text-light"><i class="far fa-edit"> Edit</i></a> 
                    <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"> DELETE</i></button></form>';
                // }
                    
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function index()
    {
        return view('powner/laporan_project/index');
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
        //
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
