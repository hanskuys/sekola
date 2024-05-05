@extends('dashboard.admin.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Nilai</h3>
    <div>
        {{-- <a href="/admin/nilain/create" class="btn btn-outline-primary">+ Tambah Nilai</a> --}}
    </div>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
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
                                <a href="/admin/nilais/{{ $d->id }}" class="btn icon btn-primary me-2"><i class="bi bi-eye"></i></a>
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