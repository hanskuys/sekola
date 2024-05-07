<x-base-layout>
    @push('styles')
    @endpush

    <div class="page-heading email-application">
        <div class="page-title">
            <h3>Data Orang Tua / Wali</h3>
        </div>
    </div>
    <div class="page-content">
        <div class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('siswa.profil.ortu')}}" method="POST">
                        @csrf
                        <h3 class="fs-5 mb-2 fw-bold">Data Ayah</h3>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <x-input-field type="text" name="nik_ayah" id="nik_ayah" label="NIK" value="{{ old('nik_ayah', $data->nik_ayah ?? '') }}" error="{{ $errors->first('nik_ayah') }}" />
                            </div>
                            <div class="col-md-4">
                                <x-input-field type="text" name="nama_ayah" id="nama_ayah" label="Nama" value="{{ old('nama_ayah', $data->nama_ayah ?? '') }}" error="{{ $errors->first('nama_ayah') }}" />
                            </div>
                            <div class="col-md-4">
                                <x-input-field type="text" name="lahir_ayah" id="lahir_ayah"  inputClass="tgl" label="Tanggal Lahir" value="{{ old('lahir_ayah', $data->lahir_ayah ?? '') }}" error="{{ $errors->first('lahir_ayah') }}" />
                            </div>
                            <div class="col-md-4">
                                <x-input-field type="text" name="pendidikan_ayah" id="pendidikan_ayah" label="Pendidikan" value="{{ old('pendidikan_ayah', $data->pendidikan_ayah ?? '') }}" error="{{ $errors->first('pendidikan_ayah') }}" />
                            </div>
                            <div class="col-md-4">
                                <x-input-field type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" label="Pekerjaan" value="{{ old('pekerjaan_ayah', $data->pekerjaan_ayah ?? '') }}" error="{{ $errors->first('pekerjaan_ayah') }}" />
                            </div>
                            <div class="col-md-4">
                                <x-input-field type="text" name="penghasilan_ayah" id="penghasilan_ayah"  label="Penghasilan" value="{{ old('penghasilan_ayah', $data->penghasilan_ayah ?? '') }}" error="{{ $errors->first('penghasilan_ayah') }}" />
                            </div>
                            <div class="col-md-4">
                                <x-input-field type="text" name="no_telp_ayah" id="no_telp_ayah"  label="No Telepon/HP" value="{{ old('no_telp_ayah', $data->no_telp_ayah ?? '') }}" error="{{ $errors->first('no_telp_ayah') }}" />
                            </div>
                        </div>
                        <h3 class="fs-5 mb-2 fw-bold">Data Ibu</h3>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <x-input-field type="text" name="nik_ibu" id="nik_ibu" label="NIK" value="{{ old('nik_ibu', $data->nik_ibu ?? '') }}" error="{{ $errors->first('nik_ibu') }}" />
                            </div>
                            <div class="col-md-4">
                                <x-input-field type="text" name="nama_ibu" id="nama_ibu" label="Nama" value="{{ old('nama_ibu', $data->nama_ibu ?? '') }}" error="{{ $errors->first('nama_ibu') }}" />
                            </div>
                            <div class="col-md-4">
                                <x-input-field type="text" name="lahir_ibu" id="lahir_ibu"  inputClass="tgl" label="Tanggal Lahir" value="{{ old('lahir_ibu', $data->lahir_ibu ?? '') }}" error="{{ $errors->first('lahir_ibu') }}" />
                            </div>
                            <div class="col-md-4">
                                <x-input-field type="text" name="pendidikan_ibu" id="pendidikan_ibu" label="Pendidikan" value="{{ old('pendidikan_ibu', $data->pendidikan_ibu ?? '') }}" error="{{ $errors->first('pendidikan_ibu') }}" />
                            </div>
                            <div class="col-md-4">
                                <x-input-field type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" label="Pekerjaan" value="{{ old('pekerjaan_ibu', $data->pekerjaan_ibu ?? '') }}" error="{{ $errors->first('pekerjaan_ibu') }}" />
                            </div>
                            <div class="col-md-4">
                                <x-input-field type="text" name="penghasilan_ibu" id="penghasilan_ibu"  label="Penghasilan" value="{{ old('penghasilan_ibu', $data->penghasilan_ibu ?? '') }}" error="{{ $errors->first('penghasilan_ibu') }}" />
                            </div>
                            <div class="col-md-4">
                                <x-input-field type="text" name="no_telp_ibu" id="no_telp_ibu"  label="No Telepon/HP" value="{{ old('no_telp_ibu', $data->no_telp_ibu ?? '') }}" error="{{ $errors->first('no_telp_ibu') }}" />
                            </div>
                        </div>
                        <h3 class="fs-5 mb-2 fw-bold">Data Wali (Opsional)</h3>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4">
                                <x-input-field type="text" name="nik_wali" id="nik_wali" label="NIK" value="{{ old('nik_wali', $data->nik_wali ?? '') }}" error="{{ $errors->first('nik_wali') }}" />
                            </div>
                            <div class="col-md-4">
                                <x-input-field type="text" name="nama_wali" id="nama_wali" label="Nama" value="{{ old('nama_wali', $data->nama_wali ?? '') }}" error="{{ $errors->first('nama_wali') }}" />
                            </div>
                            <div class="col-md-4">
                                <x-input-field type="text" name="lahir_wali" id="lahir_wali"  inputClass="tgl" label="Tanggal Lahir" value="{{ old('lahir_wali', $data->lahir_wali ?? '') }}" error="{{ $errors->first('lahir_wali') }}" />
                            </div>
                            <div class="col-md-4">
                                <x-input-field type="text" name="pendidikan_wali" id="pendidikan_wali" label="Pendidikan" value="{{ old('pendidikan_wali', $data->pendidikan_wali ?? '') }}" error="{{ $errors->first('pendidikan_wali') }}" />
                            </div>
                            <div class="col-md-4">
                                <x-input-field type="text" name="pekerjaan_wali" id="pekerjaan_wali" label="Pekerjaan" value="{{ old('pekerjaan_wali', $data->pekerjaan_wali ?? '') }}" error="{{ $errors->first('pekerjaan_wali') }}" />
                            </div>
                            <div class="col-md-4">
                                <x-input-field type="text" name="penghasilan_wali" id="penghasilan_wali"  label="Penghasilan" value="{{ old('penghasilan_wali', $data->penghasilan_wali ?? '') }}" error="{{ $errors->first('penghasilan_wali') }}" />
                            </div>
                            <div class="col-md-4">
                                <x-input-field type="text" name="no_telp_wali" id="no_telp_wali"  label="No Telepon/HP" value="{{ old('no_telp_wali', $data->no_telp_wali ?? '') }}" error="{{ $errors->first('no_telp_wali') }}" />
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>