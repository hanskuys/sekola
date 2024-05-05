<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

use App\Models\Karyawan;
class KategoriKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelases = Kelas::with(['guru'])
        ->withCount(['bridge'])->orderBY('kelas', 'ASC')->get();
        // dd($kelases);
        return view('dashboard.admin.kategori-kelases.index', compact('kelases'));
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

        return view('dashboard.admin.kategori-kelases.create',[
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'kelas' => 'required',
            'karyawan_id' => 'required',
            'lk' => 'required',
            'pr' => 'required',
            'jml' => 'required'
        ]);

        Kelas::create($validate);

        return redirect()->to('/admin/kategori-kelases')->with('success', 'Successfully Created Kategori Kelas');
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
        $kelas = Kelas::find($id);

        $karyawan = Karyawan::orderBy('id', 'DESC')->get();

        return view('dashboard.admin.kategori-kelases.edit',[
            'kelas' => $kelas,
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $kelas = Kelas::where('id', $id)->first();

        $validate = $request->validate([
            'kelas' => 'required',
            'karyawan_id' => 'required|unique:kelases,karyawan_id,'.$kelas->karyawan_id,
            'lk' => 'required',
            'pr' => 'required',
            'jml' => 'required'
        ]);

        $kelas->update($validate);

        return redirect()->to('/admin/kategori-kelases')->with('success', 'Successfully Updated Kategori Kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kelas::where('id', $id)->delete();

        return redirect()->to('/admin/kategori-kelases')->with('success', 'Successfully Deleted Kategori Kelas');
    }
}
