@extends('dashboard.admin.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Edit Siswa</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/admin/siswas/{{ $siswa->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                        <label for="basicInput">Nama Siswa</label>
                        <input type="text" value="{{ $siswa->nama_siswa }}" class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa" id="basicInput" placeholder="Jhon Doe">
                        @error('nama_siswa')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="basicInput">Email</label>
                        <input type="text" value="{{ $siswa->email }}" class="form-control @error('email') is-invalid @enderror" name="email" id="basicInput" placeholder="JhonDoe@example.com">
                        @error('email')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="basicInput">NIS (Nomor Induk Siswa)</label>
                        <input type="text" value="{{ $siswa->nis }}" class="form-control @error('nis') is-invalid @enderror" name="nis" id="basicInput" placeholder="8502830200">
                        @error('nis')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="basicInput">NISN (Nomor Induk Siswa Nasional)</label>
                        <input type="text" value="{{ $siswa->nisn }}" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="basicInput" placeholder="54289412892">
                        @error('nisn')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- <fieldset class="form-group">
                        <label for="basicSelect">Semester</label>
                        <select class="form-select @error('semester') is-invalid @enderror" name="semester" id="basicSelect">
                            <option selected hidden>Pilih Semester</option>
                            <option {{ $siswa->semester == 1 ? "selected" : "" }} value="1">Semester 1</option>
                            <option {{ $siswa->semester == 2 ? "selected" : "" }} value="2">Semester 2</option>
                        </select>
                        @error('semester')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </fieldset> --}}

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection