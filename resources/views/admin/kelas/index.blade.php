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

        </script>
    @endpush
</x-base-layout>
