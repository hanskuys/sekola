<x-base-layout>
    @push('styles')
    @endpush

    <div class="page-heading email-application">
        <div class="page-title">
            <h3>Data Dapodik</h3>
        </div>
    </div>
    <div class="page-content">
        <div class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('siswa.profil.dapodik') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="row">
                            <div class="col-md-6">
                                <x-input-field type="text" name="asal_sekolah" id="asal_sekolah" label="Asal Sekolah" value="{{ old('asal_sekolah', $data->asal_sekolah ?? '') }}" error="{{ $errors->first('asal_sekolah') }}" />
                            </div>
                            <div class="col-md-6">
                                <x-input-field type="text" name="nis" id="nis" label="NIS" value="{{ old('nis', $data->nis ?? '') }}" error="{{ $errors->first('nis') }}" />
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <x-input-field type="text" name="nomor_peserta" id="nomor_peserta" label="Nomor Peserta Ujian" value="{{ old('nomor_peserta', $data->nomor_peserta ?? '') }}" error="{{ $errors->first('nomor_peserta') }}" />
                            </div>
                            <div class="col-md-6">
                                <x-input-field type="text" name="nomor_ijasah" id="nomor_ijasah" label="Nomor Seri Ijazah" value="{{ old('nomor_ijasah', $data->nomor_ijasah ?? '') }}" error="{{ $errors->first('nomor_ijasah') }}" />
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <x-input-field type="text" name="hobi" id="hobi" label="Hobi" value="{{ old('hobi', $data->hobi ?? '') }}" error="{{ $errors->first('hobi') }}" />
                            </div>
                            <div class="col-md-6">
                                <x-input-field type="text" name="cita_cita" id="cita_cita" label="Cita-Cita" value="{{ old('cita_cita', $data->cita_cita ?? '') }}" error="{{ $errors->first('cita_cita') }}" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <x-input-field type="file" name="doc_ijazah" id="doc_ijazah" label="Scan Ijazah" value="{{ old('doc_ijazah', $data->doc_ijazah ?? '') }}" error="{{ $errors->first('doc_ijazah') }}" />
                                <x-input-field type="file" name="doc_akte" id="doc_akte" label="Scan Akta Kelahiran" value="{{ old('doc_akte', $data->doc_akte ?? '') }}" error="{{ $errors->first('doc_akte') }}" />
                                <x-input-field type="file" name="doc_kip" id="doc_kip" label="Scan Kartu Indonesia Pintar" value="{{ old('doc_kip', $data->doc_kip ?? '') }}" error="{{ $errors->first('doc_kip') }}" />

                            </div>
                            <div class="col-md-6">
                                <x-input-field type="file" name="doc_kk" id="doc_kk" label="Scan Kartu Keluarga" value="{{ old('doc_kk', $data->doc_kk ?? '') }}" error="{{ $errors->first('doc_kk') }}" />
                                <x-input-field type="file" name="doc_ktp" id="doc_ktp" label="Scan KTP Orang Tua/Wali" value="{{ old('doc_ktp', $data->doc_ktp ?? '') }}" error="{{ $errors->first('doc_ktp') }}" />

                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <link rel="stylesheet" href="{{asset("assets/extensions/choices.js/public/assets/styles/choices.css")}}">
    @endpush
    
    @push('scripts')
    <script src="{{ asset("assets/extensions/choices.js/public/assets/scripts/choices.js") }}"></script>
    <script src="{{ asset("assets/js/pages/form-element-select.js") }}"></script>
    
    {{-- preview Ijazah --}}
        <script>
            function previewImage(input) {
                var preview = document.getElementById('doc_ijasah_preview');
                var fileInput = input.files[0];
    
                if (fileInput) {
                    var reader = new FileReader();
    
                    reader.onload = function (e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    };
    
                    reader.readAsDataURL(fileInput);
                } else {
                    preview.src = '';
                    preview.style.display = 'none';
                }
            }
        </script>
    @endpush
</x-base-layout>