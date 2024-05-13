<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NilaiDetail;
use App\Models\Pelajaran;
use App\Models\Siswa;
use App\Models\TahunAjaran;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->guard('siswa')->user();
        // dd($user)l
        $tahun = TahunAjaran::select('id as value', 'nama as label')->orderBy('nama')->get()->toArray();

        $smt = $request->smt;

        $query = NilaiDetail::select('nilai_detail.id as id', 'siswa_id', 'pelajaran.nama as pelajaran', 'nilai', 'nilai.jenis')
        ->join('nilai', 'nilai.id', '=', 'nilai_detail.nilai_id')
        ->join('pelajaran', 'pelajaran.id', '=', 'nilai.pelajaran_id')
        ->where('siswa_id', $user->id)
        ->where('tahun_id', $request->tahun)
        ->where('semester', $request->smt)
        ->get()->toArray();

        $groupedData = [];
        foreach ($query as $item) {
            $groupedData[$item['pelajaran']][$item['jenis']] = $item['nilai'];
        }
        // foreach($groupedData as $pelajaran => $item){
        //     // echo $pelajaran;
        //     echo $item['Ulangan-2'];
        //     // dd($item[0]);
        // }
        // dd($groupedData);
        return view('siswa.nilai.index',[
            'tahun' => $tahun,
            'data' => $groupedData,
        ]);
    }


    
    public function data($id, Request $request)
    {
        $user = auth()->guard('siswa')->user()->id;

        $siswa = Siswa::where('id', $user->id)->with('nilais', 'absen')->first();
        $mata_pelajarans = Pelajaran::all();
        
        return view('dashboard.siswa.nilais.index', compact('siswa', 'mata_pelajarans'));
    }
}
