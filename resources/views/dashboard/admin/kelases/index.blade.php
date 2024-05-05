@extends('dashboard.admin.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Kelas</h3>
    <a href="/admin/kelases/create" class="btn btn-outline-primary">+ Tambah Data</a>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Nama Guru</th>
                            <th>Kelas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($kelas_bridges) == 0)
                            <tr class="text-center">
                                <td colspan="6" class="p-5">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($kelas_bridges as $val)
                            <tr>
                                <td>{{ $val->siswa->nama_siswa }}</td>
                                <td>{{ $val->karyawan->nama }}</td>
                                <td>{{ $val->kelas->kelas }}</td>
                                <td class="d-flex">
                                    <a href="/admin/kelases/{{ $val->id }}/edit" class="btn icon btn-primary me-2"><i class="bi bi-pencil"></i></a>
                                    <form action="/admin/kelases/{{ $val->id }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn icon btn-danger"><i class="bi bi-x"></i></button>
                                    </form>
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