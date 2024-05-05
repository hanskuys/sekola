@extends('dashboard.guru.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Input Nilai</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/guru/absens/{{ $siswa->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <fieldset class="form-group">
                        <label for="basicSelect">Daftar Siswa</label>
                        <select name="siswa_id" @readonly(true) aria-readonly="true" class="form-select @error('siswa_id') is-invalid @enderror" id="basicSelect">
                            <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }} || NIS: {{ $siswa->nis }} || NISN: {{ $siswa->nisn }}</option>
                        </select>
                        @error('siswa_id')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </fieldset>

                    <div class="form-group">
                        <label for="basicInput">Total Masuk</label>
                        <input type="number" value="{{ $siswa->absen->total_masuk }}" name="total_masuk" class="form-control @error('total_masuk') is-invalid @enderror" id="basicInput" placeholder="Masukan Nilai Pelajaran">
                        @error('total_masuk')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Total Izin</label>
                        <input type="number" value="{{ $siswa->absen->total_izin }}" name="total_izin" class="form-control @error('total_izin') is-invalid @enderror" id="basicInput" placeholder="Masukan Nilai Pelajaran">
                        @error('total_izin')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Total Sakit</label>
                        <input type="number" value="{{ $siswa->absen->total_sakit }}" name="total_sakit" class="form-control @error('total_sakit') is-invalid @enderror" id="basicInput" placeholder="Masukan Nilai Pelajaran">
                        @error('total_sakit')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Total Tanpa Keterangan</label>
                        <input type="number" value="{{ $siswa->absen->total_tanpa_keterangan }}" name="total_tanpa_keterangan" class="form-control @error('total_tanpa_keterangan') is-invalid @enderror" id="basicInput" placeholder="Masukan Nilai Pelajaran">
                        @error('total_tanpa_keterangan')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
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