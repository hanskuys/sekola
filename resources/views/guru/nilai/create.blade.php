<x-base-layout>
    
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Tambah Nilai</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <form action="{{ route('guru.nilai.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                                <x-select-field
                                label="Tahun Ajaran"
                                name="tahun"
                                id="tahun"
                                :value="request('tahun', '')"
                                placeholder="Pilih Tahun Ajaran"
                                :options="$tahun"
                                />
                        </div>
                        <div class="col-md-4">
                            <x-select-field
                            label="Semester"
                            name="smt"
                            id="smt"
                            :value="request('smt', '')"
                            placeholder="Pilih Semester"
                            :options="[
                                ['value' => 'Ganjil','label' => 'Ganjil'], 
                                ['value' => 'Genap','label' => 'Genap']
                            ]"
                            />
                        </div>
                        <div class="col-md-4">
                            <x-select-field
                            label="Jenis Nilai"
                            name="type"
                            id="type"
                            placeholder="Pilih Jenis Nilai"
                            :options="[
                                ['value' => 'Ulangan 1','label' => 'Ulangan 1'], 
                                ['value' => 'Ulangan 2','label' => 'Ulangan 2'], 
                                ['value' => 'Ulangan 3','label' => 'Ulangan 3'], 
                                ['value' => 'Ulangan 4','label' => 'Ulangan 4'], 
                                ['value' => 'Ulangan 5','label' => 'Ulangan 5'], 
                                ['value' => 'Ulangan 6','label' => 'Ulangan 6'], 
                                ['value' => 'PUS','label' => 'PUS'],
                                ['value' => 'ASAJ','label' => 'ASAJ']
                            ]"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <x-select-field
                            label="Pelajaran"
                            name="pelajaran"
                            id="pelajaran"
                            placeholder="Pilih Pelajaran"
                            :options="$pelajaran"
                            disabled="true"
                            />
                        </div>
                        <div class="col-md-4">
                            <x-select-field
                            label="Kelas"
                            name="kelas_id"
                            id="kelas_id"
                            placeholder="Pilih Kelas"
                            :options="$kelas"
                            disabled="true"
                            />
                        </div>
                    </div>
                </div>
                <div class="card-body p-0 d-none" id="detail-siswa">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th width="200px">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="card-body">
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

@push('scripts')
    <script>
        var kelas = $("#field-kelas_id");
        var pelajaran =  $("#field-pelajaran");
        var siswaList =  $("#detail-siswa");

        $(document).ready(function() {

            $("#field-tahun").on("change", function(e){
                e.preventDefault();
                if($(this).val() != ""){
                    pelajaran.prop('disabled', false);
                }else{
                    pelajaran.prop('disabled', true);
                }
            });
            
            pelajaran.on("change", function(e){
                e.preventDefault();
                if($(this).val() != ""){
                    kelas.prop('disabled', false);
                }else{
                    kelas.prop('disabled', true);
                }
            });

            kelas.on("change", function(e){
                e.preventDefault();
                if($(this).val() != ""){
                    // kelas.prop('disabled', false);
                    fetchSiswa();
                }else{
                    // kelas.prop('disabled', true);
                }
            });
        });

        function fetchSiswa()
        {
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                url:  "{{ route('guru.siswa.data') }}",
                data: {
                    'kelas_id' : kelas.val(),
                    'tahun_id' : $("#field-tahun").val(),
                },
                dataType: 'json',
                success: function (response) {
                    // console.log(response);
                    if(response.length){
                        var tbody = $('table tbody');
                        $.each(response, function(index, data) {
                            // Create a new row
                            var row = $('<tr>');

                            // Add columns to the row
                            row.append('<td>' + (index + 1) + '</td>');
                            row.append('<td>' + (data.nis ? data.nis : '') + '</td>');
                            row.append('<td>' + data.nama + '</td>');
                            row.append(`<td>
                                <input type="hidden" class="form-control" name="line[${index}][siswa_id]" value="${data.id}"/>
                                <input type="number" class="form-control" name="line[${index}][nilai]"/>
                            </td>`); // Input field for Nilai

                            // Append the row to the table body
                            tbody.append(row);
                        });

                        siswaList.removeClass('d-none');
                    }
                },
                error: function (error) {

                }
            });
        }
    </script>
@endpush
</x-base-layout>