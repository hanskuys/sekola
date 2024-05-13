<x-base-layout>

    <div class="page-heading d-flex justify-content-between items-center">
        <h3>Data Lengkap Calon Siswa</h3>
        <button type="button" class="btn btn-outline-primary block" id="btnOpenModal">
            Konfirmasi
        </button>
    </div>
    
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h2 class="h5">Informasi Data Diri</h2>
                    <table class="table table-striped" id="table1">
                        <tr>
                            <td>Nama Lengkap</td> <td>:</td> <td>{{ $data->nama_siswa }}</td>
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
                    <h2 class="h5">Informasi Orang Tua / Wali</h2>
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
                    <h2 class="h5">Informasi Tambahan</h2>
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
        </section>
    </div>
    <div class="modal fade text-left modal-borderless" id="modalForm" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form method="POST" id="myForm" onsubmit="return false;" >
                <input type="hidden" id="field-siswa_id" name="siswa_id" value="{{ $data->id }}"/>
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Pendaftaran</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <x-select-field
                    label="Kelas"
                    name="kelas"
                    id="kelas"
                    placeholder="Pilih Kelas"
                    :options="$kelas"
                    isAjax="true"
                />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            
            $(document).ready(function () {
                
                // Fungsi untuk menampilkan modal tambah
                $('#btnOpenModal').click(function () {
                    $('#myForm').trigger("reset");
                    $('#modalForm').modal('show');
                });
    
                // AJAX untuk menambahkan data
                $('#myForm').submit(function (e) {
                    e.preventDefault(); // Mencegah form melakukan submit secara default (reload page)
                    var url = '';
                    var id = $("#myForm").find('#field-id').val();
                    if(id != ''){
                        url = "/admin/master/tahun-ajaran/"+id + "/update";
                    }else{
                        url = "/admin/master/tahun-ajaran/store";
                    }
    
                    var formData = new FormData(this); // Menggunakan FormData untuk mengumpulkan data dari form
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url:  "/admin/ppdb/konfirmasi",// Pastikan URL sesuai dengan route untuk menyimpan data tahun ajaran
                        data: formData,
                        contentType: false, // Karena menggunakan FormData, set contentType ke false
                        processData: false, // Karena menggunakan FormData, set processData ke false
                        success: function (response) {
                            $('#modalForm').modal('hide'); // Menutup modal setelah data berhasil disimpan
    
                            Swal.fire({
                                title: 'Berhasil!',
                                text: response.message,
                                icon: 'success',
                                toast : true,
                                position : 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });

                            window.location.replace("/admin/ppdb");
                        },
                        error: function (error) {
                            // console.log(error.responseJSON);
                            $.each(error.responseJSON.errors, function (key, value) {
                                $('#field-' + key).addClass('is-invalid');
                                $('#error-' + key).text(value[0]);
                            });
                            Swal.fire({
                                title: 'Error!',
                                text: error.responseJSON.message,
                                icon: 'error',
                                toast : true,
                                position : 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            // Tampilkan error validasi disini jika Anda mau
                        }
                    });
                });
            });
        </script>
    @endpush
</x-base-layout>