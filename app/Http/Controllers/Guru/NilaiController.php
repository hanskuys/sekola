<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\NilaiDetail;
use App\Models\Pelajaran;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\Jadwal;
use App\Models\Kelas;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $data = Nilai::with(['kelas', 'pelajaran'])
            ->orderBy('id', 'DESC')->get();
            
            return DataTables::of($data)
            ->addColumn('action', function($row){
                $btn = '<a class="btn btn-primary btn-sm" href='. route('guru.nilai.show', ['id' => $row->id]) .'><i class="fa fa-list"></i> Detail</a>';
                return $btn; 
            })
            ->addColumn('created_at', function($row){
                $val = Carbon::parse($row->created_at)->translatedFormat('d F Y');
                return $val; 
            })
            ->rawColumns(['action', 'created_at']) 
            ->make(true);
        }


        $tahun = TahunAjaran::select('id as value', 'nama as label')
        ->orderBy('nama')->get()->toArray();

        $kelas = Kelas::select('id as value', 'nama as label')
        ->whereIn('id', guru_kelas_ids())
        ->orderBy('nama')->get()->toArray();

        $pelajaran = Pelajaran::select('id as value', 'nama as label')
        ->whereIn('id', guru_pelajaran_ids())
        ->orderBy('nama')->get()->toArray();
        
        return view('guru.nilai.index',[
            'kelas' => $kelas,
            'tahun' => $tahun,
            'pelajaran' => $pelajaran
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $kelas = Kelas::select('id as value', 'nama as label')
        ->whereIn('id', guru_kelas_ids())
        ->orderBy('nama')->get()->toArray();

        $tahun = TahunAjaran::select('id as value', 'nama as label')
        ->orderBy('nama')->get()->toArray();

        $pelajaran = Pelajaran::select('id as value', 'nama as label')
        ->whereIn('id', guru_pelajaran_ids())
        ->orderBy('nama')->get()->toArray();
        
        // $ajaran = TahunAjaran::all();
        // dd($siswa);
        return view('guru.nilai.create',[
            'tahun' => $tahun,
            'kelas' => $kelas,
            'pelajaran' => $pelajaran,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'tahun' => 'required',
            'pelajaran' => 'required',
            'smt' => 'required',
            'type' => 'required',
            'kelas_id' => 'required',
            'line.*.nilai' => 'required|numeric',
        ];

        // Define custom error messages
        $messages = [
            'tahun.required' => 'Tahun ajaran harus diisi',
            'smt.required' => 'Semester harus diisi',
            'type.required' => 'Jenis nilai harus diisi',
            'pelajaran.required' => 'Mata pelajaran harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'line.*.nilai.required' => 'Nilai wajib diisi',
            'line.*.nilai.numeric' => 'Nilai hanya berupa angka',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();
            try{

                $data = new Nilai();
                $data->tahun_id = $request->tahun;
                $data->kelas_id = $request->kelas_id;
                $data->semester = $request->smt;
                $data->pelajaran_id = $request->pelajaran;
                $data->jenis = $request->type;
                $data->guru_id = auth()->guard('karyawan')->user()->id;
                $data->save();

                foreach($request->line as $i){
                    $line = new NilaiDetail();
                    $line->siswa_id = $i['siswa_id'];
                    $line->nilai = $i['nilai'];
                    $data->detail()->save($line);
                }

            }catch(\QueryException $e){
                DB::rollback();
                return back();
            }
            DB::commit();
            return redirect()->to('guru/nilais')->with('success', 'Successfully Created Nilai Siswa');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Nilai::where('id', $id)->with('kelas', 'tahun', 'pelajaran')->first();

        $lines = NilaiDetail::where('nilai_id', $data->id)->get();
        return view('guru.nilai.show', [
            'data' => $data,
            'lines' => $lines
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $guru = $request->user();

        $siswas = Siswa::orderBy('id', 'DESC')->get();

        $pelajarans = Pelajaran::with(['penilaian'])->get();
        $ajaran = TahunAjaran::all();
        $data = Nilai::with(['tahun', 'siswa'])->where('id', $id)->first();

        return view('guru.nilai.edit',[
            'siswas' => $siswas,
            'pelajarans' => $pelajarans,
            'ajaran' => $ajaran,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $rules = [
            'siswa_id' => 'required',
            'semester' => 'required',
            'ajaran_id' => 'required',
            'masuk' => 'required',
            'izin' => 'required',
            'sakit' => 'required',
            'alpa' => 'required',
            'lines.*.nilai' => 'required|integer'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return back()->withErrors($validator->errors());
            // dd
        }else{
            DB::beginTransaction();
            try{

                $data = new Nilai();
                $data->siswa_id = $request->siswa_id;
                $data->semester = $request->semester;
                $data->ajaran_id = $request->ajaran_id;
                $data->masuk = $request->masuk;
                $data->izin = $request->izin;
                $data->alpa = $request->alpa;
                $data->sakit = $request->sakit;
                $data->save();

                foreach($request->lines as $i){
                    $line = new NilaiPelajaran();
                    $line = NilaiPelajaran::firstOrNew(['id' =>  $i['id']]);
                    $line->pelajaran_id = $i['pelajaran_id'];
                    $line->nilai = $i['nilai'];
                    $data->detail()->save($line);
                }

            }catch(\QueryException $e){
                DB::rollback();
                return back();
            }
            DB::commit();
            return redirect()->to('guru/nilais')->with('success', 'Successfully Created Nilai Siswa');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function siswa(Request $request)
    {

        $data = Siswa::whereHas('kelas', function($q) use($request) {
            return $q->where('tahun_id', $request->tahun)
            ->where('kelas_id', $request->kelas);
        })->get();

        return response()->json($data, 200);
    }
}
