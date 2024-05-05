<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Pelajaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\Nilai;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        
        $data = Nilai::with(['tahun'])
        ->where('siswa_id', $user->id )->orderBy('id', 'DESC')->get();

        return view('dashboard.siswa.nilais.index',[
            'data' => $data
        ]);
    }


    
    public function show($id, Request $request)
    {
        $user = $request->user();

        $siswa = Siswa::where('id', $user->id)->with('nilais', 'absen')->first();
        $mata_pelajarans = Pelajaran::all();
        
        return view('dashboard.siswa.nilais.index', compact('siswa', 'mata_pelajarans'));
    }
}
