<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\MCProject;
use App\MKategoriProject;
use App\User;
use DataTables;
use Session;
use DB;
class ListOwnerProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jsonListProject() 
    {
        $mcproject = MCProject::all();
        return Datatables::of($mcproject)
        ->addColumn('action', function($mcproject){
            return  
            '<a href="'.('/admin/list_owner_project/'.$mcproject->id.'/edit').'" class="btn btn-info btn-sm"><i class="fas fa-eye"> Check</i></a>';
            
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    //Upload Image CKEditor
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('images'), $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }
    public function index()
    {
        return view('admin/list_owner_project/index');
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

        $data = MCProject::find($id);
        $user = User::pluck('name', 'id');
        // dd($data);
        $kategori = MKategoriProject::pluck('kategori_project', 'id');
        return view('admin/list_owner_project/form', compact('data', 'kategori', 'user'));
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
        $mcProject = MCProject::find($id);
        $mcProject->kategori_project = $request->kategori_project;
        $mcProject->nama_project = $request->nama_project;
        $mcProject->konten = $request->konten;
        $mcProject->target = str_replace('.','',$request->target);
        $mcProject->terkumpul = 0;
        $mcProject->tanggal_dibuka = now();
        $mcProject->tanggal_ditutup = $request->tanggal_ditutup;
        $mcProject->status = $request->status;
        $mcProject->update();
        return redirect('admin/list_owner_project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MCProject::destroy($id);
        return redirect('admin/list_owner_project');
    }
}
