<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Models\Data_lengkap_siswa;
// use App\Models\Data_ortu_siswa;
// use App\Models\Data_tambahan_siswa;
use App\Models\Siswa;
use Illuminate\Http\Request;
use DataTables;

use App\Models\Kelas;
use App\Models\KelasBridge;

class PPDBController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Siswa::where('status', 0)->get();
            
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

        return view('admin.ppdb.show', compact('data'));
    }
    
    public function konfirmasi(string $id)
    {
        Data_tambahan_siswa::where('siswa_id', $id)->update(['status' => 1]);
        
        $kelas = Kelas::withCount([
            'bridge'
        ])->where('tingkat', 7)->get();

        foreach($kelas as $k){

            if($k->brdige_count+1 < $k->jml){
                $bridge = new KelasBridge();
                $bridge->siswa_id = $id;
                // $k->bridge->save($bridge);
                $bridge->kelas_id = $k->id;
                $bridge->save();
                break;
            };
        }

        return redirect()->to('/admin/pendaftarans')->with('success', 'Successfully Change Status');

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
