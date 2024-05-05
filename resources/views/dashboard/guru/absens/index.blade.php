@extends('dashboard.guru.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Absen</h3>
    {{-- <div>
        <a href="/guru/absens/create" class="btn btn-outline-primary">+ Input Total Absen</a>
        <a href="#" class="btn btn-outline-primary">
            <i class="bi bi-printer"></i> Print Laporan
        </a>
    </div> --}}
</div>

<div class="page-content">
    <section class="section">
        <div class="card overflow-auto">
            <div class="card-body">
                <form action="/guru/absen/fetch-siswa" method="post">
                    @csrf
                    <fieldset class="form-group">
                        <label for="basicSelect">Daftar Kelas</label>
                        <select class="form-select @error('kelas_id') is-invalid @enderror" name="kelas_id" id="basicSelect">
                            <option selected hidden>Pilih Kelas</option>
                            @foreach ($kelases as $val)
                                <option {{ $kelas_id == $val->id ? "selected" : "" }} value="{{ $val->id }}">{{ $val->kelas }}</option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </fieldset>

                    
                    <fieldset class="form-group">
                        <label for="basicSelect">Mata Pelajaran</label>
                        <select class="form-select @error('karyawan_pelajaran_id') is-invalid @enderror" name="karyawan_pelajaran_id" id="basicSelect">
                            <option selected hidden>Pilih Mata Pelajaran</option>
                            @foreach ($matpel as $val)
                                {{-- <option value="{{ $val->id }}">{{ $val->pelajaran->pelajaran }}</option> --}}
                                <option {{ $pelajaran_id == $val->id ? "selected" : "" }} value="{{ $val->id }}">{{ $val->pelajaran->pelajaran }}</option>
                            @endforeach
                        </select>
                        @error('karyawan_pelajaran_id')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </fieldset>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        @isset($dataSiswa)   
            <div class="card overflow-auto">
                <div class="card-body">
                    <div class="page-heading d-flex justify-content-between items-center">
                        <h3></h3>
                        <div>
                            <a href="/guru/absens/create?kelas_id={{ $kelas_id }}&pelajaran_id={{ $pelajaran_id }}" class="btn btn-outline-primary">+ Input Absen</a>
                            {{-- <a href="#" class="btn btn-outline-primary">
                                <i class="bi bi-printer"></i> Print Laporan
                            </a> --}}
                        </div>
                    </div>
                    <table class="table text-center" id="table1">
                        <thead>
                            <tr>
                                <th>Nama Siswa</th>
                                <th>Masuk</th>
                                <th>Sakit</th>
                                <th>Izin</th>
                                <th>Tanpa Keterangan</th>
                                <th>Total Absen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($dataAbsen) == 0)
                                <tr class="text-center">
                                    <td colspan="5" class="p-5">Tidak Ada Data</td>
                                </tr>
                            @else
                                @foreach ($dataAbsen as $val)
                                    <tr>
                                        <td>{{ $val->first()->siswa->nama_siswa }}</td>
                                        <td>{{ $val->absHadir }}</td>
                                        <td>{{ $val->absIzin }}</td>
                                        <td>{{ $val->absSakit }}</td>
                                        <td>{{ $val->absTk }}</td>
                                        <td>{{ $val->absTotal }}</td>
                                        {{-- <td class="d-flex justify-content-center">
                                            @if ($val)
                                                <a href="/guru/absens/{{ $val->first()->id }}/edit" class="btn icon btn-primary me-2"><i class="bi bi-pencil"></i> Update Absen</a>
                                            @else
                                                <a href="/guru/absens/{{ $val->first()->id }}/edit" class="btn icon btn-primary me-2 disabled"><i class="bi bi-pencil"></i> Update Absen</a>
                                            @endif
                                        </td> --}}
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        @endisset

    </section>
</div>
@endsection