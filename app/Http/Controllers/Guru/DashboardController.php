<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Karyawan_detail;
use App\Models\Wali_kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $guru = $request->user();

        $kelas = Wali_kelas::where('karyawan_id', $guru->id)->with('kelas')->first();
        $kelasCount = Wali_kelas::where('karyawan_id', $guru->id)->count();

        return view('guru.dashboard', compact('kelas', 'kelasCount'));
    }

    public function show(Request $request)
    {
        $guru = $request->user();

        $gurus = Karyawan::find($guru->id);
        $guruDetails = Karyawan_detail::where('karyawan_id', $guru->id)->first();
        return view('dashboard.guru.show', compact('gurus', 'guruDetails'));
    }

    public function edit(string $id)
    {
        $guru = Karyawan::find($id);
        $guruDetail = Karyawan_detail::find($id);

        return view('dashboard.guru.edit', compact('guru', 'guruDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'nuptk' => 'required',
            'nbm' => 'required',
            'tanggal_mulai' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'status' => 'required',
        ]);

        // Update data in the 'karyawan' table
        Karyawan::where('id', $id)->update([
            'nama' => $validate['nama'],
        ]);

        // Check if there is an associated entry in 'karyawan_detail'
        $karyawanDetail = Karyawan_detail::where('karyawan_id', $id)->first();
        // dd($karyawanDetail);
        if ($karyawanDetail) {
            // Update data in the 'karyawan_detail' table
            $karyawanDetail->update([
                'nip' => $validate['nip'],
                'nuptk' => $validate['nuptk'],
                'nbm' => $validate['nbm'],
                'tanggal_mulai' => $validate['tanggal_mulai'],
                'jenis_kelamin' => $validate['jenis_kelamin'],
                'tempat_lahir' => $validate['tempat_lahir'],
                'tanggal_lahir' => $validate['tanggal_lahir'],
                'status' => $validate['status'],
            ]);
        } else {
            // Create a new entry in the 'karyawan_detail' table
            Karyawan_detail::create([
                'karyawan_id' => $id,
                'nip' => $validate['nip'],
                'nuptk' => $validate['nuptk'],
                'nbm' => $validate['nbm'],
                'tanggal_mulai' => $validate['tanggal_mulai'],
                'jenis_kelamin' => $validate['jenis_kelamin'],
                'tempat_lahir' => $validate['tempat_lahir'],
                'tanggal_lahir' => $validate['tanggal_lahir'],
                'status' => $validate['status'],
            ]);
        }
        return redirect()->to('/guru/profile')->with('success', 'Successfully Updated Guru');
    }

    public function akun(Request $request)
    {
        $guru = $request->user();

        $data = Karyawan::where('id', $guru->id)->first();
        $detail = Karyawan_detail::where('karyawan_id', $guru->id)->first();

        return view('dashboard.guru.akun', compact('data','detail'));
    }

    public function updatePass(Request $request, string $id)
    {
        $validate = $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $validate['password'] = Hash::make($validate['password']);

        Karyawan::where('id', $id)->update([
            'password' => $validate['password']
        ]);

        return redirect()->to('/guru/profile')->with('success', 'Successfully Changed Password');
    }
}
