<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\SiswaOrtu;
use App\Models\SiswaDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function index()
    {
        $data = auth()->guard('siswa')->user();
        return view('siswa.profil.index',[
            'data' => $data
        ]);
    }

    
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'nokk' => 'required',
            'no_akta' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'kip' => 'required',
            'prestasi' => 'required',
            'anak_ke' => 'required',
            'jumlah_sodara' => 'required',
            'tb' => 'required',
            'bb' => 'required',
            'tinggal_bersama' => 'required',
            'moda_transportasi' => 'required',
            'lintang' => 'required',
            'bujur' => 'required',
            'jarak_rumah' => 'required',
            'waktu_tempuh' => 'required',
        ];
        
        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }else{

            DB::beginTransaction();
            try{
                $data = new Karyawan();
                $data->nip = $request->nip;
                $data->nuptk = $request->nuptk;
                $data->nbm = $request->nbm;
                $data->nama = $request->nama;
                $data->jk = $request->jk;
                $data->tmp_lahir = $request->tmp_lahir;
                $data->tgl_lahir = $request->tgl_lahir;
                $data->tgl_mulai = $request->tgl_mulai;
                $data->email = $request->email;
                $data->password = Hash::make($request->password);
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'message' => 'Terjadi Kesalahan Server!',
                ], 422);
            }
            DB::commit();
            return redirect()->to('/admin/gurus')->with('success', 'Successfully Updated Guru');

        }
    }

    public function detail()
    {

        return view('siswa.profil.detail');
    }

    public function detailStore(Request $request)
    {
        $rules = [
            'nokk' => 'required',
            'no_akta' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'kip' => 'required',
            'prestasi' => 'required',
            'anak_ke' => 'required',
            'jumlah_sodara' => 'required',
            'tb' => 'required',
            'bb' => 'required',
            'tinggal_bersama' => 'required',
            'moda_transportasi' => 'required',
            'lintang' => 'required',
            'bujur' => 'required',
            'jarak_rumah' => 'required',
            'waktu_tempuh' => 'required',
        ];
        
        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }else{

            DB::beginTransaction();
            try{
                $data = new Karyawan();
                $data->nip = $request->nip;
                $data->nuptk = $request->nuptk;
                $data->nbm = $request->nbm;
                $data->nama = $request->nama;
                $data->jk = $request->jk;
                $data->tmp_lahir = $request->tmp_lahir;
                $data->tgl_lahir = $request->tgl_lahir;
                $data->tgl_mulai = $request->tgl_mulai;
                $data->email = $request->email;
                $data->password = Hash::make($request->password);
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'message' => 'Terjadi Kesalahan Server!',
                ], 422);
            }
            DB::commit();
            return redirect()->to('/admin/gurus')->with('success', 'Successfully Updated Guru');

        }
    }

    public function ortu(Request $request)
    {
        $siswa = $request->user();

        $data = SiswaOrtu::where('siswa_id', $siswa->id)->first();

        return view('siswa.profil.ortu', compact('data'));
    }

    public function update_ortu(Request $request, string $id)
    {
        $siswa = $request->user();
        $validate = $request->validate([
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'nama_wali' => 'nullable',
            'nik_ayah' => 'required',
            'nik_ibu' => 'required',
            'nik_wali' => 'nullable',
            'lahir_ayah' => 'required',
            'lahir_ibu' => 'required',
            'lahir_wali' => 'nullable',
            'pendidikan_ayah' => 'required',
            'pendidikan_ibu' => 'required',
            'pendidikan_wali' => 'nullable',
            'pekerjaan_ayah' => 'required',
            'pekerjaan_ibu' => 'required',
            'pekerjaan_wali' => 'nullable',
            'penghasilan_ayah' => 'required',
            'penghasilan_ibu' => 'required',
            'penghasilan_wali' => 'nullable',
            'no_telp_ayah' => 'required',
            'no_telp_ibu' => 'required',
            'no_telp_wali' => 'nullable',
        ]);

        if ($id == 'new') {
            // Ini operasi insert (baru)
            DataOrtuSiswa::create([
                'siswa_id' => $siswa->id,
                'nama_ayah' => $validate['nama_ayah'],
                'nama_ibu' => $validate['nama_ibu'],
                'nama_wali' => $validate['nama_wali'],
                'nik_ayah' => $validate['nik_ayah'],
                'nik_ibu' => $validate['nik_ibu'],
                'nik_wali' => $validate['nik_wali'],
                'lahir_ayah' => $validate['lahir_ayah'],
                'lahir_ibu' => $validate['lahir_ibu'],
                'lahir_wali' => $validate['lahir_wali'],
                'pendidikan_ayah' => $validate['pendidikan_ayah'],
                'pendidikan_ibu' => $validate['pendidikan_ibu'],
                'pendidikan_wali' => $validate['pendidikan_wali'],
                'pekerjaan_ayah' => $validate['pekerjaan_ayah'],
                'pekerjaan_ibu' => $validate['pekerjaan_ibu'],
                'pekerjaan_wali' => $validate['pekerjaan_wali'],
                'penghasilan_ayah' => $validate['penghasilan_ayah'],
                'penghasilan_ibu' => $validate['penghasilan_ibu'],
                'penghasilan_wali' => $validate['penghasilan_wali'],
                'no_telp_ayah' => $validate['no_telp_ayah'],
                'no_telp_ibu' => $validate['no_telp_ibu'],
                'no_telp_wali' => $validate['no_telp_wali']
            ]);
        } else {
            // Ini operasi update
            DataOrtuSiswa::where('id', $id)->update([
                'siswa_id' => $siswa->id,
                'nama_ayah' => $validate['nama_ayah'],
                'nama_ibu' => $validate['nama_ibu'],
                'nama_wali' => $validate['nama_wali'],
                'nik_ayah' => $validate['nik_ayah'],
                'nik_ibu' => $validate['nik_ibu'],
                'nik_wali' => $validate['nik_wali'],
                'lahir_ayah' => $validate['lahir_ayah'],
                'lahir_ibu' => $validate['lahir_ibu'],
                'lahir_wali' => $validate['lahir_wali'],
                'pendidikan_ayah' => $validate['pendidikan_ayah'],
                'pendidikan_ibu' => $validate['pendidikan_ibu'],
                'pendidikan_wali' => $validate['pendidikan_wali'],
                'pekerjaan_ayah' => $validate['pekerjaan_ayah'],
                'pekerjaan_ibu' => $validate['pekerjaan_ibu'],
                'pekerjaan_wali' => $validate['pekerjaan_wali'],
                'penghasilan_ayah' => $validate['penghasilan_ayah'],
                'penghasilan_ibu' => $validate['penghasilan_ibu'],
                'penghasilan_wali' => $validate['penghasilan_wali'],
                'no_telp_ayah' => $validate['no_telp_ayah'],
                'no_telp_ibu' => $validate['no_telp_ibu'],
                'no_telp_wali' => $validate['no_telp_wali']
            ]);
        }
        return redirect()->to('/siswa/data-ortu')->with('success', 'Successfully Add Data');
    }

    public function tambahan(Request $request)
    {
        $siswa = $request->user();

        $data = DataTambahanSiswa::where('siswa_id', $siswa->id)->first();

        return view('dashboard.siswa.data-tambahan', compact('data'));
    }

    public function update_tambahan(Request $request, string $id)
    {
        // dd($request);
        $siswa = $request->user();
        $validate = $request->validate([
            'asal_sekolah' => 'required',
            'nis' => 'required',
            'nomor_peserta' => 'required',
            'nomor_ijasah' => 'required',
            'hobi' => 'required',
            'cita_cita' => 'required',
            'doc_ijasah' => 'nullable|image|mimes:jpeg,png,jpg',
            'doc_akte' => 'nullable|image|mimes:jpeg,png,jpg',
            'doc_kk' => 'nullable|image|mimes:jpeg,png,jpg',
            'doc_ktp' => 'nullable|image|mimes:jpeg,png,jpg',
            'doc_kip' => 'nullable|image|mimes:jpeg,png,jpg'
        ]);
        // dd($validate);
        
        // Inisialisasi data
        $data = [
            'siswa_id' => $siswa->id,
            'asal_sekolah' => $validate['asal_sekolah'],
            'nis' => $validate['nis'],
            'nomor_peserta' => $validate['nomor_peserta'],
            'nomor_ijasah' => $validate['nomor_ijasah'],
            'hobi' => $validate['hobi'],
            'cita_cita' => $validate['cita_cita'],
        ];

        // Operasi insert atau update
        if ($id == 'new') {
            $this->uploadAndSaveImage($request, 'doc_ijasah', $data);
            $this->uploadAndSaveImage($request, 'doc_akte', $data);
            $this->uploadAndSaveImage($request, 'doc_kk', $data);
            $this->uploadAndSaveImage($request, 'doc_ktp', $data);
            $this->uploadAndSaveImage($request, 'doc_kip', $data);

            // Ini operasi insert (baru)
            DataTambahanSiswa::create($data);
        } else {
            $this->uploadAndSaveImage($request, 'doc_ijasah', $data);
            $this->uploadAndSaveImage($request, 'doc_akte', $data);
            $this->uploadAndSaveImage($request, 'doc_kk', $data);
            $this->uploadAndSaveImage($request, 'doc_ktp', $data);
            $this->uploadAndSaveImage($request, 'doc_kip', $data);

            // Ini operasi update
            DataTambahanSiswa::where('id', $id)->update($data);
        }

        // if ($id == 'new') {
        //     // dd($id);
        //     // Ini operasi insert (baru)
        //     DataTambahanSiswa::create([
        //         'siswa_id' => $siswa->id,
        //         'asal_sekolah' => $validate['asal_sekolah'],
        //         'nis' => $validate['nis'],
        //         'nomor_peserta' => $validate['nomor_peserta'],
        //         'nomor_ijasah' => $validate['nomor_ijasah'],
        //         'hobi' => $validate['hobi'],
        //         'cita_cita' => $validate['cita_cita'],

        //         // 'doc_ijasah' => $validate['doc_ijasah'],
        //         'doc_akte' => $validate['doc_akte'],
        //         // 'doc_kk' => $validate['doc_kk'],
        //         // 'doc_ktp' => $validate['doc_ktp'],
        //         // 'doc_kip' => $validate['doc_kip'],
        //     ]);
        // } else {
        //     // Ini operasi update
        //     DataTambahanSiswa::where('id', $id)->update([
        //         'siswa_id' => $siswa->id,
        //         'asal_sekolah' => $validate['asal_sekolah'],
        //         'nis' => $validate['nis'],
        //         'nomor_peserta' => $validate['nomor_peserta'],
        //         'nomor_ijasah' => $validate['nomor_ijasah'],
        //         'hobi' => $validate['hobi'],
        //         'cita_cita' => $validate['cita_cita'],
        //         // 'doc_ijasah' => $validate['doc_ijasah'],
        //         'doc_akte' => $validate['doc_akte'],
        //         // 'doc_kk' => $validate['doc_kk'],
        //         // 'doc_ktp' => $validate['doc_ktp'],
        //         // 'doc_kip' => $validate['doc_kip'],
        //     ]);
        // }

        return redirect()->to('/siswa/data-tambahan')->with('success', 'Successfully Add Data');
    }

    protected function uploadAndSaveImage($request, $fieldName, &$data)
    {
        if ($request->hasFile($fieldName)) {
            // Hapus gambar lama jika ada
            if (isset($data[$fieldName])) {
                Storage::delete('public/images/dokumenPendaftaran/' . $data[$fieldName]);
            }

            // Simpan gambar baru
            $image = $request->file($fieldName);
            $imageName = time() . '_' . $image->getClientOriginalName();
            Storage::putFileAs('public/images/dokumenPendaftaran/', $image, $imageName);

            // Simpan nama gambar ke dalam data
            $data[$fieldName] = $imageName;
        }
    }

    public function lengkap(Request $request){
        $siswa = $request->user();

        $data = DataLengkapSiswa::where('siswa_id', $siswa->id)->first();

        return view('dashboard.siswa.data-lengkap', compact('data'));
    }

    public function update_lengkap(Request $request, string $id)
    {
        // dd($request->all());
        $siswa = $request->user();
        $rules = [
            'nokk' => 'required',
            'no_akta' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'kip' => 'required',
            'prestasi' => 'required',
            'anak_ke' => 'required',
            'jumlah_sodara' => 'required',
            'tb' => 'required',
            'bb' => 'required',
            'tinggal_bersama' => 'required',
            'moda_transportasi' => 'required',
            'lintang' => 'required',
            'bujur' => 'required',
            'jarak_rumah' => 'required',
            'waktu_tempuh' => 'required',
        ];

        $pesan = [
            'nokk.required' => 'NO KK Wajib Diisi!',
            'nokk.unique' => 'NO KK Sudah Terdaftar!',
            'no_akta.required' => 'No Akta Wajib Diisi!',
            'agama.required' => 'Agama Wajib Diisi!',
            'kewarganegaraan.required' => 'Kewarganegaraan Wajib Diisi!',
            'kip.required' => 'KIP Wajib Diisi!',
            'prestasi.required' => 'Alamat Wajib Diisi!',
            'anak_ke.required' => 'No HP Wajib Diisi!',
            'jumlah_sodara.required' => 'Password Wajib Diisi!',
            'tb.required' => 'Tinggi Badan Wajib Diisi!',
            'bb.required' => 'Berat Badan Wajib Diisi!',
            'tinggal_bersama.required' => 'Tinggal Bersama Wajib Diisi!',
            'moda_transportasi.required' => 'Moda Transportasi Wajib Diisi!',
            'lintang.required' => 'Garis Lintang Wajib Diisi!',
            'bujur.required' => 'Garis Bujur Wajib Diisi!',
            'jarak_rumah.required' => 'Jarak Tempuh Wajib Diisi!',
            'waktu_tempuh.required' => 'Waktu Tempuh Wajib Diisi!',
        ];
        
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            // dd($validator->errors());
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();

            try{

                if($id == 'new'){
                    $data = new DataLengkapSiswa();
                }else{
                    $data = DataLengkapSiswa::where('id', $id)->first();
                }
                $data->siswa_id = $siswa->id;
                $data->nokk = $request->nokk;
                $data->no_akta = $request->no_akta;
                $data->agama = $request->agama;
                $data->kewarganegaraan = $request->kewarganegaraan;
                $data->kip = $request->kip;
                $data->prestasi = $request->prestasi;
                $data->anak_ke = $request->anak_ke;
                $data->jumlah_sodara = $request->jumlah_sodara;
                $data->tb = $request->tb;
                $data->bb = $request->bb;
                $data->tinggal_bersama = $request->tinggal_bersama;
                $data->moda_transportasi = $request->moda_transportasi;
                $data->lintang = $request->lintang;
                $data->bujur = $request->bujur;
                $data->jarak_rumah = $request->jarak_rumah;
                $data->waktu_tempuh = $request->waktu_tempuh;
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                dd($e);
            }
            DB::commit();
            return redirect()->to('/siswa/data-lengkap')->with('success', 'Successfully Add Data');
        }


    }
}
