<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
        if(auth()->guard('web')->check()){
            return redirect()->to('admin/beranda');
        }

        return view('auth.contents.login-admin');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|exists:users,email|string',
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
             if(auth()->guard('web')->attempt($request->only('email','password')))
             {
                return redirect()->to('/admin/beranda');
             }else{
                $gagal['password'] = array('Password salah!');
                return redirect()->back()->withInput()->withErrors($gagal);
             }
         }
    }

    
    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->to('/admin')->with('success', 'Successfully Logout');
    }
}
