<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Karyawan_pelajaran;
use App\Models\Kelas;
use App\Models\Pelajaran;
use App\Models\Siswa;
use App\Models\Wali_kelas;
use Dotenv\Util\Str;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index(Request $request)
    {
        $guru = $request->user();
        $matpel = Karyawan_pelajaran::where('karyawan_id', $guru->id)->with('pelajaran')->get();
        $kelases = Kelas::all();
        $kelas_id = $request->kelas_id;
        $pelajaran_id = $request->karyawan_pelajaran_id;

        // $siswas = Siswa::whereHas('kelases', function ($query) use ($guru) {
        //     $query->where('karyawan_id', $guru->id);
        // })->with('absen')->get();

        // $kelases = Wali_kelas::where('karyawan_id', $guru->id)->with('kelas')->get();
        // $matpel = Karyawan_pelajaran::where('karyawan_id', $guru->id)->get();
        // $kelas_id = $request->kelas_id;

        // $dataSiswa = Siswa::whereHas('wali_kelas', function ($query) use ($kelas_id) {
        //     $query->where('kelas_id', $kelas_id);
        // })->with('absen')->get();

        return view('dashboard.guru.absens.index', compact('kelases', 'matpel', 'kelas_id', 'pelajaran_id'));
    }

    public function fetchStudentData(Request $request)
    {
        $guru = $request->user();
        $matpel = Karyawan_pelajaran::where('karyawan_id', $guru->id)->with('pelajaran')->get();
        $kelases = Kelas::all();

        $kelas_id = $request->kelas_id;
        $pelajaran_id = $request->karyawan_pelajaran_id;

        $dataSiswa = Siswa::whereHas('wali_kelas', function ($query) use ($kelas_id) {
            $query->where('kelas_id', $kelas_id);
        })->get();

        $dataAbsen = Absen::where('karyawan_pelajaran_id', $pelajaran_id)
            ->with('siswa')
            ->get()
            ->groupBy('siswa_id');

        foreach ($dataAbsen as $val) {
            $siswaId = $val->first()->siswa_id;
            $val->absHadir = Absen::where('siswa_id', $siswaId)
                ->where('status', 'hadir')
                ->count();
        }
        foreach ($dataAbsen as $val) {
            $siswaId = $val->first()->siswa_id;

            $val->absIzin = Absen::where('siswa_id', $siswaId)
                ->where('status', 'izin')
                ->count();
        }
        foreach ($dataAbsen as $val) {
            $siswaId = $val->first()->siswa_id;

            $val->absSakit = Absen::where('siswa_id', $siswaId)
                ->where('status', 'sakit')
                ->count();
        }
        foreach ($dataAbsen as $val) {
            $siswaId = $val->first()->siswa_id;

            $val->absTk = Absen::where('siswa_id', $siswaId)
                ->where('status', 'tanpa keterangan')
                ->count();
        }
        foreach ($dataAbsen as $val) {
            $val->absTotal =  $val->absHadir + $val->absIzin + $val->absSakit + $val->absTk;
        }



        return view('dashboard.guru.absens.index', compact('kelases', 'kelas_id', 'matpel', 'pelajaran_id', 'dataSiswa', 'dataAbsen'));

        // return response()->json(['siswa' => $dataSiswa]);
    }

    // public function createAbsen(Request $request, string $id)
    public function create(Request $request)
    {
        $guru = $request->user();
        $matpel = Karyawan_pelajaran::where('karyawan_id', $guru->id)->with('pelajaran')->get();

        $kelas_id = $request->query('kelas_id');
        $pelajaran_id = $request->query('pelajaran_id');

        $kelas = Kelas::where('id', $kelas_id)->first();
        $pelajaran = Pelajaran::where('id', $pelajaran_id)->first();

        // dd($kelas);

        $dataSiswa = Siswa::whereHas('wali_kelas', function ($query) use ($kelas_id) {
            $query->where('kelas_id', $kelas_id);
        })->with('absen', 'kelases')->get();


        return view('dashboard.guru.absens.create', compact('matpel', 'dataSiswa', 'kelas', 'pelajaran'));
    }

    public function store(Request $request)
    {
        // $siswa = $request->siswa_id;
        // dd($siswa);
        // foreach ($siswa as $siswa_id) {
        //     Absen::create([
        //         'siswa_id' => $siswa_id,
        //         'karyawan_pelajaran_id' => $request->pelajaran_id,
        //         'status' => $request->status,
        //         'tanggal' => $request->tanggal,
        //         'keterangan' => $request->keterangan,
        //     ]);
        // }

        $siswa_ids = $request->siswa_id;
        $statuses = $request->status;
        $keterangans = $request->keterangan;

        foreach ($siswa_ids as $key => $siswa_id) {
            Absen::create([
                'siswa_id' => $siswa_id,
                'karyawan_pelajaran_id' => $request->pelajaran_id,
                'status' => $statuses[$key],
                'tanggal' => $request->tanggal,
                'keterangan' => $keterangans[$key] ?? '-',
            ]);
        }


        return redirect()->to('guru/absens')->with('Successfully Created Absen Siswa');
    }

    public function edit(Request $request, string $id)
    {
        $siswa = Siswa::where('id', $id)->with('absen')->first();

        return view('dashboard.guru.absens.edit', compact('siswa'));
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
