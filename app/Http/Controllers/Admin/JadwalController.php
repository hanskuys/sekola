<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\Pelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DataTables;
use DB;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $data = Jadwal::with(['guru', 'pelajaran'])
            ->where('kelas_id', $request->kelas_id)
            ->where('tahun_id', $request->tahun_id)
            ->where('semester', $request->smt)
            ->orderBy('hari', 'ASC')->get();

            return response()->json($data, 200);
        }

        $tahun = TahunAjaran::select('id as value', 'nama as label')->orderBy('nama')->get()->toArray();
        $kelas = Kelas::select('id as value', 'nama as label')->orderBy('nama')->get()->toArray();
        $pelajaran = Pelajaran::select('id as value', 'nama as label')->orderBy('nama')->get()->toArray();

        $hari = [
            ['value' => 0, 'label' => 'Senin'],
            ['value' => 1, 'label' => 'Selasa'],
            ['value' => 2, 'label' => 'Rabu'],
            ['value' => 3, 'label' => 'Kamis'],
            ['value' => 4, 'label' => "Jum'at"],
            ['value' => 5, 'label' => "Sabtu"],
        ];

        return view('admin.jadwal.index',[
            'tahun' => $tahun,
            'kelas' => $kelas,
            'hari' => $hari,
            'pelajaran' => $pelajaran
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahun = TahunAjaran::select('id as value', 'nama as label')->orderBy('nama')->get()->toArray();
        $kelas = Kelas::select('id as value', 'nama as label')->orderBy('nama')->get()->toArray();
        $hari = array("senin", "selasa", "rabu", "kamis", "jum'at", "sabtu");

        return view('admin.jadwal.create',[
            'tahun' => $tahun,
            'kelas' => $kelas,
            'hari' => $hari
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'hari' => 'required',
            'pelajaran' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'guru' => 'required',
        ];

        $pesan = [
            'hari.required' => 'Hari harus diisi',
            'pelajaran.required' => 'Pelajaran harus diisi',
            'jam_mulai.required' => 'Hari harus diisi',
            'jam_selesai.required' => 'Hari harus diisi',
            'guru.required' => 'Guru harus diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'message' => 'Periksa Form',
                'errors' => $validator->errors(),
            ], 422);
        }else{

            DB::beginTransaction();
            try{
                $data = new Jadwal();
                $data->hari = $request->hari;
                $data->jam_mulai = $request->jam_mulai;
                $data->jam_selesai = $request->jam_selesai;
                $data->pelajaran_id = $request->pelajaran;
                $data->guru_id = $request->guru;
                $data->semester = $request->smt;
                $data->tahun_id = $request->tahun_id;
                $data->kelas_id = $request->kelas_id;
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'message' => 'Terjadi Kesalahan Server!',
                ], 422);
            }
            DB::commit();
            return response()->json([
                'message' => 'Data Berhasil Disimpan!',
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Jadwal::with(['guru', 'pelajaran'])
        ->where('id', $id)
        ->first();

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'hari' => 'required',
            'pelajaran' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'guru' => 'required',
        ];

        $pesan = [
            'hari.required' => 'Hari harus diisi',
            'pelajaran.required' => 'Pelajaran harus diisi',
            'jam_mulai.required' => 'Hari harus diisi',
            'jam_selesai.required' => 'Hari harus diisi',
            'guru.required' => 'Guru harus diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'message' => 'Periksa Form',
                'errors' => $validator->errors(),
            ], 422);
        }else{

            DB::beginTransaction();
            try{
                $data = Jadwal::where('id', $id)->first();
                $data->hari = $request->hari;
                $data->jam_mulai = $request->jam_mulai;
                $data->jam_selesai = $request->jam_selesai;
                $data->pelajaran_id = $request->pelajaran;
                $data->guru_id = $request->guru;
                $data->semester = $request->smt;
                $data->tahun_id = $request->tahun_id;
                $data->kelas_id = $request->kelas_id;
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'message' => 'Terjadi Kesalahan Server!',
                ], 422);
            }
            DB::commit();
            return response()->json([
                'message' => 'Data Berhasil Disimpan!',
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        DB::beginTransaction();
        try{
            Jadwal::where('id', $id)->delete();
        }catch(\QueryException $e){
            DB::rollback();
            return response()->json([
                'message' => 'Data gagal dihapus',
            ], 422);
        }
        // DB::commit();
        return response()->json([
            'message' => 'Data berhasil dihapus',
        ], 200);
    }
}
