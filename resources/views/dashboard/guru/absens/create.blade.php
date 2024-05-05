@extends('dashboard.guru.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Input Absen</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-4">Kelas {{$kelas->kelas}} Pelajaran {{$pelajaran->pelajaran}}</h3>
                <form action="/guru/absens" method="POST">
                    @csrf
                    <input type="hidden" name="pelajaran_id" value="{{ $pelajaran->id }}">                
                    <div class="form-group">
                        <label for="basicInput">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="basicInput" placeholder="Masukan Tanggal">
                        @error('tanggal')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <table class="table text-center" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($dataSiswa) == 0)
                                <tr class="text-center">
                                    <td colspan="5" class="p-5">Tidak Ada Data</td>
                                </tr>
                            @else
                                @foreach ($dataSiswa as $key => $val)
                                <input type="hidden" name="siswa_id[]" value="{{ $val->id }}">
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $val->nama_siswa }}</td>
                                    <td>
                                        <select class="form-select" name="status[]" id="basicSelect">
                                            <option value="hadir" selected>Hadir</option>
                                            <option value="izin">Izin</option>
                                            <option value="sakit">Sakit</option>
                                            <option value="tanpa keterangan">Tanpa Keterangan</option>
                                        </select>
                                    </td> 
                                    <td>
                                        <input type="text" name="keterangan[]" class="form-control @error('keterangan') is-invalid @enderror" id="basicInput" placeholder="-" value="-">
                                        @error('keterangan')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </td>                                   
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
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