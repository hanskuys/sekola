@extends('dashboard.siswa.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Diri</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/siswa/data-ortu/update/{{ $data->id ?? 'new' }}" method="POST">
                    @csrf
                    @method($data ? 'put' : 'post')
                    
                    {{-- Nama --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Nama Ayah</label>
                                <input type="text" name="nama_ayah" class="form-control" value="{{ old('nama_ayah', $data->nama_ayah ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Nama Ibu</label>
                                <input type="text" name="nama_ibu" class="form-control" value="{{ old('nama_ibu', $data->nama_ibu ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Nama Wali</label>
                                <input type="text" name="nama_wali" class="form-control" value="{{ old('nama_wali', $data->nama_wali ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    {{-- Nik --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">NIK Ayah</label>
                                <input type="text" name="nik_ayah" class="form-control" value="{{ old('nik_ayah', $data->nik_ayah ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">NIK Ibu</label>
                                <input type="text" name="nik_ibu" class="form-control" value="{{ old('nik_ibu', $data->nik_ibu ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">NIK Wali</label>
                                <input type="text" name="nik_wali" class="form-control" value="{{ old('nik_wali', $data->nik_wali ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    {{-- Lahir --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Lahir Ayah</label>
                                <input type="date" name="lahir_ayah" class="form-control" value="{{ old('lahir_ayah', $data->lahir_ayah ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Lahir Ibu</label>
                                <input type="date" name="lahir_ibu" class="form-control" value="{{ old('lahir_ibu', $data->lahir_ibu ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Lahir Wali</label>
                                <input type="date" name="lahir_wali" class="form-control" value="{{ old('lahir_wali', $data->lahir_wali ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>
                    
                    {{-- Pendidikan --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Pendidikan Ayah</label>
                                <input type="text" name="pendidikan_ayah" class="form-control" value="{{ old('pendidikan_ayah', $data->pendidikan_ayah ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Pendidikan Ibu</label>
                                <input type="text" name="pendidikan_ibu" class="form-control" value="{{ old('pendidikan_ibu', $data->pendidikan_ibu ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Pendidikan Wali</label>
                                <input type="text" name="pendidikan_wali" class="form-control" value="{{ old('pendidikan_wali', $data->pendidikan_wali ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>
                    
                    {{-- pekerjaan --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Pekerjaan Ayah</label>
                                <input type="text" name="pekerjaan_ayah" class="form-control" value="{{ old('pekerjaan_ayah', $data->pekerjaan_ayah ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Pekerjaan Ibu</label>
                                <input type="text" name="pekerjaan_ibu" class="form-control" value="{{ old('pekerjaan_ibu', $data->pekerjaan_ibu ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Pekerjaan Wali</label>
                                <input type="text" name="pekerjaan_wali" class="form-control" value="{{ old('pekerjaan_wali', $data->pekerjaan_wali ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>
                    
                    {{-- penghasilan --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Penghasilan Ayah</label>
                                <input type="text" name="penghasilan_ayah" class="form-control" value="{{ old('penghasilan_ayah', $data->penghasilan_ayah ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Penghasilan Ibu</label>
                                <input type="text" name="penghasilan_ibu" class="form-control" value="{{ old('penghasilan_ibu', $data->penghasilan_ibu ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Penghasilan Wali</label>
                                <input type="text" name="penghasilan_wali" class="form-control" value="{{ old('penghasilan_wali', $data->penghasilan_wali ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>
                    
                    {{-- no_telp --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">No Telp Ayah</label>
                                <input type="text" name="no_telp_ayah" class="form-control" value="{{ old('no_telp_ayah', $data->no_telp_ayah ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">No Telp Ibu</label>
                                <input type="text" name="no_telp_ibu" class="form-control" value="{{ old('no_telp_ibu', $data->no_telp_ibu ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">No Telp Wali</label>
                                <input type="text" name="no_telp_wali" class="form-control" value="{{ old('no_telp_wali', $data->no_telp_wali ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset("assets/extensions/choices.js/public/assets/styles/choices.css")}}">
@endpush

@push('scripts')
<script src="{{ asset("assets/extensions/choices.js/public/assets/scripts/choices.js") }}"></script>
<script src="{{ asset("assets/js/pages/form-element-select.js") }}"></script>
@endpush