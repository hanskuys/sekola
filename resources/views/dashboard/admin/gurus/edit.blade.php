@extends('dashboard.admin.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Edit Data {{$guru->nama}}</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/admin/gurus/{{ $guru->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    
                    <div class="form-group">
                        <label for="basicInput">Nama Guru</label>
                        <input type="text" value="{{ $guru->nama }}" class="form-control @error('nama') is-invalid @enderror" name="nama" id="basicInput">
                        @error('nama')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Jenis Kelamin</label>
                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="basicInput">Email</label>
                        <input type="text" value="{{ $guru->email }}" class="form-control @error('email') is-invalid @enderror" name="email" id="basicInput">
                        @error('email')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label for="basicInput">NIP (Nomor Induk Pegawai)</label>
                        <input type="text" value="{{ $guruDetail->nip ?? '' }}" class="form-control @error('nip') is-invalid @enderror" name="nip" id="basicInput">
                        @error('nip')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="basicInput">NUPTK</label>
                        <input type="text" value="{{ $guruDetail->nuptk ?? '' }}" class="form-control @error('nuptk') is-invalid @enderror" name="nuptk" id="basicInput">
                        @error('nuptk')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="basicInput">NBM</label>
                        <input type="text" value="{{ $guruDetail->nbm ?? '' }}" class="form-control @error('nbm') is-invalid @enderror" name="nbm" id="basicInput">
                        @error('nbm')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Tanggal Mulai</label>
                        <input type="date" value="{{ $guruDetail->tanggal_mulai ?? '' }}" class="form-control @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" id="basicInput">
                        @error('tanggal_mulai')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Tempat Lahir</label>
                        <input type="text" value="{{ $guruDetail->tempat_lahir ?? '' }}" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="basicInput">
                        @error('tempat_lahir')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="basicInput">Tanggal Lahir</label>
                        <input type="date" value="{{ $guruDetail->tanggal_lahir ?? '' }}" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="basicInput">
                        @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="basicInput">Status</label>
                        <input type="text" value="{{ $guruDetail->status ?? '' }}" class="form-control @error('status') is-invalid @enderror" name="status" id="basicInput">
                        @error('status')
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