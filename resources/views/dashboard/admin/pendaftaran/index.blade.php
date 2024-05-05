@extends('dashboard.admin.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Calon Siswa</h3>
    {{-- <a href="/admin/siswas/create" class="btn btn-outline-primary">+ Tambah Siswa</a> --}}
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Email</th>
                            <th>NISN (Nomor Induk Siswa Nasional)</th>
                            <th>Asal Sekolah</th>
                            <th>Status Penerimaan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($siswas) == 0)
                            <tr class="text-center">
                                <td colspan="7" class="p-5">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($siswas as $val)
                            <tr>
                                <td>{{ $val->nama_siswa ?? '-' }}</td>
                                <td>{{ $val->email ?? '-' }}</td>
                                <td>{{ $val->nisn ?? '-' }}</td>
                                <td>{{ $val->data_tambahan->asal_sekolah ?? '-' }}</td>
                                <td>{{ optional($val->data_tambahan)->status == 0 ? 'Belum Terkonfirmasi' : 'Lolos' }}</td>
                                <td class="d-flex">
                                    <a href="/admin/pendaftarans/{{ $val->id }}" class="btn icon btn-primary me-2"><i class="bi bi-pencil"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection