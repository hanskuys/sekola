@extends('dashboard.admin.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Assign Guru Mata Pelajaran</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/admin/guru-matpel" method="POST">
                    @csrf
    
                    <div class="form-group">
                        <label for="basicInput">Nama Guru</label>
                        <select class="form-control @error('karyawan_id') is-invalid @enderror" id="karyawan_id" name="karyawan_id">
                            <option value="" selected disabled>Pilih Guru</option>
                            @foreach($karyawan as $karyawanItem)d
                                <option value="{{ $karyawanItem->id }}">{{ $karyawanItem->nama }}</option>
                            @endforeach
                        </select>
                        @error('karyawan_id')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Mata Pelajaran</label>
                        <select class="form-control @error('pelajaran_id') is-invalid @enderror" id="pelajaran_id" name="pelajaran_id">
                            <option value="" selected disabled>Pilih Mata Pelajaran</option>
                            @foreach($pelajaran as $pelajaranItem)
                                <option value="{{ $pelajaranItem->id }}">{{ $pelajaranItem->pelajaran }}</option>
                            @endforeach
                        </select>
                        @error('pelajaran_id')
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