<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefBank;
use DataTables;
class RefBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jsonRefBank() {
        $refbank = RefBank::All();

        return Datatables::of($refbank)
        ->addColumn('action', function($refbank){
            return '<a onclick="editForm('. $refbank->id .')" class="btn btn-warning btn-sm"><i class="far fa-edit"> Edit</i></a> ' .
            '<a onclick="deleteData('. $refbank->id .')" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"> Delete</i></a>';
            
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function index()
    {
        return view ('admin/ref_bank/index');
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
        RefBank::create($request->all());
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
        $refbank = RefBank::find($id);
        return $refbank;
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
        $refbank = RefBank::findOrFail($id)
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
        RefBank::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
}
