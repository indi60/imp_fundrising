<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provinsi;
use DataTables;
class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function json() {
        $provinsi = Provinsi::all();
        return Datatables::of($provinsi)
        ->addColumn('action', function($provinsi){
            return 
            '<a href="/admin/provinsi/'.$provinsi->id.'/edit"class="btn btn-info">EDIT</a>'.
            ' <a href="/admin/provinsi/'.$provinsi->id.'" class="btn btn-danger">DELETE</a>';
            // '<form action="/admin/provinsi/'.$provinsi->id.' method="post" class="d-inline">'.@method('delete').@csrf.'<button onclick="return confirm("Yakin Hapus?")" type="submit" class="btn btn-danger">Delete</button> </form>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function index()
    {
        return view('admin/provinsi/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/provinsi/form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Provinsi::create($request->all());
        return redirect('admin/provinsi');
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
        $data = Provinsi::find($id);

        return view('admin/provinsi/form', compact('data'));
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
        $data = Provinsi::find($id);

        $data->update($request->all());
        return redirect('admin/provinsi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Provinsi::destroy($id);
        return redirect('admin/provinsi');
    }
}
