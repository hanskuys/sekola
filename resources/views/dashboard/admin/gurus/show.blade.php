@extends('dashboard.admin.base')
@section('content')
@php
    use Carbon\Carbon;
@endphp
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data {{$gurus->nama}}</h3>
    <a href="/admin/gurus/{{ $gurus->id }}/edit" class="btn icon btn-warning me-2"><i class="bi bi-pencil"></i></a>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table" id="table1">
                        <tr>
                            <th>Nama Guru</th>
                            <td>:</td>
                            <td>{{ $gurus->nama ?? 'Tidak Ada Data'}}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>:</td>
                            <td>{{ $guruDetails->jenis_kelamin ?? 'Tidak Ada Data'}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td>{{ $gurus->email ?? 'Tidak Ada Data' }}</td>
                        </tr>
                        <tr>
                            <th>NIP</th>
                            <td>:</td>
                            <td>{{ $guruDetails->nip ?? 'Tidak Ada Data' }}</td>
                        </tr>
                        <tr>
                            <th>NUPTK</th>
                            <td>:</td>
                            <td>{{ $guruDetails->nuptk ?? 'Tidak Ada Data' }}</td>
                        </tr>
                        <tr>
                            <th>NBM</th>
                            <td>:</td>
                            <td>{{ $guruDetails->nbm ?? 'Tidak Ada Data' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Mulai</th>
                            <td>:</td>
                            <td>{{ $guruDetails ? Carbon::parse($guruDetails->tanggal_mulai)->format('d F Y') : 'Tidak Ada Data' }}</td>
                        </tr>
                        <tr>
                            <th>Tempat Tanggal Lahir</th>
                            <td>:</td>
                            <td>{{ $guruDetails->tempat_lahir ?? 'Tidak Ada Data' }}, {{ $guruDetails ? Carbon::parse($guruDetails->tanggal_lahir)->format('d F Y') : 'Tidak Ada Data' }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:</td>
                            <td>{{ $guruDetails->status ?? 'Tidak Ada Data' }}</td>
                        </tr>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection