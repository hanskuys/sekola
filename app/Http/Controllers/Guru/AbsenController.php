<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\AbsenDetail;
use App\Models\TahunAjaran;
use App\Models\Kelas;
use App\Models\Pelajaran;
use App\Models\Siswa;

use Dotenv\Util\Str;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AbsenController extends Controller
{
    public function index(Request $request)
    {
        // dd($data);

        if ($request->ajax()) {
            
            $data = Absen::with(['kelas', 'tahun'])
            ->withCount(['detail as hadir' => function($query) {
                $query->where('status', 'Hadir');
            },'detail as izin' => function($query) {
                $query->where('status', 'Izin');
            }, 'detail as sakit' => function($query) {
                $query->where('status', 'Sakit');
            }, 'detail as alpa' => function($query) {
                $query->where('status', 'Alpa');
            }])
            ->orderBy('id', 'DESC')->get();
            
            
            return DataTables::of($data)
            ->addColumn('action', function($row){
                $btn = '<a class="btn btn-primary btn-sm" href='. route('guru.absen.show', ['id' => $row->id]) .'><i class="fa fa-list"></i> Detail</a>';
                return $btn; 
            })
            ->addColumn('tgl', function($row){
                $val = Carbon::parse($row->tgl)->translatedFormat('d F Y');
                return $val; 
            })
            ->rawColumns(['action', 'tgl']) 
            ->make(true);
        }

        return view('guru.absen.index',[

        ]);
    }
    // public function createAbsen(Request $request, string $id)
    public function create(Request $request)
    {
        $guru = auth()->guard('karyawan')->user();
        $siswa = Siswa::whereHas('kelas', function($q) use($guru){
            return $q->where('kelas_id', $guru->kelas->id);
        })
        ->orderBy('nama')->get();

        $tahun = TahunAjaran::select('id as value', 'nama as label')
        ->orderBy('nama')->get()->toArray();

        return view('guru.absen.create',[
            'tahun' => $tahun,
            'siswa' => $siswa,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'tahun' => 'required',
            'smt' => 'required',
            'tgl' => 'required',
            'line.*.status' => 'required',
        ];

        // Define custom error messages
        $messages = [
            'tahun.required' => 'Tahun ajaran harus diisi',
            'smt.required' => 'Semester harus diisi',
            'type.required' => 'Jenis nilai harus diisi',
            'pelajaran.required' => 'Mata pelajaran harus diisi',
            'line.*.status.required' => 'Status wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();
            try{

                $guru = auth()->guard('karyawan')->user();
                $data = new Absen();
                $data->tahun_id = $request->tahun;
                $data->kelas_id = $guru->kelas->id;
                $data->semester = $request->smt;
                $data->guru_id = $guru->id;
                $data->tgl = $request->tgl;
                $data->save();

                foreach($request->lines as $i){
                    $line = new AbsenDetail();
                    $line->siswa_id = $i['siswa_id'];
                    $line->status = $i['status'];
                    $data->detail()->save($line);
                }

            }catch(\QueryException $e){
                DB::rollback();
                return back();
            }
            DB::commit();
            return redirect()->route('guru.absen.index')->with('success', 'Successfully Created Nilai Siswa');
        }

    }

    public function show($id)
    {
        $data = Absen::with(['kelas', 'tahun'])->where('id', $id)->first();
        $lines = AbsenDetail::with('siswa')
        ->where('absen_id', $data->id)->get();

        return view('guru.absen.show', [
            'data' => $data,
            'lines' => $lines
        ]);
    }

    public function edit(Request $request, string $id)
    {
        $siswa = Siswa::where('id', $id)->with('absen')->first();

        return view('guru.absen.edit', compact('siswa'));
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'siswa_id' => 'required',
            'karyawan_pelajaran_id' => 'required',
            'status' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'nullable',
        ]);

        Absen::where('siswa_id', $id)->update($validate);

        return redirect()->to('guru/absens')->with('Successfully Updated Absen Siswa');
    }
}
