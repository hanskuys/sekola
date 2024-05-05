@extends('dashboard.admin.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Nilai dan Absen {{ $siswa->nama_siswa }}</h3>
    <a href="/guru/absens/create" class="btn btn-outline-primary">
        <i class="bi bi-printer"></i> Print Nilai</a>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table text-center" id="table1">
                    <thead>
                        <tr>
                            <th>Masuk</th>
                            <th>Izin</th>
                            <th>Sakit</th>
                            <th>Tanpa Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $siswa->absen ? $siswa->absen->total_masuk : 0 }}</td>
                            <td>{{ $siswa->absen ? $siswa->absen->total_izin : 0 }}</td>
                            <td>{{ $siswa->absen ? $siswa->absen->total_sakit : 0 }}</td>
                            <td>{{ $siswa->absen ? $siswa->absen->total_tanpa_keterangan : 0 }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <table class="table table-striped text-center" id="table1">
                    <thead>
                        <tr>
                            <th>Mata Pelajaran</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($siswa->nilais) == 0)
                            @foreach ($mata_pelajarans as $item)
                                <tr>
                                    <td>{{ $item->pelajaran }}</td>
                                    <td>0</td>
                                </tr>
                            @endforeach
                        @endif
                        @foreach ($siswa->nilais as $val)
                            <tr>
                                <td>{{ $val->pelajaran->pelajaran }}</td>
                                <td>{{ $val->nilai }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection