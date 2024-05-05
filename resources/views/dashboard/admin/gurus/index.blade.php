@extends('dashboard.admin.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Guru</h3>
    <a href="/admin/gurus/create" class="btn btn-outline-primary">+ Tambah Guru</a>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nama Guru</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($gurus) == 0)
                            <tr class="text-center">
                                <td colspan="4" class="p-5">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($gurus as $val)
                            <tr>
                                <td>{{ $val->nama }}</td>
                                <td>{{ $val->email }}</td>
                                <td class="d-flex">
                                    {{-- <a href="/admin/gurus/{{ $val->id }}/edit" class="btn icon btn-warning me-2"><i class="bi bi-pencil"></i></a> --}}
                                    <a href="/admin/gurus/{{ $val->id }}" class="btn icon btn-primary me-2"><i class="bi bi-search"></i></a>
                                    <form action="/admin/gurus/{{ $val->id }}" method="POST">
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