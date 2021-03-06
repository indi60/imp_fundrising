<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MProvinsi;
use DataTables;
class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jsonProvinsi() {
        $provinsi = MProvinsi::All();

        return Datatables::of($provinsi)
        ->addColumn('action', function($provinsi){
            return '<a onclick="editForm('. $provinsi->id .')" class="btn btn-warning text-light btn-sm"><i class="far fa-edit"> Edit</i></a> ' .
            '<a onclick="deleteData('. $provinsi->id .')" class="btn btn-danger text-light btn-sm"><i class="far fa-trash-alt"> Delete</i></a>';
            
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MProvinsi::create($request->all());
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
        $provinsi = MProvinsi::find($id);
        return $provinsi;
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
        $provinsi = MProvinsi::findOrFail($id)
        ->update($request->all());

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
        MProvinsi::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
}
