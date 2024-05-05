<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karyawans;
use App\Models\Kelas;
use App\Models\Pelajaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        // $karyawan = Karyawans::count();
        $kelas = Kelas::count();
        $pelajaran = Pelajaran::count();
        $siswa = Siswa::count();

        return view('admin.dashboard', compact('kelas', 'pelajaran', 'siswa'));
    }
}
