<?php

namespace App\Http\Controllers\Powner;
use App\Http\Controllers\Controller;
use App\MCProject;
use App\MKategoriProject;
use App\User;
use Illuminate\Http\Request;
use DataTables;
use Session;
use DateTIme;
class CreateProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jsonCProject() {
        $cproject = MCProject::where('owner_id', Auth()->User()->id)->get();

            return Datatables::of($cproject)
            ->addColumn('action', function($cproject){
                return  
                '<form method="POST" action="'.('/powner/create_project/'.$cproject->id).'"> <input type="hidden" name="_token" id="csrf-token" value="'. Session::token().'" /> 
                <input type="hidden" name="_method" value="DELETE"> 
                <a href="editForm('. $cproject->id .')" class="btn btn-info btn-sm"><i class="fas fa-eye"> Show</i></a> 
                <a href="'.('/powner/create_project/'.$cproject->id.'/edit').'" class="btn btn-warning btn-sm"><i class="far fa-edit"> Edit</i></a> 
                <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"> DELETE</i></button></form>';
                
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function index()
    {
        // $project = MCProject::all();
        // return view('powner/create_project/index', compact('project'));
        return view('powner/create_project/index');
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = MKategoriProject::pluck('kategori_project', 'id');
        return view('powner/create_project/form', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // MCProject::create($request->all());
        $mcProject = new \App\MCProject;
        $mcProject->kategori_project = $request->kategori_project;
        $mcProject->nama_project = $request->nama_project;
        $mcProject->konten = $request->konten;
        $mcProject->target = str_replace('.','',$request->target);
        $mcProject->terkumpul = 0;
        $mcProject->tanggal_dibuka = now();
        $mcProject->tanggal_ditutup = $request->tanggal_ditutup;
        $mcProject->status = 0;
        $mcProject->owner_id = $request->owner_id;
        $mcProject->save();
        // dd($mcProject);
        return redirect ('powner/create_project');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MCProject  $mcProject
     * @return \Illuminate\Http\Response
     */
    public function show(MCProject $mcProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MCProject  $mcProject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        
        $data = MCProject::where('owner_id', Auth()->User()->id)->findOrFail($id);
            $kategori = MKategoriProject::pluck('kategori_project', 'id');
            return view('powner/create_project/form', compact('data', 'kategori'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MCProject  $mcProject
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
        $mcProject->status = 0;
        $mcProject->update();
        return redirect('powner/create_project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MCProject  $mcProject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MCProject::destroy($id);
        return redirect('powner/create_project');
    }
}
