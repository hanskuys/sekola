@extends('dashboard.siswa.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Diri</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/siswa/data-tambahan/update/{{ $data->id ?? 'new' }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method($data ? 'put' : 'post')
                    
                    {{-- asal_sekolah&nis --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Asal Sekolah</label>
                                <input type="text" name="asal_sekolah" class="form-control" value="{{ old('asal_sekolah', $data->asal_sekolah ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Nomor Induk Siswa</label>
                                <input type="text" name="nis" class="form-control" value="{{ old('nis', $data->nis ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    {{-- NoPeserta&NoIjazah --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Nomor Peserta</label>
                                <input type="text" name="nomor_peserta" class="form-control" value="{{ old('nomor_peserta', $data->nomor_peserta ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Nomor Ijazah</label>
                                <input type="text" name="nomor_ijasah" class="form-control" value="{{ old('nomor_ijasah', $data->nomor_ijasah ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    {{-- hobby&cita --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Hobby</label>
                                <input type="text" name="hobi" class="form-control" value="{{ old('hobi', $data->hobi ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Cita-cita</label>
                                <input type="text" name="cita_cita" class="form-control" value="{{ old('cita_cita', $data->cita_cita ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    <hr>
                    
                    {{-- Doc Ijazah --}}
                    <div class="form-group">
                        <label for="doc_ijasah">Scan Ijazah</label>
                        <input type="file" name="doc_ijasah" class="form-control mb-4" id="doc_ijasah" onchange="previewImage(this)">
                        @if(isset($data) && $data->doc_ijasah)
                            <img id="doc_ijasah_preview" src="{{ asset('storage/images/dokumenPendaftaran/' . $data->doc_ijasah) }}" alt="Preview" style="max-width: 100%; max-height: 200px;">
                        @else
                            <img id="doc_ijasah_preview" src="" alt="Preview" style="max-width: 100%; max-height: 200px; display: none;">
                        @endif
                    </div>
                    {{-- Doc akte --}}
                    <div class="form-group">
                        <label for="basicInput">Scan Akte</label>
                        <input type="file" name="doc_akte" class="form-control mb-4" id="doc_akte" onchange="previewImage(this)">
                        @if(isset($data) && $data->doc_akte)
                            <img id="doc_akte_preview" src="{{ asset('storage/images/dokumenPendaftaran/' . $data->doc_akte) }}" alt="Preview" style="max-width: 100%; max-height: 200px;">
                        @else
                            <img id="doc_akte_preview" src="" alt="Preview" style="max-width: 100%; max-height: 200px; display: none;">
                        @endif
                    </div>

                    {{-- Doc kk --}}
                    <div class="form-group">
                        <label for="basicInput">Scan Kartu Keluarga</label>
                        <input type="file" name="doc_kk" class="form-control mb-4" id="doc_kk" onchange="previewImage(this)">
                        @if(isset($data) && $data->doc_kk)
                            <img id="doc_kk_preview" src="{{ asset('storage/images/dokumenPendaftaran/' . $data->doc_kk) }}" alt="Preview" style="max-width: 100%; max-height: 200px;">
                        @else
                            <img id="doc_kk_preview" src="" alt="Preview" style="max-width: 100%; max-height: 200px; display: none;">
                        @endif
                    </div>

                    {{-- Doc ktp --}}
                    <div class="form-group">
                        <label for="basicInput">Scan KTP Orang Tua</label>
                        <input type="file" name="doc_ktp" class="form-control mb-4" id="doc_ktp" onchange="previewImage(this)">
                        @if(isset($data) && $data->doc_ktp)
                            <img id="doc_ktp_preview" src="{{ asset('storage/images/dokumenPendaftaran/' . $data->doc_ktp) }}" alt="Preview" style="max-width: 100%; max-height: 200px;">
                        @else
                            <img id="doc_ktp_preview" src="" alt="Preview" style="max-width: 100%; max-height: 200px; display: none;">
                        @endif
                    </div>
                    
                    {{-- Doc kip --}}
                    <div class="form-group">
                        <label for="basicInput">Scan Kartu Indonesia Pintar</label>
                        <input type="file" name="doc_kip" class="form-control mb-4" id="doc_kip" onchange="previewImage(this)">
                        @if(isset($data) && $data->doc_kip)
                            <img id="doc_kip_preview" src="{{ asset('storage/images/dokumenPendaftaran/' . $data->doc_kip) }}" alt="Preview" style="max-width: 100%; max-height: 200px;">
                        @else
                            <img id="doc_kip_preview" src="" alt="Preview" style="max-width: 100%; max-height: 200px; display: none;">
                        @endif
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
{{-- preview Akte --}}
    <script>
        function previewImage(input) {
            var preview = document.getElementById('doc_akte_preview');
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
{{-- preview kk --}}
    <script>
        function previewImage(input) {
            var preview = document.getElementById('doc_kk_preview');
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
{{-- preview ktp --}}
    <script>
        function previewImage(input) {
            var preview = document.getElementById('doc_ktp_preview');
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
{{-- preview kip --}}
    <script>
        function previewImage(input) {
            var preview = document.getElementById('doc_kip_preview');
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