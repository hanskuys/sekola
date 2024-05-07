<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\KelasBridge;
use App\Models\Pelajaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        // dd(empty(auth()->user()->detail) || empty(auth()->user()->ortu)); 
        $siswa = $request->user();

        $kelas = KelasBridge::where('siswa_id', $siswa->id)->first();
        
        $total_pelajaran = Pelajaran::count();

        return view('siswa.welcome', compact('kelas', 'total_pelajaran'));
    }

    public function siswa(Request $request)
    {
        $siswa = $request->user();

        $data = Siswa::where('id', $siswa->id)->first();

        return view('siswa.profile', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nama_siswa' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'confirm_password' => 'nullable|same:password'
        ]);

        $validate['password'] = Hash::make($validate['password']);

        Siswa::where('id', $id)->update([
            'nama_siswa' => $validate['nama_siswa'],
            'email' => $validate['email'],
            'password' => $validate['password']
        ]);

        return redirect()->to('/siswa')->with('success', 'Successfully Changed Password');
    }
}
