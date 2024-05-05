@extends('dashboard.guru.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Input Nilai</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/guru/nilais/{{ $data->id }}" method="POST">
                    
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="field-siswa">Siswa</label>
                                <select name="siswa_id" class="form-select @error('siswa_id') is-invalid @enderror" id="field-siswa">
                                    <option selected hidden>Pilih Siswa</option>
                                    @foreach ($siswas as $val)
                                        @if (count($val->nilais) == 0)
                                        <option value="{{ $val->id }}" {{ (old('siswa_id', $data->id) == $val->id) ? 'selected="selected"' : '' }}>{{ $val->nama_siswa }} || NIS: {{ $val->nis }} || NISN: {{ $val->nisn }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('siswa_id')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="field-ajaran">Tahun Ajaran</label>
                                <select name="ajaran_id" class="form-select @error('ajaran_id') is-invalid @enderror" id="field-ajaran">
                                    <option selected hidden>Pilih Tahun Ajaran</option>
                                    @foreach ($ajaran as $val) 
                                        <option value="{{ $val->id }}" {{ (old('ajaran_id', $data->ajaran_id) == $val->id) ? 'selected="selected"' : '' }}>{{ $val->nama }}</option>
                                    @endforeach
                                </select>
                                @error('ajaran_id')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="field-semester">Semester</label>
                                <select class="form-control" name="semester">
                                    <option value="Ganjil" {{ (old('semester', $data->semester) == 'Ganjil') ? 'selected="selected"' : '' }}>Ganjil</option>
                                    <option value="Genap" {{ (old('semester', $data->semester) == 'Genap') ? 'selected="selected"' : '' }}>Genap</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Absen</label>
                        <div class="row">
                            <div class="col-6 col-md-3">
                                <input type="number" class="form-control @error('masuk') is-invalid @enderror" name="masuk" id="field-masuk" placeholder="Total Masuk"  value="{{ old('masuk', $data->masuk) }}">
                                @error('masuk')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-6 col-md-3">
                                <input type="number" class="form-control @error('izin') is-invalid @enderror" name="izin" id="field-izin" placeholder="Total Izin"  value="{{ old('izin', $data->izin) }}">
                                @error('izin')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-6 col-md-3">
                                <input type="number" class="form-control @error('sakit') is-invalid @enderror" name="sakit" id="field-sakit" placeholder="Total Sakit" value="{{ old('sakit', $data->sakit) }}">
                                @error('sakit')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-6 col-md-3">
                                <input type="number" class="form-control @error('alpa') is-invalid @enderror" name="alpa" id="field-alpa" placeholder="Total Alpa" value="{{ old('alpa', $data->alpa) }}">
                                @error('alpa')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <table class="table">
                    @foreach ($pelajarans as $key => $v)
                            <tr>
                                <td >{{ $v->pelajaran }}</td>
                                <td width="30%">
                                    <div class="form-group mb-0">
                                        <input type="hidden" name="lines[{{$key}}][id]" value="{{ ($v->penilaian) ? $v->penilaian->id : '' }}">
                                        <input type="hidden" name="lines[{{$key}}][pelajaran_id]" value="{{ ($v->penilaian) ? $v->penilaian->pelajaran_id : $v->id }}">
                                        <input type="number" value="0" name="lines[{{$key}}][nilai]" class="form-control form-control-sm @error('pelajaran.{{$key}}.nilai') is-invalid @enderror" 
                                        id="basicInput" placeholder="Masukan Nilai" value="{{ ($v->penilaian) ? $v->penilaian->pelajaran_id : $v->id }}">
                                        @error('lines.{{$key}}.nilai')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                    @endforeach
                </table>

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