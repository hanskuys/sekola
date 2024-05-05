<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DataTables;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $data = Siswa::whereHas('kelas', function ($query) use ($request) {
                $query->where('tahun_id', $request->tahun)
                      ->where('kelas_id', $request->kelas);
            })->orderBy('nama')->get();
            // dd($data);
            // return $request->tahun;
            
            return DataTables::of($data)
            ->addColumn('action', function($row){
                $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.siswa.show', ['id' => $row->id]) .'><i class="fa fa-list"></i> Detail</a>';
                return $btn; 
            })
            ->rawColumns(['action']) 
            ->make(true);
        }

        $tahun = TahunAjaran::select('id as value', 'nama as label')->orderBy('nama')->get()->toArray();
        $kelas = Kelas::select('id as value', 'nama as label')->orderBy('nama')->get()->toArray();


        return view('admin.siswa.index',[
            'tahun' => $tahun,
            'kelas' => $kelas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.siswas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_siswa' => 'required',
            'nis' => 'required',
            'nisn' => 'required',
            'semester' => 'required',
            'th_id' => 'required',
            'email' => 'required',
        ]);
        $validate['password'] = Hash::make('password'); // Password

        Siswa::create($validate);

        return redirect()->to('admin/siswas')->with('success', 'Successfully Created Siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Siswa::with('detail')->where('id',$id)->first();

        return view('admin.siswa.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::find($id);

        return view('dashboard.admin.siswas.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nama_siswa' => 'required',
            'nis' => 'required',
            'nisn' => 'required',
            'email' => 'required',
        ]);

        Siswa::where('id', $id)->update($validate);

        return redirect()->to('admin/siswas')->with('success', 'Successfully Updated Siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Siswa::where('id', $id)->delete();

        return redirect()->to('admin/siswas')->with('success', 'Successfully Deleted Siswa');
    }
}
