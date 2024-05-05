<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Karyawan extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'password'
    ];

    public function jabatans()
    {
        return $this->belongsToMany(Jabatan::class, 'karyawan_tugas', 'karyawan_id', 'jabatan_id');
    }

    public function pelajaran()
    {
        return $this->belongsToMany(Pelajaran::class, 'pelajaran_guru', 'guru_id', 'pelajaran_id');
    }

    public function karyawan_tugas()
    {
        return $this->hasOne(Karyawan_tugas::class);
    }

    // public function kelases(): HasMany
    // {
    //     return $this->hasMany(Kelas_bridge::class, 'siswa_id');
    // }

}
