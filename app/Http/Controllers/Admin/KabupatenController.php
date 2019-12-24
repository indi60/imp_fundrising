<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provinsi;
use App\Kabupaten;
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
            return '<a onclick="editForm('. $provinsi->id .')" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
            '<a onclick="deleteData('. $provinsi->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
           // '<form action="/admin/provinsi/'.$provinsi->id.' method="post" class="d-inline">'.@method('delete').@csrf.'<button onclick="return confirm("Yakin Hapus?")" type="submit" class="btn btn-danger">Delete</button> </form>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function index()
    {
        
        $provinsi = DB::table('m_provinsi')
        ->pluck('nama_provinsi', 'id');
        // $provinsi = [''=>'PILIH PROVINSI'];

        // foreach ($data_provinsi as $key => $value) {
        //     $provinsi[$value->id] = $value->nama_provinsi;
        // }
        return view('admin/kabupaten/index', compact('provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data_provinsi = Provinsi::All();
        // $provinsi = [''=>'Pilih Provinsi'];

        // foreach ($data_provinsi as $key => $value) {
        //     $provinsi[$value->id] = $value->nama_provinsi;
        // }
        // return view('admin/kabupaten/form', compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kabupaten::create($request->all());
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
        $data = Kabupaten::find($id);
        return $data;
        // $provinsi = Provinsi::find($id);
        // return $provinsi;
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
        $data = Kabupaten::find($id);
        
        $data->update($request->all());
        // $provinsi = Provinsi::findOrFail($id)->update($request->all());

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
        Kabupaten::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
}
