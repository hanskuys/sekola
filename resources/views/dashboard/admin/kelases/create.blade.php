@extends('dashboard.admin.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Tambah Kelas</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/admin/kelases" method="POST">
                    @csrf

                    <fieldset class="form-group">
                        <label for="basicSelect">Daftar Siswa</label>
                        <select multiple="multiple" name="siswa_id[]" class="choices form-select multiple-remove @error('siswa_id') is-invalid @enderror" id="basicSelect">
                            @foreach ($siswas as $val)
                                @if (count($val->kelases) == 0)
                                <option value="{{ $val->id }}">{{ $val->nama_siswa }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('siswa_id')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="basicInput">Nama Guru</label>
                        <select class="form-control @error('karyawan_id') is-invalid @enderror" id="karyawan_id" name="karyawan_id">
                            <option value="" selected disabled>Pilih Guru</option>
                            @foreach($karyawan as $karyawanItem)
                                <option value="{{ $karyawanItem->id }}">{{ $karyawanItem->nama }}</option>
                            @endforeach
                        </select>
                        @error('karyawan_id')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="basicSelect">Daftar Kelas</label>
                        <select class="form-select @error('kelas_id') is-invalid @enderror" name="kelas_id" id="basicSelect">
                            <option selected hidden>Pilih Kelas</option>
                            @foreach ($kelases as $val)
                                <option value="{{ $val->id }}">{{ $val->kelas }}</option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </fieldset>

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