<x-base-layout>
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Jadwal Pelajaran</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form method="GET" id="formFilter">
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
                                label="Kelas"
                                name="kelas"
                                id="filter-kelas"
                                :value="request('kelas', '')"
                                placeholder="Pilih Kelas"
                                :options="$kelas"
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
                        <div class="col-md-3 d-flex">
                            <div class="my-auto">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                    Cari
                                </button>
                                <button type="button" class="btn btn-danger" onclick="reset()">
                                    <i class="fa fa-refresh"></i>
                                    Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card d-none" id="jadwal-list">
            <div class="card-body p-0">
                <table class="table table-bordered" id="jadwalTable">
                    <thead>
                        <tr>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Pelajaran</th>
                            <th>Guru</th>
                            <th width="112px">
                                <button type="button" class="btn btn-sm btn-primary block" id="btnOpenModal">
                                    <i class="fa fa-plus me-1"></i>
                                    Tambah
                                </button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <div class="modal fade text-left modal-borderless" id="modalForm" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" id="myForm" onsubmit="return false;" >
                <input type="hidden" id="field-id" name="id" value=""/>
                <div class="modal-header">
                    <h5 class="modal-title">Tambah/Edit Pelajaran</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <x-select-field
                    label="Hari"
                    name="hari"
                    id="hari"
                    placeholder="Pilih Hari"
                    :options="$hari"
                    />

                    <div class="row">
                        <div class="col-md-6">
                            <x-input-field type="text" inputClass="jam" name="jam_mulai" id="jam_mulai" label="Jam Mulai" placeholder="Masukan Jam Mulai" error="{{ $errors->first('jam_mulai') }}" />
                        </div>
                        <div class="col-md-6">
                            <x-input-field type="text" inputClass="jam" name="jam_selesai" id="jam_selesai" label="Jam Selesai" placeholder="Masukan Jam Selesai" error="{{ $errors->first('jam_selesai') }}" />
                        </div>
                    </div>
                    
                    <x-select-field
                    label="Pelajaran"
                    name="pelajaran"
                    id="pelajaran"
                    placeholder="Pilih Pelajaran"
                    :options="$pelajaran"
                    />

                    
                    <x-select-field
                    label="Guru"
                    name="guru"
                    id="guru"
                    placeholder="Pilih Guru"
                    disabled
                    :options="[]"
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
</div>

