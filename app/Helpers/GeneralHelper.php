<?php
use App\Models\Jadwal;
use App\Models\KelasBridge;
use App\Models\TahunAjaran;
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

if (!function_exists('get_tahun')) {
    function get_tahun() {
        
      
        $data = TahunAjaran::where('aktif', 1)
        ->first();

        return $data;
    }
}