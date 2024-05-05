<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\Karyawan_tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Karyawan_tugas::with('karyawan', 'jabatan')->get();
        return view('dashboard.admin.tugas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        $jabatan = Jabatan::all();
        return view('dashboard.admin.tugas.create', compact('karyawan', 'jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'karyawan_id' => 'required',
            'jabatan_id' => 'required'
        ]);
        
        Karyawan_tugas::create($validate);

        return redirect()->to('/admin/tugas')->with('success', 'Successfully Assign Jabatan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Karyawan_tugas::findOrFail($id);
        $karyawan = Karyawan::all(); 
        $jabatan = Jabatan::all();
        return view('dashboard.admin.tugas.edit', compact('data', 'karyawan', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'karyawan_id' => 'required',
            'jabatan_id' => 'required'
        ]);
    
        $karyawanTugas = Karyawan_tugas::find($id);
    
        if (!$karyawanTugas) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        $karyawanTugas->update($validate);

        return redirect()->to('/admin/tugas')->with('success', 'Successfully Update Assign Jabatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Karyawan_tugas::where('id', $id)->delete();

        return redirect()->to('/admin/tugas')->with('success', 'Successfully Deleted Assign Jabatan');
    }
}
