@extends('dashboard.guru.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Nilai dan Absen {{ $data->siswa->nama_siswa }}</h3>
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
                            <td>{{ $data->masuk }}</td>
                            <td>{{ $data->izin  }}</td>
                            <td>{{ $data->sakit }}</td>
                            <td>{{ $data->alpa  }}</td>
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
                        @forelse ($data->detail as $d)
                            <tr>
                                <td>{{ $d->pelajaran->pelajaran }}</td>
                                <td>{{ $d->nilai }}</td>
                            </tr>
                        @empty
                            
                        @endforelse
                        {{-- @if (count($siswa->nilais) == 0)
                            @foreach ($mata_pelajarans as $mat)
                                <tr>
                                    <td>{{ $mat->pelajaran }}</td>
                                    <td>0</td>
                                </tr>
                            @endforeach
                        @else
                            @foreach ($siswa->nilais as $val)
                                <tr>
                                    <td>{{ $val->pelajaran->pelajaran }}</td>
                                    <td>{{ $val->nilai }}</td>
                                </tr>
                            @endforeach
                        @endif --}}
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection