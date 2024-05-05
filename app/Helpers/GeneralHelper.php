<?php
use App\Models\Jadwal;

if (!function_exists('guru_kelas_ids')) {
    function guru_kelas_ids() {
        
        $data = Jadwal::where('guru_id', auth()->guard('karyawan')->user()->id)
        ->get()->pluck('kelas_id');

        return $data;
    }
}

if (!function_exists('guru_pelajaran_ids')) {
    function guru_pelajaran_ids() {
        
      
        $data = Jadwal::where('guru_id', auth()->guard('karyawan')->user()->id)
        ->get()->pluck('pelajaran_id');

        return $data;
    }
}