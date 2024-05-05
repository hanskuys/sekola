<x-base-layout>
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Tambah Kelas</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.kelas.store') }}" method="POST">
                    @csrf
    
                    <div class="form-group">
                        <label for="basicInput">Nama Kelas</label>
                        <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" id="basicInput" placeholder="7A">
                        @error('kelas')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <fieldset class="form-group">
                        <label for="basicInput">Wali Kelas</label>
                        <select class="form-control @error('karyawan_id') is-invalid @enderror" id="karyawan_id" name="karyawan_id">
                            <option value="" selected disabled>Pilih Guru</option>
                            @foreach($karyawan as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('karyawan_id'))
                            <x-input-error :messages="$errors->get('karyawan_id')" class="mt-2" />
                        @endif
                    </fieldset>

                    
                    <div class="row">
                        <div class="col-4">
                            <x-input-field type="number" class="form-control" name="lk" id="field-lk" label="Maks Siswa Laki-Laki" placeholder="Laki-Laki" error="{{ $errors->first('lk') }}" />
                        </div>
                        <div class="col-4">
                            <x-input-field type="number" class="form-control" name="pr" id="field-pr" label="Maks Siswa Perempuan" placeholder="Perempuan" error="{{ $errors->first('pr') }}" />
                        </div>
                        <div class="col-4">
                            <x-input-field type="number" class="form-control" name="jml" id="field-total" label="Total Maks Siswa" readonly placeholder="Total" error="{{ $errors->first('jml') }}" />
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