<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MKecamatan;
use DataTables;
use DB;
class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jsonKecamatan() {
        $provinsi = DB::table('m_provinsi')
        ->join('m_kabupaten', 'm_provinsi.id', '=', 'm_kabupaten.provinsi_id')
        ->join('m_kecamatan', 'm_kabupaten.id', '=', 'm_kecamatan.kabupaten_id')
            ->select('m_kecamatan.*', 'm_provinsi.nama_provinsi',  'm_kabupaten.nama_kabupaten')
            ->get();
            return Datatables::of($provinsi)
        ->addColumn('action', function($provinsi){
            return '<a onclick="editForm('. $provinsi->id .')" class="btn btn-warning btn-xs"><i class="far fa-edit"> Edit</i></a> ' .
            '<a onclick="deleteData('. $provinsi->id .')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"> Delete</i></a>';
           })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function index()
    {
        $provinsi = DB::table('m_provinsi')
        ->pluck('nama_provinsi', 'id');
        return view('admin/kecamatan/index', compact('provinsi'));
    }
    
    public function getKabupaten(Request $request) {
        $kabupaten = DB::table('m_kabupaten')
        ->where('provinsi_id', $request->provinsi_id)  
        ->pluck('nama_kabupaten', 'id');
        return response()->json($kabupaten);
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
        MKecamatan::create($request->all());
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
        $data = MKecamatan::find($id);
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
        $data = MKecamatan::find($id);
        
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
        MKecamatan::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
}
