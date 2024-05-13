<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\KelasBridge;
use App\Models\TahunAjaran;

class PPDBController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Siswa::where('status', 0)
            // ->whereHas('detail')
            // ->whereHas('ortu')
            // ->whereHas('dapodik')
            ->get();
            
            return DataTables::of($data)
            ->addColumn('action', function($row){
                $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.ppdb.show', ['id' => $row->id]) .'><i class="fa fa-list"></i> Detail</a>';
                return $btn; 
            })
            ->rawColumns(['action']) 
            ->make(true);
        }
        
        return view('admin.ppdb.index');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Siswa::with('detail')->where('id',$id)->first();
        $kelas = Kelas::select('id as value', 'nama as label')->orderBy('nama')->get()->toArray();
        return view('admin.ppdb.show', compact('data', 'kelas'));
    }
    
    public function konfirmasi(Request $request)
    {
        
        $rules = [
            'kelas' => 'required',
        ];

        $pesan = [
            'kelas.required' => 'Kelas Wajib Diisi!',
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
                $tahun = TahunAjaran::where('aktif', 1)->first();

                $data = new KelasBridge();
                $data->siswa_id = $request->siswa_id;
                $data->kelas_id = $request->kelas;
                $data->tahun_id = $tahun->id;
                $data->save();

                $siswa = Siswa::where('id', $request->siswa_id)->update(['status' => 1]);

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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
