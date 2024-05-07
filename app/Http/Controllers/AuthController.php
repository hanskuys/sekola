<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SiswaDaftarMail;
class AuthController extends Controller
{


    public function index()
    {
        if(auth()->guard('siswa')->check()){
            return redirect()->to('siswa/beranda');
        }

        return view('auth.contents.login');
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::guard('siswa')->attempt($validate)) {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }

        return redirect()->to('/siswa');
    }

    public function register()
    {
        return view('landing.register');
    }

    
    public function store(Request $request)
    {

        $rules = [
            'nama' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nisn' => 'required|unique:siswas,nisn',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'email' => 'required|email|unique:siswas,email',
            'password' => 'required',
            'semester' => 'nullable',
        ];

        $pesan = [
            'nama.required' => 'Nama Siswa harus diisi',
            'jk.required' => 'Jenis Kelamin harus diisi',
            'tempat_lahir.required' => 'Tempat Lahir harus diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
            'nisn.required' => 'NIS harus diisi',
            'nisn.unique' => 'NISN Sudah Terdaftar!',
            'alamat.required' => 'Alamat harus diisi',
            'no_tlp.required' => 'No HP harus diisi',
            'password.required' => 'Password harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email Sudah Terdaftar!',
        ];

        
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();

            try{

                $data = new Siswa();
                $data->nama = $request->nama;
                $data->jenis_kelamin = $request->jk;
                $data->tempat_lahir = $request->tempat_lahir;
                $data->tanggal_lahir = $request->tanggal_lahir;
                $data->nis = $request->nis;
                $data->nisn = $request->nisn;
                $data->alamat = $request->alamat;
                $data->no_tlp = $request->no_tlp;
                $data->email = $request->email;
                $data->password =  Hash::make($request->password);
                $data->save();

                Mail::to($request->email)->send(new SiswaDaftarMail($request->nama_siswa));

            }catch(\QueryException $e){
                DB::rollback();
                dd($e);
            }
            DB::commit();
            return redirect()->to('/login')->with('success', 'Berhasil Membuat Akun');
        }
    }

    public function logoutSiswa()
    {
        Auth::guard('siswa')->logout();

        return redirect()->to('/login')->with('success', 'Successfully Logout');
    }

    
    public function logoutAdmin()
    {
        Auth::guard('web')->logout();

        return redirect()->to('/admin')->with('success', 'Successfully Logout');
    }

    public function logoutGuru()
    {
        Auth::guard('karyawan')->logout();

        return redirect()->to('/guru')->with('success', 'Successfully Logout');
    }
}
