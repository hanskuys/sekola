<?php

namespace App\Http\Controllers\CalonSiswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Mail\SiswaDaftarMail;
class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.casis.pendaftaran.pendaftaran-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nis' => 'nullable',
            'nisn' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'semester' => 'nullable',
        ];

        $pesan = [
            'nama_siswa.required' => 'Nama Siswa Wajib Diisi!',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Diisi!',
            'tempat_lahir.required' => 'Tempat Lahir Wajib Diisi!',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Diisi!',
            'nis.required' => 'NIS Wajib Diisi!',
            'alamat.required' => 'Alamat Wajib Diisi!',
            'no_tlp.required' => 'No HP Wajib Diisi!',
            'password.required' => 'Password Wajib Diisi!',
            'email.required' => 'Email Wajib Diisi!',
        ];

        
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();

            try{

                $data = new Siswa();
                $data->nama_siswa = $request->nama_siswa;
                $data->jenis_kelamin = $request->jenis_kelamin;
                $data->tempat_lahir = $request->tempat_lahir;
                $data->tanggal_lahir = $request->tanggal_lahir;
                $data->nis = $request->nis;
                $data->nisn = $request->nisn;
                $data->alamat = $request->alamat;
                $data->no_tlp = $request->no_tlp;
                $data->email = $request->email;
                $data->password =  Hash::make($request->password);
                $data->save();

                Mail::to($request->email)->send(new SiswaDaftarMail($request->nama_siswa));

            }catch(\QueryException $e){
                DB::rollback();
                dd($e);
            }
            DB::commit();
            return redirect()->to('/')->with('success', 'Berhasil Membuat Akun');
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
