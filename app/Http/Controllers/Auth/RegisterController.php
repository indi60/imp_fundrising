<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    public function index()
    {
        $provinsi = DB::table('m_provinsi')
        ->pluck('nama_provinsi', 'id');
        return view('auth/register', compact('provinsi'));
    }
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    public function redirectTo()
    {
        switch(Auth::user()->level){
            case 2:
            $this->redirectTo = '/admin';
            return $this->redirectTo;
                break;
            case 3:
                $this->redirectTo = '/powner';
                return $this->redirectTo;
                break;
            case 1:
                $this->redirectTo = '/donatur';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }
         
        // return $next($request);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
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
    public function getKelurahan(Request $request) {
        $kelurahan = DB::table('m_kelurahan')
        ->where('kecamatan_id', $request->kecamatan_id)
        ->pluck('nama_kelurahan', 'id');
        return response()->json($kelurahan);
    }
    protected function create(array $data)
    {
        return User::create([
            'nik' => $data['nik'],
            'name' => $data['name'],
            'email' => $data['email'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat' => $data['alamat'],
            'provinsi_id' => $data['provinsi_id'],
            'kabupaten_id' => $data['kabupaten_id'],
            'kecamatan_id' => $data['kecamatan_id'],
            'kelurahan_id' => $data['kelurahan_id'],
            'level' => $data['level'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
