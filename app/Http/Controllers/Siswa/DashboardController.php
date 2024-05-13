<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\KelasBridge;
use App\Models\Pelajaran;
use App\Models\Siswa;
use App\Models\AbsenDetail;
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

    public function absen(Request $request)
    {
        return view('siswa.absen');
    }

    public function absenData(Request $request)
    {

        $siswa = auth()->guard('siswa')->user();

        $query = AbsenDetail::with('absen')->where('siswa_id', $siswa->id)->get();

        $data = collect([]);

        foreach($query as $q){
            $data->push([
                'title' => $q->status,
                'start' => Carbon::parse($q->absen->tgl),
                'end' => Carbon::parse($q->absen->tgl),
            ]);
        }

        return response()->json($data);
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

    
    public function logout()
    {
        Auth::guard('siswa')->logout();

        return redirect()->to('/login')->with('success', 'Successfully Logout');
    }
}
