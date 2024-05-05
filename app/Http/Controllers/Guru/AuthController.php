<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        if(auth()->guard('karyawan')->check()){
            return redirect()->to('guru/beranda');
        }

        return view('auth.contents.login-guru');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|exists:karyawans,email|string',
            'password' => 'required|string'
        ];
        $pesan = [
            'email.required' => 'Alamat Email Wajib Diisi!',
            'email.exists' => 'Alamat Email Belum Terdaftar!',
            'password.required' => 'Password Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
         return redirect()->back()->withInput()->withErrors($validator->errors());
        }else{
             if(auth()->guard('karyawan')->attempt($request->only('email','password')))
             {
                return redirect()->to('/guru/beranda');
             }else{
                $gagal['password'] = array('Password salah!');
                return redirect()->back()->withInput()->withErrors($gagal);
             }
         }
    }

    
    public function logout()
    {
        Auth::guard('karyawan')->logout();

        return redirect()->to('/guru')->with('success', 'Successfully Logout');
    }
}
