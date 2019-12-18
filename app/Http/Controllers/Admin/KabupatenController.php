<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provinsi;
use App\Kabupaten;
use DB; 
use DataTables;
class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function json() {
        $provinsi = DB::table('m_provinsi')
            ->join('m_kabupaten', 'm_provinsi.id', '=', 'm_kabupaten.provinsi_id')
            ->select('m_kabupaten.*', 'm_provinsi.nama_provinsi')
            ->get();
        return Datatables::of($provinsi)
        ->addColumn('nama_provinsi', function($provinsi){
            return $provinsi->nama_provinsi;
        })
        ->addColumn('action', function($provinsi){
            return 
            '<a href="/admin/kabupaten/'.$provinsi->id.'/edit"class="btn btn-info">EDIT</a>'.
            ' <a href="/admin/kabupaten/'.$provinsi->id.'" class="btn btn-danger">DELETE</a>';
            // '<form action="/admin/provinsi/'.$provinsi->id.' method="post" class="d-inline">'.@method('delete').@csrf.'<button onclick="return confirm("Yakin Hapus?")" type="submit" class="btn btn-danger">Delete</button> </form>';
        })
        ->rawColumns(['nama_provinsi', 'action'])
        ->make(true);
        // $kabupaten = Kabupaten::all();
    }
    public function index()
    {
        return view('admin/kabupaten/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_provinsi = Provinsi::All();
        $provinsi = [''=>'Pilih Provinsi'];

        foreach ($data_provinsi as $key => $value) {
            $provinsi[$value->id] = $value->nama_provinsi;
        }
        return view('admin/kabupaten/form', compact('provinsi'));
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
        return redirect('admin/kabupaten');
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
        
        $provinsi = [''=>'Pilih Provinsi'];
        $data_provinsi = Provinsi::All();

        foreach ($data_provinsi as $key => $value) {
            $provinsi[$value->id] = $value->nama_provinsi;

        }
        
    return view('admin/kabupaten/form', compact('data', 'provinsi'));
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
        return redirect('admin/kabupaten');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kabupaten::find($id);
        
        $data->delete();
        return redirect('admin/kabupaten');
    }
}
