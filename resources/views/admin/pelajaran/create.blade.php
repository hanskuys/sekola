@extends('dashboard.admin.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Tambah Data Pelajaran</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/admin/pelajarans" method="POST">
                    @csrf
    
                    <div class="form-group">
                        <label for="basicInput">Mata Pelajaran</label>
                        <input type="text" class="form-control @error('pelajaran') is-invalid @enderror" name="pelajaran" id="basicInput" placeholder="Matematika">
                        @error('pelajaran')
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