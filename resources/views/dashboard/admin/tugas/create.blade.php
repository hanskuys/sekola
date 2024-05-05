@extends('dashboard.admin.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Assign Tugas/Jabatan</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/admin/tugas" method="POST">
                    @csrf
    
                    <div class="form-group">
                        <label for="basicInput">Nama Karyawan</label>
                        <select class="form-control @error('karyawan_id') is-invalid @enderror" id="karyawan_id" name="karyawan_id">
                            <option value="" selected disabled>Pilih Karyawan</option>
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
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Jabatan</label>
                        <select class="form-control @error('jabatan_id') is-invalid @enderror" id="jabatan_id" name="jabatan_id">
                            <option value="" selected disabled>Pilih jabatan</option>
                            @foreach($jabatan as $jabatanItem)
                                <option value="{{ $jabatanItem->id }}">{{ $jabatanItem->jabatan }}</option>
                            @endforeach
                        </select>
                        @error('jabatan_id')
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