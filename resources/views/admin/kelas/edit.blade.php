@extends('dashboard.admin.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Edit Kelas</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/admin/kategori-kelases/{{ $kelas->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                        <label for="basicInput">Nama Kelas</label>
                        <input type="text" value="{{ $kelas->kelas }}" class="form-control @error('kelas') is-invalid @enderror" name="kelas" id="basicInput" placeholder="7A">
                        @error('kelas')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Wali Kelas</label>
                        <select class="form-control @error('karyawan_id') is-invalid @enderror" id="karyawan_id" name="karyawan_id">
                            <option value="" selected disabled>Pilih Guru</option>
                            @foreach($karyawan as $karyawanItem)
                                <option value="{{ $karyawanItem->id }}" {{ $kelas->karyawan_id == $karyawanItem->id ? 'selected="selected"' : '' }}>{{ $karyawanItem->nama }}</option>
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
                                <input type="number" class="form-control @error('lk') is-invalid @enderror" value="{{ $kelas->lk }}" name="lk" id="field-lk" placeholder="Laki-Laki">
                                @error('lk')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <input type="number" class="form-control @error('pr') is-invalid @enderror" value="{{ $kelas->pr }}" name="pr" id="field-pr" placeholder="Perempuan">
                                @error('pr')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <input type="number" class="form-control @error('jml') is-invalid @enderror" value="{{ $kelas->jml }}" name="jml" id="field-total" readonly placeholder="Total">
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
@endsection
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