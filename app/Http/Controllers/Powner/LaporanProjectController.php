<?php

namespace App\Http\Controllers\Powner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefLaporanProject;
use App\MCProject;
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
        ->select('ref_laporan_project.*', 'm_project.nama_project', 'm_project.terkumpul', 'm_project.target')
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
            ->addColumn('kontent', function($lproject){
                $text = $lproject->konten_laporan;
                return $text;
            })
            ->rawColumns(['action', 'kontent'])
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
        //Upload Image CKEditor
    public function laporan(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('images/laporan'), $fileName);
    
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/laporan/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }
    public function create()
    {   
        $mproject = MCProject::where('owner_id', auth()->user()->id)
        ->where('status', 1)
        ->pluck('nama_project', 'id');
        return view('powner/laporan_project/form', compact('mproject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lproject = new RefLaporanProject;
        $lproject->project_id = $request->project_id;
        $lproject->owner_id = auth()->user()->id;
        $lproject->judul_laporan = $request->judul_laporan;
        $lproject->konten_laporan = $request->konten_laporan;
        $lproject->tanggal_laporan = now();
        $lproject->status = 0;
        $lproject->save();

        return redirect ('powner/laporan_project');

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
        $data = RefLaporanProject::where('owner_id', auth()->user()->id)->findOrFail($id);
        $mproject = MCProject::pluck('nama_project', 'id');
        return view('powner/laporan_project/form', compact('data', 'mproject'));
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
        $lproject = new RefLaporanProject;
        $lproject->project_id = $request->project_id;
        $lproject->owner_id = auth()->user()->id;
        $lproject->judul_laporan = $request->judul_laporan;
        $lproject->konten_laporan = $request->konten_laporan;
        $lproject->tanggal_laporan = now();
        $lproject->status = 0;
        $lproject->update();

        return redirect ('powner/laporan_project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RefLaporanProject::destroy($id);
        return redirect('powner/laporan_project');
    }
}
