<x-base-layout>
    <div class="page-heading d-flex justify-content-between items-center">
        <h3>Data Nilai</h3>
        <a href="{{ route('guru.nilai.create') }}" class="btn btn-outline-primary">
            <i class="fa fa-plus"></i>
            Tambah Nilai
        </a>
    </div>
    
    <div class="page-content">
        <section class="section">
            {{-- <div class="card">
                <div class="card-body">
                    <form method="GET">
                        <div class="row">
                            <div class="col-3">
                                <x-select-field
                                    label="Tahun Ajaran"
                                    name="tahun"
                                    id="filter-tahun"
                                    :value="request('tahun', '')"
                                    placeholder="Pilih Tahun Ajaran"
                                    :options="$tahun"
                                />
                            </div>
                            <div class="col-3">
                                <x-select-field
                                    label="Semester"
                                    name="smt"
                                    id="filter-smt"
                                    :value="request('smt', '')"
                                    placeholder="Pilih Semester"
                                    :options="[['value' => 'Ganjil','label' => 'Ganjil'], ['value' => 'Genap','label' => 'Genap']]"
                                />
                            </div>
                            <div class="col-3">
                                <x-select-field
                                    label="Mata Pelajaran"
                                    name="Pelajaran"
                                    id="filter-Pelajaran"
                                    :value="request('pelajaran', '')"
                                    placeholder="Pilih Pelajaran"
                                    :options="$pelajaran"
                                />
                            </div>
                            <div class="col-md-3 d-flex">
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
            </div> --}}
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Pelajaran</th>
                                <th>Jenis Nilai</th>
                                <th>Kelas</th>
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
                        url : "{{ route('guru.nilai.index') }}",
                        data : function(data){
                                data.tahun = $("#field-filter-tahun").val();
                                data.kelas = $("#field-filter-kelas").val();
                        }
                    },
                    columns: [
                        {data: 'created_at', name: 'created_at'},
                        {data: 'pelajaran.nama', name: 'pelajaran.nama'},
                        {data: 'jenis', name: 'jenis'},
                        {data: 'kelas.nama', name: 'kelas.nama'},
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