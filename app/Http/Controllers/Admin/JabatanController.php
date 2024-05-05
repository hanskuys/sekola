<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jabatan::all();

        return view('dashboard.admin.jabatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'jabatan' => 'required'
        ]);
        
        $validate['jabatan'] = strtolower($validate['jabatan']);

        Jabatan::create($validate);
        return redirect()->to('/admin/jabatans')->with('success', 'Successfully Created Jabatan');
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
        $data = Jabatan::find($id);
        return view('dashboard.admin.jabatan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'jabatan' => 'required'
        ]);

        Jabatan::where('id', $id)->update($validate);

        return redirect()->to('/admin/jabatans')->with('success', 'Successfully Updated Jabatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Jabatan::where('id', $id)->delete();

        return redirect()->to('/admin/jabatans')->with('success', 'Successfully Deleted Jabatan');
    }
}
