<x-base-layout>
    <div class="page-heading d-flex justify-content-between items-center">
        <h3>Pengajar {{ $data->nama }}</h3>

        <button type="button" class="btn btn-outline-primary block" id="btnOpenModal">
            Tambah Pengajar
        </button>
    </div>
    
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped w-100" id="datatable">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
    
        </section>
    </div>

    <div class="modal fade text-left modal-borderless" id="modalForm" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form method="POST" id="myForm" onsubmit="return false;" >
                <input type="hidden" id="field-pelajaran_id" name="pelajaran_id" value="{{ $data->id }}"/>
                <input type="hidden" id="field-id" name="id" value=""/>
                <div class="modal-header">
                    <h5 class="modal-title">Tambah/Edit Pengajar</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <x-select-field
                        label="Guru"
                        name="guru_id"
                        id="guru_id"
                        placeholder="Pilih Guru"
                        :options="$guru"
                        isAjax="true"
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

    @push('scripts')
        <script>
            $(document).ready(function () {
    
                var table = $('#datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    ajax: {
                        url: "{{ route('admin.pelajaran.show', $data->id) }}",
                        data: function (data) {}
                    },
                    columns: [
                        {
                            data: 'nip',
                            name: 'nip'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
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
                $('#btnOpenModal').click(function () {
                    $('#myForm').trigger("reset");
                    $("#myForm").find('#field-id').val('');
                    $("#myForm").find('h5.modal-title').text('Tambah Pengajar');
                    $('#modalForm').modal('show');
                });
    
                // AJAX untuk menambahkan data
                $('#myForm').submit(function (e) {
                    e.preventDefault(); // Mencegah form melakukan submit secara default (reload page)
                    var url = '';
                    var pelajaran_id = $("#myForm").find('#field-id').val();
                    var id = $("#myForm").find('#field-id').val();
                    if(id != ''){
                        url = "/admin/master/pelajaran/guru/update";
                    }else{
                        url = "{{ route('admin.pelajaran.guru.store')}}";
                    }
    
                    var formData = new FormData(this); // Menggunakan FormData untuk mengumpulkan data dari form
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url:  url,// Pastikan URL sesuai dengan route untuk menyimpan data tahun ajaran
                        data: formData,
                        contentType: false, // Karena menggunakan FormData, set contentType ke false
                        processData: false, // Karena menggunakan FormData, set processData ke false
                        success: function (response) {
                            $('#modalForm').modal('hide'); // Menutup modal setelah data berhasil disimpan
                            table.draw(); // Refresh DataTable
    
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
                            console.log(error);
                            $.each(error.responseJSON, function (key, value) {
                                $('#field-' + key).addClass('is-invalid');
                                $('#error-' + key).text(value[0]);
                            });
                            
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
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
    
                // Tambahkan fungsi untuk edit dan delete dengan cara yang serupa
            });
    
            function ubah(id)
            {
                $.ajax({
                    url: "/admin/master/pelajaran/"+id+"/edit",
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $("#myForm").find('#field-id').val(id);
                        $('#myForm').find('h5.modal-title').text('Ubah Tahun Ajaran');
                        $('#myForm').find('input[name="nama"]').val(data.nama);
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
                    url: "/admin/master/tahun-ajaran/" + id +"/delete",
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