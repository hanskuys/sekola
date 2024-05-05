<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nis' => 'nullable',
            'nisn' => 'required|unique:siswas,nisn',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'email' => 'required|email|unique:siswas,email',
            'password' => 'required',
            'semester' => 'nullable',
        ];

        $pesan = [
            'nama_siswa.required' => 'Nama Siswa Wajib Diisi!',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Diisi!',
            'tempat_lahir.required' => 'Tempat Lahir Wajib Diisi!',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Diisi!',
            'nis.required' => 'NIS Wajib Diisi!',
            'nisn.unique' => 'NISN Sudah Terdaftar!',
            'alamat.required' => 'Alamat Wajib Diisi!',
            'no_tlp.required' => 'No HP Wajib Diisi!',
            'password.required' => 'Password Wajib Diisi!',
            'email.required' => 'Email Wajib Diisi!',
            'email.unique' => 'Email Sudah Terdaftar!',
        ];

        
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();

            try{

                $data = new Siswa();
                $data->nama_siswa = $request->nama_siswa;
                $data->jenis_kelamin = $request->jenis_kelamin;
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
            return redirect()->to('/')->with('success', 'Berhasil Membuat Akun');
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
