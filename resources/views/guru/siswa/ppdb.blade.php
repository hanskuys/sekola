<x-base-layout>
    <div class="page-heading d-flex justify-content-between items-center">
        <h3>Data Calon Siswa</h3>
        {{-- <a href="/admin/siswas/create" class="btn btn-outline-primary">+ Tambah Siswa</a> --}}
    </div>
    
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped w-100" id="datatable">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>NISN</th>
                                <th>Asal Sekolah</th>
                                <th>Status</th>
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

            var table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                dom : "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                ajax: {
                    url : "{{ route('admin.ppdb.index') }}",
                    data : function(data){
                            var tahun = $("#filter-tahun").val();
                            data.tahun = tahun;
                    }
                },
                columns: [
                    {data: 'nama', name: 'nama'},
                    {data: 'email', name: 'email'},
                    {data: 'nisn', name: 'nisn'},
                    {data: 'detail.asal_sekolah', name: 'detail.asal_sekolah'},
                    {data: 'detail.status', name: 'detail.status'},
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