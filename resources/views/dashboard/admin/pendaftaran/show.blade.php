@extends('dashboard.admin.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Lengkap Calon Siswa</h3>
    {{-- <a href="/admin/siswas/create" class="btn btn-outline-primary">+ Tambah Siswa</a> --}}
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h2>Data Siswa</h2>
                <table class="table table-striped" id="table1">
                    <tr>
                        <td>Nama Siswa</td> <td>:</td> <td>{{ $siswas->nama_siswa }}</td>
                        <td>Jenis Kelamin</td> <td>:</td> <td>{{ $siswas->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <td>Tempat Tanggal Lahir</td> <td>:</td> <td>{{ $siswas->tempat_lahir, $siswas->tanggal_lahir }}</td>
                        <td>Email</td> <td>:</td> <td>{{ $siswas->email }}</td>
                    </tr>
                    <tr>
                        <td>NISN</td> <td>:</td> <td>{{ $siswas->nisn }}</td>
                        <td>NIK</td> <td>:</td> <td>{{ $siswas->nik }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td> <td>:</td> <td>{{ $siswas->alamat }}</td>
                        <td>No Telepon</td> <td>:</td> <td>{{ $siswas->no_tlp }}</td>
                    </tr>
                    <tr>
                        <td>No KK</td> <td>:</td> <td>{{ $lengkap ? $lengkap->nokk : '-' }}</td>
                        <td>No Akta</td> <td>:</td> <td>{{ $lengkap ? $lengkap->no_akta : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Agama</td> <td>:</td> <td>{{ $lengkap ? $lengkap->agama : '-' }}</td>
                        <td>Kewarganegaraan</td> <td>:</td> <td>{{ $lengkap ? $lengkap->kewarganegaraan : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Koordinat Lintang</td> <td>:</td> <td>{{ $lengkap ? $lengkap->lintang : '-' }}</td>
                        <td>Koordinat Bujur</td> <td>:</td> <td>{{ $lengkap ? $lengkap->bujur : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Tinggal Bersama</td> <td>:</td> <td>{{ $lengkap ? $lengkap->tinggal_bersama : '-' }}</td>
                        <td>Moda Transportasi</td> <td>:</td> <td>{{ $lengkap ? $lengkap->moda_transportasi : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Anak Ke </td> <td>:</td> <td>{{ $lengkap ? $lengkap->anak_ke : '-' }}</td>
                        <td>KIP</td> <td>:</td> <td>{{ $lengkap ? $lengkap->kip : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Tinggi Badan</td> <td>:</td> <td>{{ $lengkap ? $lengkap->tb : '-' }}</td>
                        <td>Berat Badan</td> <td>:</td> <td>{{ $lengkap ? $lengkap->bb : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Jarak Rumah</td> <td>:</td> <td>{{ $lengkap ? $lengkap->jarak_tempuh : '-' }}</td>
                        <td>Waktu Tempuh</td> <td>:</td> <td>{{ $lengkap ? $lengkap->waktu_tempuh : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Sodara</td> <td>:</td> <td>{{ $lengkap ? $lengkap->jumlah_sodara : '-' }}</td>
                        <td>Prestasi</td> <td>:</td> <td>{{ $lengkap ? $lengkap->prestasi : '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h2>Data Orang Tua Siswa</h2>
                <table class="table table-striped" id="table1">
                    <tr>
                        <td>Nama Ayah</td> <td>:</td> <td>{{ $ortu ? $ortu->nama_ayah : '-' }}</td>
                        <td>Nama Ibu</td> <td>:</td> <td>{{ $ortu ? $ortu->nama_ibu : '-' }}</td>
                        <td>Nama Wali</td> <td>:</td> <td>{{ $ortu ? $ortu->nama_wali : '-' }}</td>
                    </tr>
                    <tr>
                        <td>NIK Ayah</td> <td>:</td> <td>{{ $ortu ? $ortu->nik_ayah : '-' }}</td>
                        <td>NIK Ibu</td> <td>:</td> <td>{{ $ortu ? $ortu->nik_ibu : '-' }}</td>
                        <td>NIK Wali</td> <td>:</td> <td>{{ $ortu ? $ortu->nik_wali : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir Ayah</td> <td>:</td> <td>{{ $ortu ? $ortu->lahir_ayah : '-' }}</td>
                        <td>Tanggal Lahir Ibu</td> <td>:</td> <td>{{ $ortu ? $ortu->lahir_ibu : '-' }}</td>
                        <td>Tanggal Lahir Wali</td> <td>:</td> <td>{{ $ortu ? $ortu->lahir_wali : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Pendidikan Ayah</td> <td>:</td> <td>{{ $ortu ? $ortu->pendidikan_ayah : '-' }}</td>
                        <td>Pendidikan Ibu</td> <td>:</td> <td>{{ $ortu ? $ortu->pendidikan_ibu : '-' }}</td>
                        <td>Pendidikan Wali</td> <td>:</td> <td>{{ $ortu ? $ortu->pendidikan_wali : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan Ayah</td> <td>:</td> <td>{{ $ortu ? $ortu->pekerjaan_ayah : '-' }}</td>
                        <td>Pekerjaan Ibu</td> <td>:</td> <td>{{ $ortu ? $ortu->pekerjaan_ibu : '-' }}</td>
                        <td>Pekerjaan Wali</td> <td>:</td> <td>{{ $ortu ? $ortu->pekerjaan_wali : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Penghasilan Ayah</td> <td>:</td> <td>{{ $ortu ? $ortu->penghasilan_ayah : '-' }}</td>
                        <td>Penghasilan Ibu</td> <td>:</td> <td>{{ $ortu ? $ortu->penghasilan_ibu : '-' }}</td>
                        <td>Penghasilan Wali</td> <td>:</td> <td>{{ $ortu ? $ortu->penghasilan_wali : '-' }}</td>
                    </tr>
                    <tr>
                        <td>No Telepon Ayah</td> <td>:</td> <td>{{ $ortu ? $ortu->no_telp_ayah : '-' }}</td>
                        <td>No Telepon Ibu</td> <td>:</td> <td>{{ $ortu ? $ortu->no_telp_ibu : '-' }}</td>
                        <td>No Telepon Wali</td> <td>:</td> <td>{{ $ortu ? $ortu->no_telp_wali : '-' }}</td>
                    </tr>
                    
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h2>Data Tambahan Siswa</h2>
                <table class="table table-striped" id="table1">
                    <tr>
                        <td>Asal Sekolah</td>
                        <td>:</td>
                        <td>{{ $tambahan ? $tambahan->asal_sekolah : '-' }}</td>
                        <td>Nomor Induk Siswa</td>
                        <td>:</td>
                        <td>{{ $tambahan ? $tambahan->nis : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Peserta</td>
                        <td>:</td>
                        <td>{{ $tambahan ? $tambahan->nomor_peserta : '-' }}</td>
                        <td>Nomor Ijazah</td>
                        <td>:</td>
                        <td>{{ $tambahan ? $tambahan->nomor_ijasah : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Hobby</td>
                        <td>:</td>
                        <td>{{ $tambahan ? $tambahan->hobi : '-' }}</td>
                        <td>Cita-cita</td>
                        <td>:</td>
                        <td>{{ $tambahan ? $tambahan->cita_cita : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Ijazah</td>
                        <td>:</td>
                        <td>
                            @if ($tambahan)
                            <img src="{{ asset('storage/images/dokumenPendaftaran/' . $tambahan->doc_ijasah) }}"
                                style="max-width: 100%; max-height: 200px;">
                            @else
                            Belum Upload
                            @endif
                        </td>
                        <td>Akta Kelahiran</td>
                        <td>:</td>
                        <td>
                            @if ($tambahan)
                            <img src="{{ asset('storage/images/dokumenPendaftaran/' . $tambahan->doc_akte) }}"
                                style="max-width: 100%; max-height: 200px;">
                                @else
                                Belum Upload
                                @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Kartu Keluarga</td>
                        <td>:</td>
                        <td>
                            @if ($tambahan)
                            <img src="{{ asset('storage/images/dokumenPendaftaran/' . $tambahan->doc_kk) }}"
                                style="max-width: 100%; max-height: 200px;">
                                @else
                                Belum Upload
                                @endif
                        </td>
                        <td>KTP Orang Tua</td>
                        <td>:</td>
                        <td>
                            @if ($tambahan)
                            <img src="{{ asset('storage/images/dokumenPendaftaran/' . $tambahan->doc_ktp) }}"
                                style="max-width: 100%; max-height: 200px;">
                                @else
                                Belum Upload
                                @endif
                        </td>
                    </tr>
                    <tr>
                        <td>KIP</td>
                        <td>:</td>
                        <td>
                            @if ($tambahan)
                            <img src="{{ asset('storage/images/dokumenPendaftaran/' . $tambahan->doc_kip) }}"
                                style="max-width: 100%; max-height: 200px;">
                                @else
                                Belum Upload
                                @endif
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <form action="/admin/pendaftaran/konfirmasi/{{ $siswas->id }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                    </form>
                </div>
            </form>
            </div>
        </div>
    </section>
</div>
@endsection