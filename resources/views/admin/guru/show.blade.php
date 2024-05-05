<x-base-layout>

    <div class="page-heading d-flex justify-content-between items-center">
        <h3>Data {{ $data->nama}}</h3>
        <a href="/admin/gurus/{{$data->id }}/edit" class="btn icon btn-warning me-2"><i class="bi bi-pencil"></i></a>
    </div>
    
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="table1">
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>:</td>
                                <td>{{$data->nama ?? '-'}}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>:</td>
                                <td>{{ $data->jenis_kelamin ?? '-'}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td>{{$data->email ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>NIP</th>
                                <td>:</td>
                                <td>{{ $data->nip ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>NUPTK</th>
                                <td>:</td>
                                <td>{{ $data->nuptk ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>NBM</th>
                                <td>:</td>
                                <td>{{ $data->nbm ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Mulai</th>
                                <td>:</td>
                                <td>{{ $data->tanggal_mulai ? \Carbon\Carbon::parse($data->tanggal_mulai)->translatedFormat('d F Y') : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Tanggal Lahir</th>
                                <td>:</td>
                                <td>{{ $data->tempat_lahir ?? '-' }}, {{ $data->tgl_lahir ? \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:</td>
                                <td>{{ $data->status ?? '-' }}</td>
                            </tr>
                    </table>
                </div>
            </div>
    
        </section>
    </div>
</x-base-layout>