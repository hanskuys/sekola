<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Kelas::with(['guru'])->orderBY('nama', 'ASC')->get();
            
            return DataTables::of($data)
            ->addColumn('action', function($row){
                $btn = '<div class="dropdown">';
                $btn .= '<button class="btn btn-primary btn-sm dropdown-toggle me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                $btn .= 'Aksi';
                $btn .= '</button>';
                $btn .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">';
                $btn .= '<a class="dropdown-item" href="'. route('admin.kelas.edit', ['id' => $row->id]) .'">Ubah</a>';
                $btn .= '<a class="dropdown-item" href="javascript:void(0);" onclick="hapus('. $row->id .')">Hapus</a>';
                $btn .= '</div>';
                $btn .= '</div>';
                return $btn; 
            })
            ->addColumn('nama_guru', function($row){
                if($row->guru){
                    return $row->guru->nama;
                }else{
                    return '-';
                }
            })
            ->rawColumns(['action']) 
            ->make(true);
        }

        return view('admin.kelas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guru_ids = Kelas::latest()->get()->pluck(['karyawan_id']);
        $karyawan = Karyawan::orderBy('id', 'DESC')
        ->whereNotIn('id', $guru_ids)
        ->get();

        return view('admin.kelas.create',[
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'nama' => 'required',
            'karyawan_id' => 'required|unique:karyawans,karyawan_id',
            'lk' => 'required|number',
            'pr' => 'required|number',
        ];

        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'number' => 'Kolom :attribute hanya boleh angka',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }else{

            DB::beginTransaction();
            try{
                $data = new Kelas();
                $data->nama = $request->nama;
                $data->karyawan_id = $request->karyawan_id;
                $data->lk = $request->lk;
                $data->pr = $request->pr;
                $data->jk = $request->jk;
                $data->total = $request->total;
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'message' => 'Terjadi Kesalahan Server!',
                ], 422);
            }
            DB::commit();
            return redirect()->route('admin.kelas.index')->with('success', 'Successfully Updated Guru');

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Kelas::find($id);

        $karyawan = Karyawan::orderBy('id', 'DESC')->get();

        return view('admin.kelas.edit',[
            'data' => $data,
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $rules = [
            'nama' => 'required',
            'karyawan_id' => 'required|unique:karyawans,karyawan_id,'.$id,
            'lk' => 'required|number',
            'pr' => 'required|number',
        ];

        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'number' => 'Kolom :attribute hanya boleh angka',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }else{

            DB::beginTransaction();
            try{
                $data = Kelas::find($id);
                $data->nama = $request->nama;
                $data->karyawan_id = $request->karyawan_id;
                $data->lk = $request->lk;
                $data->pr = $request->pr;
                $data->jk = $request->jk;
                $data->total = $request->total;
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'message' => 'Terjadi Kesalahan Server!',
                ], 422);
            }
            DB::commit();
            return redirect()->route('admin.kelas.index')->with('success', 'Successfully Updated Guru');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try{
            Kelas::where('id', $id)->delete();
        }catch(\QueryException $e){
            DB::rollback();
            return response()->json([
                'message' => 'Data Gagal Dihapus!',
            ], 422);
        }
        // DB::commit();
        return response()->json([
            'message' => 'Data Berhasil Dihapus!',
        ], 200);
    }
}
