<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Karyawan_pelajaran;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class GuruPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id, Request $request)
    {
        $data = Karyawan_pelajaran::with('karyawan', 'pelajaran')->get();
        return view('admiin.pelajaran.guru');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve all Karyawan records with their associated KaryawanTugas and Jabatan
        $karyawanTugasRecords = Karyawan::with(['karyawan_tugas', 'karyawan_tugas.jabatan'])
            ->get();

        // Filter only the records where the jabatan is 'guru'
        $karyawan = $karyawanTugasRecords->filter(function ($karyawan) {
            return optional($karyawan->karyawan_tugas)->jabatan->jabatan == 'guru';
        });

        $pelajaran = Pelajaran::all();
        return view('dashboard.admin.guru-matpel.create', compact('karyawan', 'pelajaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'karyawan_id' => 'required',
            'pelajaran_id' => 'required'
        ]);

        Karyawan_pelajaran::create($validate);

        return redirect()->to('/admin/guru-matpel')->with('success', 'Successfully Assign Guru Mata Pelajaran');
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
        $data = Karyawan_pelajaran::findOrFail($id);
        // Retrieve all Karyawan records with their associated KaryawanTugas and Jabatan
        $karyawanTugasRecords = Karyawan::with(['karyawan_tugas', 'karyawan_tugas.jabatan'])
            ->get();

        // Filter only the records where the jabatan is 'guru'
        $karyawan = $karyawanTugasRecords->filter(function ($karyawan) {
            return optional($karyawan->karyawan_tugas)->jabatan->jabatan == 'guru';
        });
        $pelajaran = Pelajaran::all();
        return view('dashboard.admin.guru-matpel.edit', compact('data', 'karyawan', 'pelajaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'karyawan_id' => 'required',
            'pelajaran_id' => 'required'
        ]);

        $karyawanTugas = Karyawan_pelajaran::find($id);

        if (!$karyawanTugas) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        $karyawanTugas->update($validate);

        return redirect()->to('/admin/guru-matpel')->with('success', 'Successfully Update Assign Guru Mata Pelajaran');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Karyawan_pelajaran::where('id', $id)->delete();

        return redirect()->to('/admin/guru-matpel')->with('success', 'Successfully Deleted Assign Guru Mata Pelajaran');
    }
}
