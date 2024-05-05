@extends('dashboard.guru.base')
@section('content')
@php
    use Carbon\Carbon;
@endphp
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data {{$gurus->nama}}</h3>
    <div>
        <a href="/guru/akun" class="btn icon btn-primary me-2"><i class="bi bi-person"></i></a>
        <a href="/guru/{{ $gurus->id }}/edit" class="btn icon btn-warning me-2"><i class="bi bi-pencil"></i></a>
    </div>
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
                            <td>
                                {{ $guruDetails && $guruDetails->tanggal_mulai ? Carbon::parse($guruDetails->tanggal_mulai)->format('d F Y') : 'Tidak Ada Data' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Tempat Tanggal Lahir</th>
                            <td>:</td>
                            <td>
                                {{ $guruDetails && $guruDetails->tempat_lahir ? $guruDetails->tempat_lahir . ', ' : '' }}
                                {{ $guruDetails && $guruDetails->tanggal_lahir ? Carbon::parse($guruDetails->tanggal_lahir)->format('d F Y') : 'Tidak Ada Data' }}
                            </td>
                        </tr>
                        {{-- <tr>
                            <th>Tanggal Lahir</th>
                            <td>:</td>
                            <td>{{ $guruDetails->tanggal_lahir ?? 'Tidak Ada Data' }}</td>
                        </tr> --}}
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