@extends('dashboard.siswa.base')
@section('content')

<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Lengkap</h3>
</div>

<div class="page-content">
    <div class="section">
        <div class="card">
            <div class="card-body">
                <form action="/siswa/data-lengkap/update/{{ $data->id ?? 'new' }}" method="POST"">
                    @csrf
                    @method($data ? 'put' : 'post')
                    {{-- no_kk&no_akta --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Nomor Kartu Keluarga</label>
                                <input type="text" name="nokk" class="form-control {{ $errors->has('nokk') ? 'is-invalid' : '' }}" value="{{ old('nokk', $data->nokk ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Nomor Akta Kelahiran</label>
                                <input type="text" name="no_akta" class="form-control {{ $errors->has('no_akta') ? 'is-invalid' : '' }}" value="{{ old('no_akta', $data->no_akta ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    {{-- agama&kewarga --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Agama</label>
                                <select class="form-control {{ $errors->has('agama') ? 'is-invalid' : '' }}" name="agama">
                                    <option value="">Pilih</option>
                                    <option value="Islam" {{ old('agama', $data->agama ?? '') == 'Islam' ? 'selected="selected"' : '' }}>Islam</option>
                                    <option value="Kristen Protestan" {{ old('agama', $data->agama ?? '') == 'Kristen Protestan' ? 'selected="selected"' : '' }}>Kristen Protestan</option>
                                    <option value="Kristen Katolik" {{ old('agama', $data->agama ?? '') == 'Kristen Katolik' ? 'selected="selected"' : '' }}>Kristen Katolik</option>
                                    <option value="Hindu" {{ old('agama', $data->agama ?? '') == 'Hindu' ? 'selected="selected"' : '' }}>Hindu</option>
                                    <option value="Budha" {{ old('agama', $data->agama ?? '') == 'Budha' ? 'selected="selected"' : '' }}>Budha</option>
                                    <option value="Konghucu" {{ old('agama', $data->agama ?? '') == 'Konghucu' ? 'selected="selected"' : '' }}>Konghucu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Kewarganegaraan</label>
                                <select class="form-control {{ $errors->has('kewarganegaraan') ? 'is-invalid' : '' }}" name="kewarganegaraan">
                                    <option value="">Pilih</option>
                                    <option value="WNI" {{ old('kewarganegaraan', $data->kewarganegaraan ?? '') == 'WNI' ? 'selected="selected"' : '' }}>WNI</option>
                                    <option value="WNA" {{ old('kewarganegaraan', $data->kewarganegaraan ?? '') == 'WNA' ? 'selected="selected"' : '' }}>WNA</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- kip&prestasi --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">No Kartu Indonesia Pintar (No KIP) 6 Digit</label>
                                <input type="text" name="kip" class="form-control {{ $errors->has('kip') ? 'is-invalid' : '' }}" value="{{ old('kip', $data->kip ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Prestasi</label>
                                <input type="text" name="prestasi" class="form-control {{ $errors->has('prestasi') ? 'is-invalid' : '' }}" value="{{ old('prestasi', $data->prestasi ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    {{-- jumlahsodara&anakke --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Anak Ke</label>
                                <input type="text" name="anak_ke" class="form-control  {{ $errors->has('anak_ke') ? 'is-invalid' : '' }}" value="{{ old('anak_ke', $data->anak_ke ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Jumlah Sodara</label>
                                <input type="text" name="jumlah_sodara" class="form-control  {{ $errors->has('jumlah_sodara') ? 'is-invalid' : '' }}" value="{{ old('jumlah_sodara', $data->jumlah_sodara ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    {{-- tb&bb --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Tinggi Badan</label>
                                <input type="text" name="tb" class="form-control {{ $errors->has('tb') ? 'is-invalid' : '' }}" value="{{ old('tb', $data->tb ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Berat Badan</label>
                                <input type="text" name="bb" class="form-control {{ $errors->has('bb') ? 'is-invalid' : '' }}" value="{{ old('bb', $data->bb ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    {{-- tinggal_bersama&moda_transportasi --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Tinggal Bersama</label>
                                <input type="text" name="tinggal_bersama" class="form-control {{ $errors->has('tinggal_bersama') ? 'is-invalid' : '' }}" value="{{ old('tinggal_bersama', $data->tinggal_bersama ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Moda Transportasi</label>
                                <input type="text" name="moda_transportasi" class="form-control {{ $errors->has('moda_transportasi') ? 'is-invalid' : '' }}" value="{{ old('moda_transportasi', $data->moda_transportasi ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    {{-- lintang&bujur --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Koordinat Lintang</label>
                                <input type="text" name="lintang" class="form-control {{ $errors->has('lintang') ? 'is-invalid' : '' }}" value="{{ old('lintang', $data->lintang ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Koordinat Bujur</label>
                                <input type="text" name="bujur" class="form-control {{ $errors->has('bujur') ? 'is-invalid' : '' }}" value="{{ old('bujur', $data->bujur ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    {{-- jarak&waktu --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Jarak Tempuh</label>
                                <input type="text" name="jarak_rumah" class="form-control {{ $errors->has('jarak_rumah') ? 'is-invalid' : '' }}" value="{{ old('jarak_rumah', $data->jarak_rumah ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Waktu Tempuh</label>
                                <input type="text" name="waktu_tempuh" class="form-control {{ $errors->has('waktu_tempuh') ? 'is-invalid' : '' }}" value="{{ old('waktu_tempuh', $data->waktu_tempuh ?? '') }}" id="basicInput">
                            </div>
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

@endsection