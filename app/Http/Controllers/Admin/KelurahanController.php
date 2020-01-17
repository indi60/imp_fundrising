<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MKelurahan;
use DataTables;
use DB;
class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jsonKelurahan() {
        $provinsi = DB::table('m_provinsi')
        ->join('m_kabupaten', 'm_provinsi.id', '=', 'm_kabupaten.provinsi_id')
        ->join('m_kecamatan', 'm_kabupaten.id', '=', 'm_kecamatan.kabupaten_id')
        ->join('m_kelurahan', 'm_kecamatan.id', '=', 'm_kelurahan.kecamatan_id')
            ->select('m_kelurahan.*', 'm_provinsi.nama_provinsi',  'm_kabupaten.nama_kabupaten', 'm_kecamatan.nama_kecamatan')
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
        return view('admin/kelurahan/index', compact('provinsi'));
    }
    
    public function getKabupaten(Request $request) {
        $kabupaten = DB::table('m_kabupaten')
        ->where('provinsi_id', $request->provinsi_id)  
        ->pluck('nama_kabupaten', 'id');
        return response()->json($kabupaten);
    }
    public function getKecamatan(Request $request){
        $kecamatan = DB::table('m_kecamatan')
        ->where('kabupaten_id', $request->kabupaten_id)
        ->pluck('nama_kecamatan', 'id');
        return response()->json($kecamatan);
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
        MKelurahan::create($request->all());
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
        $data = MKelurahan::find($id);
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
        $data = MKelurahan::find($id);
        
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
        MKelurahan::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
}
