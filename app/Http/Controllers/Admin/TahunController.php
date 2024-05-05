<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Illuminate\Support\Facades\Validator;
class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = TahunAjaran::orderBy('nama')->get();
            
            return DataTables::of($data)
            ->addColumn('action', function($row){
                $btn = '<div class="d-flex">';
                $btn .= '<button class="btn btn-light btn-sm mx-1" onclick="ubah('.$row->id.')">Ubah</button>';
                $btn .= '<button class="btn btn-danger btn-sm mx-1" onclick="hapus('.$row->id.')">Hapus</button>';
                $btn .= '</div>';
                return $btn; 
            })
            ->rawColumns(['action']) 
            ->make(true);
        }
        return view('admin.tahun');
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
            'nama.required' => 'Nama Tahun Ajaran Wajib Diisi!',
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
                $data = new TahunAjaran();
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
    public function show(string $id)
    {
        $data = TahunAjaran::find($id);

        return view('admin.tahun.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = TahunAjaran::find($id);

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
            'nama.required' => 'Nama Tahun Ajaran Wajib Diisi!',
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
                $data = TahunAjaran::find($id);
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
            TahunAjaran::where('id', $id)->delete();
        }catch(\QueryException $e){
            DB::rollback();
            return response()->json([
                'message' => 'Tahun Ajaran Gagal Dihapus!',
            ], 422);
        }
        DB::commit();
        return response()->json([
            'message' => 'Tahun Ajaran Berhasil Dihapus!',
        ], 200);
    }
}
