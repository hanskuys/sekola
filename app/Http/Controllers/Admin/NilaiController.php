<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelajaran;
use App\Models\Siswa;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{

    public function index()
    {
        $data = Nilai::with(['tahun', 'siswa'])->orderBy('id', 'DESC')->get();
        // $siswas = Siswa::with('nilais', 'absen')->get();

        return view('dashboard.admin.nilais.index', [
            'data' => $data
        ]);
    }

    public function show(string $id)
    {
        $siswa = Siswa::where('id', $id)->with('nilais', 'absen')->first();
        $mata_pelajarans = Pelajaran::all();
        // dd($siswa);
        return view('dashboard.admin.nilais.show', compact('siswa', 'mata_pelajarans'));
    }
}
