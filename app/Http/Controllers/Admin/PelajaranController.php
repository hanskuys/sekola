<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelajaran;
use App\Models\Karyawan;
use App\Models\PelajaranGuru;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Illuminate\Support\Facades\Validator;
class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pelajaran::withCount('guru')->orderBy('nama')->get();
            
            return DataTables::of($data)
            ->addColumn('action', function($row){
                $btn = '<div class="dropdown">';
                $btn .= '<button class="btn btn-primary btn-sm dropdown-toggle me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                $btn .= 'Aksi';
                $btn .= '</button>';
                $btn .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">';
                $btn .= '<a class="dropdown-item" href="'. route('admin.pelajaran.show', ['id' => $row->id]) .'">Detail Pengajar</a>';
                $btn .= '<a class="dropdown-item" href="javascript:void(0);" onclick="ubah('. $row->id .')">Ubah</a>';
                $btn .= '<a class="dropdown-item" href="javascript:void(0);" onclick="hapus('. $row->id .')">Hapus</a>';
                $btn .= '</div>';
                $btn .= '</div>';
                return $btn; 
            })
            ->rawColumns(['action']) 
            ->make(true);
        }
        return view('admin.pelajaran.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $rules = [
            'nama' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Pelajaran Wajib Diisi!',
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
                $data = new Pelajaran();
                $data->nama = $request->nama;
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
    public function show($id, Request $request)
    {
        if ($request->ajax()) {
            $data = Karyawan::whereHas('pelajaran')->orderBy('nama')->get();
            
            return DataTables::of($data)
            ->addColumn('action', function($row){
                $btn = '<div class="dropdown">';
                $btn .= '<button class="btn btn-primary btn-sm dropdown-toggle me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                $btn .= 'Aksi';
                $btn .= '</button>';
                $btn .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">';
                $btn .= '<a class="dropdown-item" href="'. route('admin.pelajaran.show', ['id' => $row->id]) .'">Detail Pengajar</a>';
                $btn .= '<a class="dropdown-item" href="javascript:void(0);" onclick="ubah('. $row->id .')">Ubah</a>';
                $btn .= '<a class="dropdown-item" href="javascript:void(0);" onclick="hapus('. $row->id .')">Hapus</a>';
                $btn .= '</div>';
                $btn .= '</div>';
                return $btn; 
            })
            ->rawColumns(['action']) 
            ->make(true);
        }
        $data = Pelajaran::find($id);
        $guru = Karyawan::select('id as value', 'nama as label')->orderBy('nama')->get()->toArray();

        return view('admin.pelajaran.show', [
            'data' => $data,
            'guru' => $guru
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pelajaran::find($id);

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $rules = [
            'nama' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Pelajaran Wajib Diisi!',
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
                $data = Pelajaran::find($id);
                $data->nama = $request->nama;
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
            Pelajaran::where('id', $id)->delete();
        }catch(\QueryException $e){
            DB::rollback();
            return response()->json([
                'message' => 'Pelajaran Gagal Dihapus!',
            ], 422);
        }
        DB::commit();
        return response()->json([
            'message' => 'Pelajaran Berhasil Dihapus!',
        ], 200);
    }
    
    public function guru(Request $request)
    {
        $data = Karyawan::whereHas('pelajaran', function($q) use($request){
            return $q->where('pelajaran_id', $request->pelajaran_id);
        })->get();

        return response()->json($data, 200);
    }

    
    public function guruStore(Request $request)
    {
        $rules = [
            'guru_id' => 'required',
        ];

        $pesan = [
            'guru_id.required' => 'Guru harus diisi',
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
                $data = new PelajaranGuru();
                $data->pelajaran_id = $request->pelajaran_id;
                $data->guru_id = $request->guru_id;
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

    
    public function guruUpdate(Request $request)
    {
        $data = PelajaranGuru::where('pelajaran_id', $request->pelajaran_id)
        ->where('guru_id', $request->guru_id)->get();

        return response()->json($data, 200);
    }
    
    public function guruDelete(Request $request)
    {
        $data = PelajaranGuru::where('pelajaran_id', $request->pelajaran_id)
        ->where('guru_id', $request->guru_id)->get();

        return response()->json($data, 200);
    }
}