@push('scripts')
    <script>
        var tahun = $("#field-filter-tahun").val();
        var kelas = $("#field-filter-kelas").val();
        var smt = $("#field-filter-smt").val();
        var table;
        const calendars = $(".jam").flatpickr({
            enableTime: true,
            noCalendar: true,
            time_24hr : true,
            allowInput:true
        });

        calendars[0].config.onClose = [() => {
            setTimeout(() => calendars[1].open(), 1);
        }];

        calendars[0].config.onChange = [(selDates) => {
            calendars[1].set("minDate", selDates[0]);
        }];

        calendars[1].config.onChange = [(selDates) => {
            calendars[0].set("maxDate", selDates[0]);
        }]

        $(document).ready(function() {
            
            if(tahun != "" && kelas != "" && smt != "")
            {
                fetchData();
            }

            $('#btnOpenModal').click(function () {
                $('#myForm').trigger("reset");
                $("#myForm").find('#field-id').val('');
                $("#myForm").find('h5.modal-title').text('Tambah Pelajaran');
                $('#modalForm').modal('show');
            });

            $("#field-pelajaran").on("change", function(e){
                e.preventDefault();

                if($(this).val() != ""){
                    $("#field-guru").prop('disabled', false);

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "GET",
                        url:  "{{ route('admin.pelajaran.guru') }}",
                        data: {
                            'tahun_id' : $("#field-filter-tahun").val(),
                            'pelajaran_id' : $("#field-pelajaran").val(),
                            'smt' : $("#field-filter-smt").val()
                        },
                        dataType: 'json',
                        success: function (response) {
                            // console.log(response);
                            $.each(response, function(index, value) {
                                $("#field-guru").append('<option value="' + value.id + '">' + value.nama + '</option>');
                            });
                        },
                        error: function (error) {

                        }
                    });

                }else{
                    $("#field-guru").prop('disabled', true);
                    $("#field-guru").find('option').not(':first').remove();
                }


            });
            
            $('#myForm').submit(function (e) {
                e.preventDefault();

                var formData = new FormData(this);
                formData.append('smt', smt);
                formData.append('tahun_id', tahun);
                formData.append('kelas_id', kelas);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url:  "{{ route('admin.jadwal.store') }}",// Pastikan URL sesuai dengan route untuk menyimpan data tahun ajaran
                    data: formData,
                    contentType: false, // Karena menggunakan FormData, set contentType ke false
                    processData: false, // Karena menggunakan FormData, set processData ke false
                    success: function (response) {
                        $('#modalForm').modal('hide'); // Menutup modal setelah data berhasil disimpan
                        fetchData();

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
                    },
                    error: function (error) {
                        // console.log(error.responseJSON);
                        const data = error.responseJSON;
                        $.each(data.errors, function (key, value) {
                            $('#field-' + key).addClass('is-invalid');
                            $('#error-' + key).text(value[0]);
                        });
                        Swal.fire({
                            title: 'Error!',
                            text: data.message,
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


        function reset()
        {
            $("#formFilter")[0].reset() 
            $("#jadwal-list").addClass('d-none');
        }

        function fetchData()
        {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                url:  "{{ route('admin.jadwal.index') }}",
                data: {
                    'tahun_id' : $("#field-filter-tahun").val(),
                    'kelas_id' : $("#field-filter-kelas").val(),
                    'smt' : $("#field-filter-smt").val()
                },
                dataType: 'json',
                success: function (response) {
                    var rows = createTableRows(response);
                    $("#jadwalTable").find('tbody').html(rows);
                    $("#jadwal-list").removeClass('d-none');
                },
                error: function (error) {

                }
            });
        }

        function showJadwal(){

        }

        function showEmpty()
        {
            
        }
        function getHariName(index) {
            var hariNames = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            return hariNames[index];
        }

        // Function to create table rows from JSON data
        function createTableRows(data) {
            var rows = '';
            var prevHari = null;
            var rowspan = 0;
            
            $.each(data, function(index, item) {
                var pelajaran = item.pelajaran.nama;
                var guru = item.guru.nama;
                var waktuMulai = moment(item.jam_mulai, 'HH:mm:ss').format('HH:mm');
                var waktuSelesai = moment(item.jam_selesai, 'HH:mm:ss').format('HH:mm');
                var waktu = waktuMulai + ' - ' + waktuSelesai;
                var button = createActionButton(item.id);
                if (item.hari !== prevHari) {
                    if (prevHari !== null) {
                        rows += '</tr>';
                    }
                    rowspan = data.filter(function(row) {
                        return row.hari === item.hari;
                    }).length;
                    
                    var hari = getHariName(item.hari);
                    
                    rows += '<tr>';
                    rows += '<td rowspan="' + rowspan + '">' + hari + '</td>';
                    rows += '<td>' + waktu + '</td>';
                    rows += '<td>' + pelajaran + '</td>';
                    rows += '<td>' + guru + '</td>';
                    rows += '<td>' + button + '</td>';
                } else {

                    rows += '<tr>';
                    rows += '<td>' + waktu + '</td>';
                    rows += '<td>' + pelajaran + '</td>';
                    rows += '<td>' + guru + '</td>';
                    rows += '<td>' + button + '</td>';
                }
                
                prevHari = item.hari;
            });
            
            rows += '</tr>'; // Close the last row
            return rows;
        }

        function createActionButton(id)
        {
            var btn = '<div class="dropdown">';
            btn += '<button class="btn btn-primary btn-sm w-100 dropdown-toggle me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
            btn += 'Aksi';
            btn += '</button>';
            btn += '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">';
            btn += `<a class="dropdown-item" href="javascript:void(0);" onclick="ubah(${id})">Ubah</a>`;
            btn += `<a class="dropdown-item" href="javascript:void(0);" onclick="hapus(${id})">Hapus</a>`;
            btn += '</div>';
            btn += '</div>';

            return btn
        }

        function ubah(id)
            {
                $.ajax({
                    url: "/admin/jadwal/"+id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $("#myForm").find('#field-id').val(id);
                        $('#myForm').find('h5.modal-title').text('Ubah Jadwal');
                        $('#field-hari').val(data.hari);
                        $('#field-jam_mulai').val(data.jam_mulai);
                        $('#field-jam_selesai').val(data.jam_selesai);
                        $('#field-pelajaran').val(data.pelajaran_id);
                        $('#field-pelajaran').trigger('change');
                        $('#field-guru').val(data.guru_id);
                        $('#modalForm').modal('show');
                    },
                    error: function (error) {
                        console.log(error);
                        alert('Data tidak ditemukan!');
                    }
                });
            }
        
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
                    url: "/admin/jadwal/" + id +"/delete",
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
                        // table.draw(); // Refresh DataTable
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