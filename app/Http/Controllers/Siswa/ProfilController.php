<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\SiswaOrtu;
use App\Models\SiswaDetail;
use App\Models\SiswaDapodik;
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
                $data = SiswaDetail::updateOrCreate(
                    ['siswa_id' =>  $user->id]
                );
                $nokk = $request->nokk;
                $no_akta = $request->no_akta;
                $agama = $request->agama;
                $kewarganegaraan = $request->kewarganegaraan;
                $kip = $request->kip;
                $prestasi = $request->prestasi;
                $anak_ke = $request->anak_ke;
                $jumlah_sodara = $request->jumlah_sodara;
                $tb = $request->tb;
                $bb = $request->bb;
                $tinggal_bersama = $request->tinggal_bersama;
                $moda_transportasi = $request->moda_transportasi;
                $lintang = $request->lintang;
                $bujur = $request->bujur;
                $jarak_rumah = $request->jarak_rumah;
                $waktu_tempuh = $request->waktu_tempuh;
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'message' => 'Terjadi Kesalahan Server!',
                ], 422);
            }
            DB::commit();
            return redirect()->route('siswa.profil.detail')->with('success', 'Successfully Updated Guru');

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
        $user = auth()->guard('siswa')->user();
        $data = SiswaOrtu::where('siswa_id', $user->id)->first();

        return view('siswa.profil.ortu', compact('data'));
    }

    public function ortuStore(Request $request)
    {
        $rules = [
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
        ];
        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }else{
            

            $user = auth()->guard('siswa')->user();
            DB::beginTransaction();
            try{
                $data = SiswaOrtu::updateOrCreate(
                    ['siswa_id' =>  $user->id]
                );
                $data->nama_ayah = $request->nama_ayah;
                $data->nama_ibu = $request->nama_ibu;
                $data->nama_wali = $request->nama_wali;
                $data->nik_ayah = $request->nik_ayah;
                $data->nik_ibu = $request->nik_ibu;
                $data->nik_wali = $request->nik_wali;
                $data->lahir_ayah = $request->lahir_ayah;
                $data->lahir_ibu = $request->lahir_ibu;
                $data->lahir_wali = $request->lahir_wali;
                $data->pendidikan_ayah = $request->pendidikan_ayah;
                $data->pendidikan_ibu = $request->pendidikan_ibu;
                $data->pendidikan_wali = $request->pendidikan_wali;
                $data->pekerjaan_ayah = $request->pekerjaan_ayah;
                $data->pekerjaan_ibu = $request->pekerjaan_ibu;
                $data->pekerjaan_wali = $request->pekerjaan_wali;
                $data->penghasilan_ayah = $request->penghasilan_ayah;
                $data->penghasilan_ibu = $request->penghasilan_ibu;
                $data->penghasilan_wali = $request->penghasilan_wali;
                $data->no_telp_ayah = $request->no_telp_ayah;
                $data->no_telp_ibu = $request->no_telp_ibu;
                $data->no_telp_wali = $request->no_telp_wali;
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'message' => 'Terjadi Kesalahan Server!',
                ], 422);
            }
            DB::commit();
            return redirect()->route('siswa.profil.ortu')->with('success', 'Successfully Add Data');
        }
    }

    public function dapodik(Request $request)
    {
        $siswa = $request->user();

        $data = SiswaDapodik::where('siswa_id', $siswa->id)->first();

        return view('siswa.profil.dapodik', compact('data'));
    }

    public function dapodikStore(Request $request)
    {
        // dd($request->all());
        $rules = [
            'asal_sekolah' => 'required',
            'nis' => 'required',
            'nomor_peserta' => 'required',
            'nomor_ijasah' => 'required',
            'hobi' => 'required',
            'cita_cita' => 'required',
            'doc_ijazah' => 'mimes:pdf,jpg,jpeg,png',
            'doc_akte' => 'mimes:pdf,jpg,jpeg,png',
            'doc_kk' => 'mimes:pdf,jpg,jpeg,png',
            'doc_ktp' => 'mimes:pdf,jpg,jpeg,png',
            'doc_kip' => 'mimes:pdf,jpg,jpeg,png'
        ];
        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'mimes' => 'Format file yang diterima hanya pdf,jpg,jpeg,png.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }else{
            

            $user = auth()->guard('siswa')->user();
            DB::beginTransaction();
            try{
                $data = SiswaDapodik::updateOrCreate(
                    ['siswa_id' =>  $user->id]
                );
                
                $data->asal_sekolah = $request->asal_sekolah;
                $data->nis = $request->nis;
                $data->nomor_peserta = $request->nomor_peserta;
                $data->nomor_ijasah = $request->nomor_ijasah;
                $data->hobi = $request->hobi;
                $data->cita_cita = $request->cita_cita;
                if($request->hasFile('doc_ijazah')){
                    $data->doc_ijazah = $this->uploadFile($request->file('doc_ijazah'), $data);
                }
                if($request->hasFile('doc_akte')){
                    $data->doc_akte = $this->uploadFile($request->file('doc_akte'), $data);
                }
                if($request->hasFile('doc_kk')){
                    $data->doc_kk = $this->uploadFile($request->file('doc_kk'), $data);
                }
                if($request->hasFile('doc_ktp')){
                    $data->doc_ktp = $this->uploadFile($request->file('doc_ktp'), $data);
                }
                if($request->hasFile('doc_kip')){
                    $data->doc_kip = $this->uploadFile($request->file('doc_kip'), $data);
                }
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                dd($e);
            }
            DB::commit();
            return redirect()->route('siswa.profil.dapodik')->with('success', 'Successfully Add Data');
        }
    }

    protected function uploadFile($file, $data)
    {
        $user = auth()->guard('siswa')->user();
        $path = 'dokumen/'. $user->id.'/';
        if ($file) {
            // Hapus gambar lama jika ada
            if (isset($data->doc_ijazah)) {
                Storage::delete($path . $data->doc_ijazah);
            }

            // $image = file;
            $imageName = time() . '_' . $file->getClientOriginalName();
            Storage::disk('public')->putFileAs($path, $file, $imageName);

            // Simpan nama gambar ke dalam data
            return '/uploads/'.$path.$imageName;
        }
    }
}
