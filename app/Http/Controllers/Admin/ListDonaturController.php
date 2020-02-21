<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefDonasiProject;
use App\MCProject;
use App\RefBank;
use DB;
use Session;
use DataTables;
class ListDonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jsonListDonatur() {
        $ldonatur = DB::table('ref_donasi_project')
        ->join('m_project', 'ref_donasi_project.project_id', '=', 'm_project.id')
        ->join('users', 'ref_donasi_project.donatur_id', '=', 'users.id')
        ->join('ref_bank', 'ref_donasi_project.bank_id', '=', 'ref_bank.id')
        ->select('ref_donasi_project.*', 'm_project.nama_project', 'users.name', 'ref_bank.nama_bank')
        ->get();
        // dd($ldonatur);
        return Datatables::of($ldonatur)
        ->addColumn('kode', function($dproject){
            $kode = $dproject->donasi;
            return "Rp ".number_format($kode,0,",",".");
        })
        ->addColumn('action', function($ldonatur){
                return  
                '<a href="'.('/admin/list_donatur/'.$ldonatur->id.'/edit').'" class="btn btn-primary btn-sm text-light"><i class="fas fa-eye"></i></a>';     
        })
        # code...
        ->rawColumns(['action', 'kode'])
        ->make(true);
    }
    public function index()
    {
        
        return view('admin/list_donatur/index');
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
        //
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
        $refdproject = RefDonasiProject::find($id);
        $mcproject = MCProject::pluck('nama_project', 'id');
        $refbank = RefBank::all();
        return view('admin/list_donatur/form', compact('refdproject', 'mcproject', 'refbank'));
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
        $refdonasi = RefDonasiProject::find($id);
        $refdonasi->project_id = $request->project_id;
        $refdonasi->owner_id = $request->owner_id;
        $refdonasi->donasi = str_replace('.','',$request->donasi);
        $refdonasi->status = $request->status;
        $refdonasi->bank_id = $request->bank_id;
        $refdonasi->update();
        
        //Terkumpul
        $mcproject = MCProject::find($request->id_projek);
        $mcproject->terkumpul = DB::table('ref_donasi_project')
        ->where('status', '1')
        ->where('project_id', $request->id_projek)
        ->sum('donasi');
        $mcproject->update();

        return redirect('admin/list_donatur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RefDonasiProject::destroy($id);
        return redirect('admin/list_donatur');
    }
}
