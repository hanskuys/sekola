<x-base-layout>
    
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Tambah Absen</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <form action="{{ route('guru.absen.store') }}" method="POST">
                @csrf
                <input type="hidden" name="kelas_id" value=""/>
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
                            <x-input-field type="text" inputClass="tgl" name="tgl" id="tgl" label="Tanggal" placeholder="Tanggal"/>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th width="200px">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $i = 0;
                            @endphp
                            @foreach ($siswa as $s)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $s->nis ?? '-' }}</td>
                                    <td>{{ $s->nama }}</td>
                                    <td>
                                        <input type="hidden" name="lines[{{$i}}][siswa_id]" value="{{$s->id}}"/>
                                        <select class="form-control" name="lines[{{$i}}][status]">
                                            <option value="Hadir">Hadir</option>
                                            <option value="izin">Izin</option>
                                            <option value="Sakit">Sakit</option>
                                            <option value="Alpa">Alpa</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
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