<x-base-layout>
    <div class="page-heading d-flex justify-content-between items-center">
        <h3>Data Absen</h3>
        <a href="{{ route('guru.absen.create') }}" class="btn btn-outline-primary">
            <i class="fa fa-plus"></i>
            Tambah Absen
        </a>
    </div>
    
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Kelas</th>
                                <th>Hadir</th>
                                <th>Izin</th>
                                <th>Sakit</th>
                                <th>Alpa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
    
                // alert($("#filter-tahun").val());
                var table = $('#datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    dom : "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    ajax: {
                        url : "{{ route('guru.absen.index') }}",
                        data : function(data){
                                data.tahun = $("#field-filter-tahun").val();
                                data.kelas = $("#field-filter-kelas").val();
                        }
                    },
                    columns: [
                        {data: 'tgl', name: 'tgl'},
                        {data: 'kelas.nama', name: 'kelas.nama'},
                        {data: 'hadir', name: 'hadir'},
                        {data: 'izin', name: 'izin'},
                        {data: 'sakit', name: 'sakit'},
                        {data: 'alpa', name: 'alpa'},
                        {
                            data: 'action', 
                            name: 'action', 
                            orderable: true, 
                            searchable: true
                        },
                    ]
                });
            });
        </script>
    @endpush
    </x-base-layout>