<x-base-layout>
    <div class="page-heading d-flex justify-content-between items-center">
        <h3>Data Guru</h3>
        <a href="{{ route('admin.guru.create') }}" class="btn btn-outline-primary">
            <i class="fa fa-plus"></i> Tambah Guru
        </a>
    </div>
    
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped w-100" id="datatable">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>NUPTK</th>
                                <th>NBM</th>
                                <th>NAMA</th>
                                <th>EMAIL</th>
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
                    url : "{{ route('admin.guru.index') }}",
                    data : function(data){

                    }
                },
                columns: [
                    {data: 'nip', name: 'nip'},
                    {data: 'nuptk', name: 'nuptk'},
                    {data: 'nbm', name: 'nbm'},
                    {data: 'nama', name: 'nama'},
                    {data: 'email', name: 'email'},
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