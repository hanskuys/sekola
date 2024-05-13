<x-base-layout>

<div class="page-heading d-flex justify-content-between items-center">
    <h3>Edit Kelas</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.kelas.update', $data->id)}}" method="POST">
                    @csrf
                    <x-input-field type="text"  name="nama" id="nama" label="Nama Lengkap" value="{{ $data->nama}}" placeholder="Masukan Nama Lengkap" error="{{ $errors->first('nama') }}" />
                    <div class="form-group">
                        <label for="basicInput">Wali Kelas</label>
                        <select class="form-control @error('karyawan_id') is-invalid @enderror" id="karyawan_id" name="karyawan_id">
                            <option value="" selected disabled>Pilih Guru</option>
                            @foreach($karyawan as $karyawanItem)
                                <option value="{{ $karyawanItem->id }}" {{ $data->karyawan_id == $karyawanItem->id ? 'selected="selected"' : '' }}>{{ $karyawanItem->nama }}</option>
                            @endforeach
                        </select>
                        @error('karyawan_id')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Maksimal Siswa</label>
                        <div class="row">
                            <div class="col-4">
                                <input type="number" class="form-control @error('lk') is-invalid @enderror" value="{{ $data->lk }}" name="lk" id="field-lk" placeholder="Laki-Laki">
                                @error('lk')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <input type="number" class="form-control @error('pr') is-invalid @enderror" value="{{ $data->pr }}" name="pr" id="field-pr" placeholder="Perempuan">
                                @error('pr')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <input type="number" class="form-control @error('jml') is-invalid @enderror" value="{{ $data->jml }}" name="jml" id="field-total" readonly placeholder="Total">
                                @error('jml')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@push('scripts')

<script>

    $(document).ready(function() {


    $("#field-lk, #field-pr").on("change", function(e){


        var lk = $("#field-lk").val() != "" ? $("#field-lk").val() : 0;
        var pr = $("#field-pr").val() != "" ?  $("#field-pr").val() : 0;

        var total = parseInt(lk) + parseInt((pr));

        $("#field-total").val(total);

    });
 });
</script>    
@endpush
</x-base-layout>