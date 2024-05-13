<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DataTables;
use DB;
use Illuminate\Support\Facades\Validator;
class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Karyawan::orderBy('nama')->get();
            
            return DataTables::of($data)
            ->addColumn('action', function($row){
                $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.guru.show', ['id' => $row->id]) .'><i class="fa fa-list"></i> Detail</a>';
                return $btn; 
            })
            ->addColumn('nip', function($row){
                $val = $row->nip ?? '-';
                return $val; 
            })
            ->addColumn('nuptk', function($row){
                $val = $row->nuptk ?? '-';
                return $val; 
            })
            ->addColumn('nbm', function($row){
                $val = $row->nbm ?? '-';
                return $val; 
            })
            ->rawColumns(['action']) 
            ->make(true);
        }

        return view('admin.guru.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $rules = [
            'nip' => 'required',
            'nama' => 'required',
            'email' => 'required|unique:karyawans,email',
            'password' => 'required',
        ];

        $pesan = [
            'nip.required' => 'NIP harus diisi',
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.required' => 'Email sudah digunakan',
            'password.required' => 'Password harus diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }else{

            DB::beginTransaction();
            try{
                $data = new Karyawan();
                $data->nip = $request->nip;
                $data->nuptk = $request->nuptk;
                $data->nbm = $request->nbm;
                $data->nama = $request->nama;
                $data->jk = $request->jk;
                $data->tmp_lahir = $request->tmp_lahir;
                $data->tgl_lahir = $request->tgl_lahir;
                $data->tgl_mulai = $request->tgl_mulai;
                $data->email = $request->email;
                $data->password = Hash::make($request->password);
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'message' => 'Terjadi Kesalahan Server!',
                ], 422);
            }
            DB::commit();
            return redirect()->to('/admin/gurus')->with('success', 'Successfully Updated Guru');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Karyawan::find($id);

        return view('admin.guru.show',[
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Karyawan::find($id);
    
        return view('admin.guru.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $rules = [
            'nip' => 'required',
            'nama' => 'required',
            'email' => 'required|unique:karyawans,email',
            'password' => 'required',
        ];

        $pesan = [
            'nip.required' => 'NIP harus diisi',
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.required' => 'Email sudah digunakan',
            'password.required' => 'Password harus diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }else{

            DB::beginTransaction();
            try{
                $data = Karyawan::find($id);
                $data->nip = $request->nip;
                $data->nuptk = $request->nuptk;
                $data->nbm = $request->nbm;
                $data->nama = $request->nama;
                $data->jk = $request->jk;
                $data->tmp_lahir = $request->tmp_lahir;
                $data->tgl_lahir = $request->tgl_lahir;
                $data->tgl_mulai = $request->tgl_mulai;
                $data->email = $request->email;
                $data->password = Hash::make($request->password);
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'message' => 'Terjadi Kesalahan Server!',
                ], 422);
            }
            DB::commit();
            return redirect()->to('/admin/gurus')->with('success', 'Successfully Updated Guru');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Karyawan::where('id', $id)->delete();

        return redirect()->to('/admin/gurus')->with('success', 'Successfully Deleted Guru');
    }
}
