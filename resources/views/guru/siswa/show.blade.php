<x-base-layout>

    <div class="page-heading d-flex justify-content-between items-center">
        <h3>Detail Siswa</h3>
    </div>
    
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h2 class="h4">Informasi Data Diri</h2>
                    <table class="table table-striped" id="table1">
                        <tr>
                            <td>Nama Siswa</td> <td>:</td> <td>{{ $data->nama_siswa }}</td>
                            <td>Jenis Kelamin</td> <td>:</td> <td>{{ $data->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td>Tempat Tanggal Lahir</td> <td>:</td> <td>{{ $data->tempat_lahir, $data->tanggal_lahir }}</td>
                            <td>Email</td> <td>:</td> <td>{{ $data->email }}</td>
                        </tr>
                        <tr>
                            <td>NISN</td> <td>:</td> <td>{{ $data->nisn }}</td>
                            <td>NIK</td> <td>:</td> <td>{{ $data->nik }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td> <td>:</td> <td>{{ $data->alamat }}</td>
                            <td>No Telepon</td> <td>:</td> <td>{{ $data->no_tlp }}</td>
                        </tr>
                        <tr>
                            <td>No KK</td> <td>:</td> <td>{{ $data->detail ? $data->detail->nokk : '-' }}</td>
                            <td>No Akta</td> <td>:</td> <td>{{ $data->detail ? $data->detail->no_akta : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Agama</td> <td>:</td> <td>{{ $data->detail ? $data->detail->agama : '-' }}</td>
                            <td>Kewarganegaraan</td> <td>:</td> <td>{{ $data->detail ? $data->detail->kewarganegaraan : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Koordinat Lintang</td> <td>:</td> <td>{{ $data->detail ? $data->detail->lintang : '-' }}</td>
                            <td>Koordinat Bujur</td> <td>:</td> <td>{{ $data->detail ? $data->detail->bujur : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Tinggal Bersama</td> <td>:</td> <td>{{ $data->detail ? $data->detail->tinggal_bersama : '-' }}</td>
                            <td>Moda Transportasi</td> <td>:</td> <td>{{ $data->detail ? $data->detail->moda_transportasi : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Anak Ke </td> <td>:</td> <td>{{ $data->detail ? $data->detail->anak_ke : '-' }}</td>
                            <td>KIP</td> <td>:</td> <td>{{ $data->detail ? $data->detail->kip : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Tinggi Badan</td> <td>:</td> <td>{{ $data->detail ? $data->detail->tb : '-' }}</td>
                            <td>Berat Badan</td> <td>:</td> <td>{{ $data->detail ? $data->detail->bb : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Jarak Rumah</td> <td>:</td> <td>{{ $data->detail ? $data->detail->jarak_tempuh : '-' }}</td>
                            <td>Waktu Tempuh</td> <td>:</td> <td>{{ $data->detail ? $data->detail->waktu_tempuh : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Sodara</td> <td>:</td> <td>{{ $data->detail ? $data->detail->jumlah_sodara : '-' }}</td>
                            <td>Prestasi</td> <td>:</td> <td>{{ $data->detail ? $data->detail->prestasi : '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
    
            <div class="card">
                <div class="card-body">
                    <h2>Data Orang Tua Siswa</h2>
                    <table class="table table-striped" id="table1">
                        <tr>
                            <td>Nama Ayah</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->nama_ayah : '-' }}</td>
                            <td>Nama Ibu</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->nama_ibu : '-' }}</td>
                            <td>Nama Wali</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->nama_wali : '-' }}</td>
                        </tr>
                        <tr>
                            <td>NIK Ayah</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->nik_ayah : '-' }}</td>
                            <td>NIK Ibu</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->nik_ibu : '-' }}</td>
                            <td>NIK Wali</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->nik_wali : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir Ayah</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->lahir_ayah : '-' }}</td>
                            <td>Tanggal Lahir Ibu</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->lahir_ibu : '-' }}</td>
                            <td>Tanggal Lahir Wali</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->lahir_wali : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Pendidikan Ayah</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->pendidikan_ayah : '-' }}</td>
                            <td>Pendidikan Ibu</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->pendidikan_ibu : '-' }}</td>
                            <td>Pendidikan Wali</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->pendidikan_wali : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ayah</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->pekerjaan_ayah : '-' }}</td>
                            <td>Pekerjaan Ibu</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->pekerjaan_ibu : '-' }}</td>
                            <td>Pekerjaan Wali</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->pekerjaan_wali : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Penghasilan Ayah</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->penghasilan_ayah : '-' }}</td>
                            <td>Penghasilan Ibu</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->penghasilan_ibu : '-' }}</td>
                            <td>Penghasilan Wali</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->penghasilan_wali : '-' }}</td>
                        </tr>
                        <tr>
                            <td>No Telepon Ayah</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->no_telp_ayah : '-' }}</td>
                            <td>No Telepon Ibu</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->no_telp_ibu : '-' }}</td>
                            <td>No Telepon Wali</td> <td>:</td> <td>{{ $data->ortu? $data->ortu->no_telp_wali : '-' }}</td>
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
                            <td>{{ $data->detail ? $data->detail ->asal_sekolah : '-' }}</td>
                            <td>Nomor Induk Siswa</td>
                            <td>:</td>
                            <td>{{ $data->detail ? $data->detail->nis : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Peserta</td>
                            <td>:</td>
                            <td>{{ $data->detail ? $data->detail->nomor_peserta : '-' }}</td>
                            <td>Nomor Ijazah</td>
                            <td>:</td>
                            <td>{{ $data->detail ? $data->detail->nomor_ijasah : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Hobby</td>
                            <td>:</td>
                            <td>{{ $data->detail ? $data->detail->hobi : '-' }}</td>
                            <td>Cita-cita</td>
                            <td>:</td>
                            <td>{{ $data->detail ? $data->detail->cita_cita : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Ijazah</td>
                            <td>:</td>
                            <td>
                                Belum Upload
                            </td>
                            <td>Akta Kelahiran</td>
                            <td>:</td>
                            <td>
                                Belum Upload
                            </td>
                        </tr>
                        <tr>
                            <td>Kartu Keluarga</td>
                            <td>:</td>
                            <td>
                                Belum Upload
                            </td>
                            <td>KTP Orang Tua</td>
                            <td>:</td>
                            <td>
                                Belum Upload
                            </td>
                        </tr>
                        <tr>
                            <td>KIP</td>
                            <td>:</td>
                            <td>
                                Belum Upload
                            </td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <form action="/admin/pendaftaran/konfirmasi/{{ $data->id }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                        </form>
                    </div>
                </form>
                </div>
            </div>
        </section>
    </div>
</x-base-layout>