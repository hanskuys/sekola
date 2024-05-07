<x-base-layout>
    @push('styles')
    @endpush

    <div class="page-heading email-application">
        <div class="page-title">
            <h3>Data Orang Tua / Wali</h3>
        </div>
    </div>
    <div class="page-content">
        <div class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('siswa.profil.detail') }}" method="POST">
                        @csrf
                    
                        <div class="row">
                            <div class="col-md-6">
                                <x-input-field type="text" name="nokk" id="nokk" label="Nomor Kartu Keluarga" value="{{ old('nokk', $data->nokk ?? '') }}" error="{{ $errors->first('nokk') }}" />
                            </div>
                            <div class="col-md-6">
                                <x-input-field type="text" name="no_akta" id="no_akta" label="Nomor Akta Kelahiran" value="{{ old('no_akta', $data->no_akta ?? '') }}" error="{{ $errors->first('no_akta') }}" />
                            </div>
                        </div>
                    
                        {{-- agama&kewarga --}}
                        <div class="row">
                            <div class="col-md-6">
                                <x-select-field
                                    label="Agama"
                                    name="agama"
                                    id="agama"
                                    value="{{ old('agama', $data->agama ?? '') }}"
                                    placeholder="Pilih Agama"
                                    :options="[
                                        ['value' => 'Islam', 'label' => 'Islam'],
                                        ['value' => 'Kristen Protestan', 'label' => 'Kristen Protestan'],
                                        ['value' => 'Kristen Katolik', 'label' => 'Kristen Katolik'],
                                        ['value' => 'Hindu', 'label' => 'Hindu'],
                                        ['value' => 'Budha', 'label' => 'Budha'],
                                        ['value' => 'Konghucu', 'label' => 'Konghucu']
                                    ]"
                                />
                            </div>
                            <div class="col-md-6">
                                <x-select-field
                                    label="Kewarganegaraan"
                                    name="kewarganegaraan"
                                    id="kewarganegaraan"
                                    value="{{ old('kewarganegaraan', $data->kewarganegaraan ?? '') }}"
                                    placeholder="Pilih Kewarganegaraan"
                                    :options="[
                                        ['value' => 'WNI', 'label' => 'WNI'],
                                        ['value' => 'WNA', 'label' => 'WNA']
                                    ]"
                                />
                            </div>
                        </div>
                    
                        {{-- kip&prestasi --}}
                        <div class="row">
                            <div class="col-md-6">
                                <x-input-field type="text" name="kip" id="kip" label="No Kartu Indonesia Pintar (No KIP) 6 Digit" value="{{ old('kip', $data->kip ?? '') }}" error="{{ $errors->first('kip') }}" />
                            </div>
                            <div class="col-md-6">
                                <x-input-field type="text" name="prestasi" id="prestasi" label="Prestasi" value="{{ old('prestasi', $data->prestasi ?? '') }}" error="{{ $errors->first('prestasi') }}" />
                            </div>
                        </div>
                    
                        {{-- jumlahsodara&anakke --}}
                        <div class="row">
                            <div class="col-md-6">
                                <x-input-field type="text" name="anak_ke" id="anak_ke" label="Anak Ke" value="{{ old('anak_ke', $data->anak_ke ?? '') }}" error="{{ $errors->first('anak_ke') }}" />
                            </div>
                            <div class="col-md-6">
                                <x-input-field type="text" name="jumlah_sodara" id="jumlah_sodara" label="Jumlah Sodara" value="{{ old('jumlah_sodara', $data->jumlah_sodara ?? '') }}" error="{{ $errors->first('jumlah_sodara') }}" />
                            </div>
                        </div>
                    
                        {{-- tb&bb --}}
                        <div class="row">
                            <div class="col-md-6">
                                <x-input-field type="text" name="tb" id="tb" label="Tinggi Badan" value="{{ old('tb', $data->tb ?? '') }}" error="{{ $errors->first('tb') }}" />
                            </div>
                            <div class="col-md-6">
                                <x-input-field type="text" name="bb" id="bb" label="Berat Badan" value="{{ old('bb', $data->bb ?? '') }}" error="{{ $errors->first('bb') }}" />
                            </div>
                        </div>
                    
                        {{-- tinggal_bersama&moda_transportasi --}}
                        <div class="row">
                            <div class="col-md-6">
                                <x-input-field type="text" name="tinggal_bersama" id="tinggal_bersama" label="Tinggal Bersama" value="{{ old('tinggal_bersama', $data->tinggal_bersama ?? '') }}" error="{{ $errors->first('tinggal_bersama') }}" />
                            </div>
                            <div class="col-md-6">
                                <x-input-field type="text" name="moda_transportasi" id="moda_transportasi" label="Moda Transportasi" value="{{ old('moda_transportasi', $data->moda_transportasi ?? '') }}" error="{{ $errors->first('moda_transportasi') }}" />
                            </div>
                        </div>
                    
                        {{-- lintang&bujur --}}
                        <div class="row">
                            <div class="col-md-6">
                                <x-input-field type="text" name="lintang" id="lintang" label="Koordinat Lintang" value="{{ old('lintang', $data->lintang ?? '') }}" error="{{ $errors->first('lintang') }}" />
                            </div>
                            <div class="col-md-6">
                                <x-input-field type="text" name="bujur" id="bujur" label="Koordinat Bujur" value="{{ old('bujur', $data->bujur ?? '') }}" error="{{ $errors->first('bujur') }}" />
                            </div>
                        </div>
                    
                        {{-- jarak&waktu --}}
                        <div class="row">
                            <div class="col-md-6">
                                <x-input-field type="text" name="jarak_rumah" id="jarak_rumah" label="Jarak Tempuh" value="{{ old('jarak_rumah', $data->jarak_rumah ?? '') }}" error="{{ $errors->first('jarak_rumah') }}" />
                            </div>
                            <div class="col-md-6">
                                <x-input-field type="text" name="waktu_tempuh" id="waktu_tempuh" label="Waktu Tempuh" value="{{ old('waktu_tempuh') }}" />                   
                            </div>
                        </div>
    
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>