<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MKabupaten;
use DataTables;
use DB;
class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function jsonKabupaten() {
        $provinsi = DB::table('m_provinsi')
            ->join('m_kabupaten', 'm_provinsi.id', '=', 'm_kabupaten.provinsi_id')
            ->select('m_kabupaten.*', 'm_provinsi.nama_provinsi')
            ->get();
        return Datatables::of($provinsi)
        ->addColumn('action', function($provinsi){
            return '<a onclick="editForm('. $provinsi->id .')" class="btn btn-warning btn-sm text-light"><i class="far fa-edit"> Edit</i></a> ' .
            '<a onclick="deleteData('. $provinsi->id .')" class="btn btn-danger btn-sm text-light"><i class="far fa-trash-alt"> Delete</i></a>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function index()
    {
        
        $provinsi = DB::table('m_provinsi')
        ->pluck('nama_provinsi', 'id');
        
        return view('admin/kabupaten/index', compact('provinsi'));
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
        MKabupaten::create($request->all());
        return response()->json(['success'=> true]);
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
        $data = MKabupaten::find($id);
        return $data;
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
        $data = MKabupaten::find($id);
        
        $data->update($request->all());
        return response()->json([
            'success'=> true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MKabupaten::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
}
