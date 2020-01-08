<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MKategoriProject;
use DataTables;

class KategoriProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jsonKategoriProject() {
        $kategori = MKategoriProject::all();

        return Datatables::of($kategori)
        ->addColumn('action', function($kategori){
            return '<a onclick="editForm('. $kategori->id .')" class="btn btn-warning btn-sm"><i class="far fa-edit"> Edit</i></a> ' .
            '<a onclick="deleteData('. $kategori->id .')" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"> Delete</i></a>';
            
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function index()
    {
        return view('admin/kategori_project/index');
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
        MKategoriProject::create($request->all());
        return response()->json([
            'success' => true
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MKategoriProject  $mKategoriProject
     * @return \Illuminate\Http\Response
     */
    public function show(MKategoriProject $mKategoriProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MKategoriProject  $mKategoriProject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = MKategoriProject::find($id);
        return $kategori;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MKategoriProject  $mKategoriProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kategori = MKategoriProject::findOrFail($id)->update($request->all());
        return response()->json([
            'success' => true 
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MKategoriProject  $mKategoriProject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MKategoriProject::destroy($id);

        return response()->json([
            'success' => true
        ]);
    }
}
