<x-base-layout>

    <div class="page-heading d-flex justify-content-between items-center">
        <h3>Detail Absen</h3>
    </div>
    
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="table1">
                        <tr>
                            <td>Tahun Ajaran</td> <td>:</td> <td>{{ $data->tahun->nama }}</td>
                            <td>Semester</td> <td>:</td> <td>{{ $data->semester }}</td>
                        </tr>
                        <tr>
                            <td>Kelas</td> <td>:</td> <td>{{ $data->kelas->nama }}</td>
                            <td>Tanggal</td> <td>:</td> <td>{{ \Carbon\Carbon::parse($data->tgl)->translatedFormat('d F Y') }}</td>
                        </tr>
                    </table>
                    <div class="card-body p-0">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="100px">No</th>
                                    <th width="25%">NIS</th>
                                    <th>Nama</th>
                                    <th width="200px">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($lines as $l)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $l->siswa->nis ?? '-' }}</td>
                                        <td>{{ $l->siswa->nama }}</td>
                                        <td>{{ $l->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-base-layout>