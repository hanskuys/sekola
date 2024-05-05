@extends('dashboard.admin.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Kategori Kelas</h3>
    <a href="/admin/kategori-kelases/create" class="btn btn-outline-primary">+ Tambah Kategori Kelas</a>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nama Kelas</th>
                            <th>Wali Kelas</th>
                            <th>Jumlah Siswa</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($kelases) == 0)
                            <tr class="text-center">
                                <td colspan="2" class="p-5">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($kelases as $val)
                            <tr>
                                <td>{{ $val->kelas }}</td>
                                <td>{{ ($val->guru) ? $val->guru->nama : '' }}</td>
                                <td>{{ $val->bridge_count }}</td>
                                <td class="d-flex">
                                    <a href="/admin/kategori-kelases/{{ $val->id }}/edit" class="btn icon btn-primary me-2"><i class="bi bi-pencil"></i></a>
                                    <form action="/admin/kategori-kelases/{{ $val->id }}" method="POST">
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