@extends('dashboard.siswa.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Nilai</h3>
    <div>
    <a href="/guru/nilais/create" class="btn btn-outline-primary">+ Input Nilai</a>
    <a href="/guru/absens/create" class="btn btn-outline-primary">
        <i class="bi bi-printer"></i> Print Laporan</a>
    </div>
</div>

<div class="page-content">
    <section class="section">
        <div class="card overflow-auto">
            <div class="card-body">
                <table class="table table-striped text-center" id="table1">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $d)
                        <tr>
                            <td>{{ $d->siswa->nis }}</td>
                            <td>{{ $d->siswa->nisn }}</td>
                            <td>{{ $d->siswa->nama_siswa }}</td>
                            <td>{{ $d->tahun->nama }}</td>
                            <td>{{ $d->semester }}</td>
                            <td>
                                <a href="/guru/nilais/{{ $d->id }}" class="btn icon btn-primary me-2"><i class="bi bi-eye"></i></a>
                                <a href="/guru/nilais/{{ $d->id }}/edit" class="btn icon btn-info me-2"><i class="bi bi-pencil"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">Data Tidak Ditemukan</td>
                        </tr>

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection