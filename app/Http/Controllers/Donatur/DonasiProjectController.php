<?php

namespace App\Http\Controllers\Donatur;
use DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\RefDonasiProject;
use App\MCProject;
use App\RefBank;
use Session;
use Str;
use Illuminate\Support\Facades\Storage;
class DonasiProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jsonDProject() {
        $dproject = DB::table('ref_donasi_project')
        ->where('donatur_id', Auth()->User()->id)
        ->join('m_project', 'ref_donasi_project.project_id', '=', 'm_project.id')
        ->join('users', 'ref_donasi_project.donatur_id', '=', 'users.id')
        ->join('ref_bank', 'ref_donasi_project.bank_id', '=', 'ref_bank.id')
        ->select('ref_donasi_project.*', 'm_project.nama_project', 'users.name', 'ref_bank.nama_bank')
        ->get();
        // dd($dproject);
        return Datatables::of($dproject)
        ->addColumn('kode', function($dproject){
            $kode = $dproject->donasi;
            return "Rp ".number_format($kode,0,",",".");
        })
        ->addColumn('action', function($dproject){
            if ($dproject->status == 0 || $dproject->status == 2) {
                return  
                '<form method="POST" action="'.('/donatur/donasi_project/'.$dproject->id).'"> <input type="hidden" name="_token" id="csrf-token" value="'. Session::token().'" /> 
                <input type="hidden" name="_method" value="DELETE">
                <a href="'.('/donatur/donasi_project/'.$dproject->id.'/edit').'" class="btn btn-warning btn-sm text-light"><i class="far fa-images"></i></a> 
                <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button></form>';
            }
            
        })
        ->addColumn('bukti', function($ldonatur){
            $path = Storage::url($ldonatur->bukti_transfer);
            return '<th><img width="500px" src="'.$path.'" alt="" srcset=""></th>';
        })
        # code...
        ->rawColumns(['action', 'kode', 'bukti'])
        ->make(true);
    }
    public function index()
    {
        return view('donatur/donasi_project/index');
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
        $refdonasi = new \App\RefDonasiProject;
        $refdonasi->project_id = $request->project_id;
        $refdonasi->owner_id = $request->owner_id;
        $refdonasi->donasi = str_replace('.','',$request->donasi);
        $refdonasi->kode_unik = (mt_rand(0,999));
        $refdonasi->status = 0;
        $refdonasi->bank_id = $request->bank_id;
        $refdonasi->donatur_id = auth()->user()->id;

        $refdonasi->save();
        return redirect()->route('donatur_project',$refdonasi->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mcproject = MCProject::where('status', '1')->findOrFail($id);
        $refbank = RefBank::pluck('nama_bank', 'id');
        return view('donatur/donasi_project/form', compact('mcproject', 'refbank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $refdproject = RefDonasiProject::where('status', '0')
        ->where('donatur_id', Auth()->User()->id)
        ->findOrFail($id);
        // $mcproject = MCProject::pluck('nama_project', 'id');
        $refbank = RefBank::All();
        return view('donatur/donasi_project/formedit', compact('refdproject', 'mcproject', 'refbank'));
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
        
        $refdonasi = RefDonasiProject::where('status', '0')->findOrFail($id);
        $refdonasi->status = 0;
        
        // $request->validate([
        //     'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        // //upload foto
        // if ($request->hasFile('bukti_transfer')) {
        //     $file = $request->file('bukti_transfer');
        //     $destinationPath = 'uploads/donasi_project/';
        //     $originalFile = $file->getClientOriginalName();
        //     $file->move($destinationPath, $originalFile);
        //     $refdonasi->bukti_transfer = $originalFile;
        // } else {
        //     return $request;
        //     $refdonasi->bukti_transfer = '';
        // }
        $this->validate($request, [
            'bukti_transfer' => 'required|file|max:7000', // max 7MB
        ]);
        $refdonasi->bukti_transfer = Storage::putFile(
            'public/images',
            $request->file('bukti_transfer')
        );
        // dd($refdonasi);
        $refdonasi->update();
        return redirect('donatur/donasi_project');
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
        return redirect('donatur/donasi_project');
    }
}
