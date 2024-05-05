<x-base-layout>
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Siswa</h3>
    {{-- <a href="/admin/siswas/create" class="btn btn-outline-primary">+ Tambah Siswa</a> --}}
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form method="GET">
                    <div class="row">
                        <div class="col-4">
                            <x-select-field
                                label="Tahun Ajaran"
                                name="tahun"
                                id="filter-tahun"
                                :value="request('tahun', '')"
                                placeholder="Pilih Tahun Ajaran"
                                :options="$tahun"
                            />
                        </div>
                        <div class="col-4">
                            <x-select-field
                                label="Kelas"
                                name="kelas"
                                id="filter-kelas"
                                :value="request('kelas', '')"
                                placeholder="Pilih Kelas"
                                :options="$kelas"
                            />
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="my-auto">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                    Cari
                                </button>
                                <button type="reset" onclick="window.location.href = '/admin/siswa'" class="btn btn-danger">
                                    <i class="fa fa-refresh"></i>
                                    Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if(request('tahun') != '' && request('kelas')  != '')
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        @endif
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
                    url : "{{ route('guru.siswa.index') }}",
                    data : function(data){
                            data.tahun = $("#field-filter-tahun").val();
                            data.kelas = $("#field-filter-kelas").val();
                    }
                },
                columns: [
                    {data: 'nis', name: 'nis'},
                    {data: 'nisn', name: 'nisn'},
                    {data: 'nama', name: 'nama'},
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