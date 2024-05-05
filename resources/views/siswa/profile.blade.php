@extends('dashboard.siswa.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Diri</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/siswa/profile/{{ $data->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    
                    <div class="form-group">
                        <label for="basicInput">NISN (Nomor Induk Siswa Nasional)</label>
                        <input type="text" readonly disabled class="form-control" value="{{ $data->nisn }}" id="basicInput" placeholder="Enter email">
                    </div>
                    
                    <div class="form-group">
                        <label for="basicInput">NIS (Nomor Induk Siswa)</label>
                        <input type="text" readonly disabled value="{{ $data->nis }}" class="form-control" id="basicInput" placeholder="Belum Ada Data">
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Nama Siswa</label>
                        <input type="text" name="nama_siswa" value="{{ $data->nama_siswa }}" class="form-control" id="basicInput" placeholder="Enter email">
                    </div>
                        
                    <div class="form-group">
                        <label for="basicInput">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ $data->email }}" id="basicInput" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Semester</label>
                        <input type="text" readonly disabled value="{{ $data->semester ?? 'Belum ada data' }}" class="form-control" id="basicInput">
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Tahun Ajaran</label>
                        <input type="text" readonly disabled value="{{ $data->th->tahun_ajaran ?? 'Belum ada data' }}" class="form-control" id="basicInput" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="basicInput" placeholder="Enter Password">
                        @error('password')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" id="basicInput" placeholder="Enter Confirm Password">
                        @error('confirm_password')
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