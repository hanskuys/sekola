<x-base-layout>
    <div class="page-heading d-flex justify-content-between items-center">
        <h3>Data Kelas</h3>
        <a class="btn btn-outline-primary" href="{{ route('admin.kelas.create') }}">+
            Tambah Kelas</a>
    </div>

    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped w-100" id="datatable">
                        <thead>
                            <tr>
                                <th>Nama Kelas</th>
                                <th>Wali Kelas</th>
                                <th>Maks Laki-Laki</th>
                                <th>Maks Perempuan</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {

                var table = $('#datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    ajax: {
                        url: "{{ route('admin.kelas.index') }}",
                        data: function (data) {}
                    },
                    columns: [{
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'nama_guru',
                            name: 'nama_guru'
                        },
                        {
                            data: 'lk',
                            name: 'lk'
                        },
                        {
                            data: 'pr',
                            name: 'pr'
                        },
                        {
                            data: 'jml',
                            name: 'jml'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true
                        },
                    ]
                });

                // Fungsi untuk menampilkan modal tambah
                $('#tambahKelasBtn').click(function () {
                    $('#kelasForm').trigger("reset");
                    $('#kelasModal').modal('show');
                });

                // AJAX untuk menambahkan data
                $('#kelasForm').submit(function (e) {
                    e.preventDefault();
                    var formData = $(this).serialize();
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.kelas.store') }}",
                        data: formData,
                        success: function (response) {
                            $('#kelasModal').modal('hide');
                            table.draw(); // Refresh DataTable
                            // Tampilkan pesan sukses
                        },
                        error: function (error) {
                            console.log(error);
                            // Tampilkan error validasi
                        }
                    });
                });

                // Tambahkan fungsi untuk edit dan delete dengan cara yang serupa
            });

    
            function hapus(id)
            {
                
                Swal.fire({
                    title: "Anda Yakin?",
                    text: "Data Yang Dihapus Tidak Akan Bisa Dikembalikan",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Tidak, Batalkan!',
                    reverseButtons: true,
                    allowOutsideClick: false,
                    confirmButtonColor: '#af1310',
                    cancelButtonColor: '#fffff',
                })
                .then((result) => {
                    if (result.value) {
                    $.ajax({
                        url: "/admin/master/kelas/" + id +"/delete",
                        type: 'DELETE',
                        dataType: 'json',
                        data: {
                            "_token": $("meta[name='csrf-token']").attr("content"),
                        },
                        success: function (result) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: result.message,
                                icon: 'success',
                                toast : true,
                                position : 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            $('#datatable').DataTable().ajax.reload();
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            Swal.fire({
                                title: 'Gagal!',
                                text: "Terjadi Kesalahan Di Server",
                                icon: 'success',
                                toast : true,
                                position : 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }
                    });
                    }
                });
            }
        </script>
    @endpush
</x-base-layout>
