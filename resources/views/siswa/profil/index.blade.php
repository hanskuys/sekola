<x-base-layout>
    @push('styles')
    @endpush

    <div class="page-heading email-application">
        <div class="page-title">
            <h3>Biodata</h3>
            <p class="text-subtitle text-muted">
                Informasi data diri siswa
            </p>
        </div>
    </div>
    <div class="page-content">
        <div class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('siswa.profil.index') }}" method="POST">
                        @csrf
                    
                        <div class="row">
                            <div class="col-md-6">
                                <x-input-field type="text" name="nama" id="nama" label="Nama Lengkap" value="{{ old('nama', $data->nama ?? '') }}" error="{{ $errors->first('nama') }}" />
                            </div>
                            <div class="col-md-6">
                                <x-select-field
                                    label="Jenis Kelamin"
                                    name="jk"
                                    id="jk"
                                    value="{{ old('jk', $data->jenis_kelamin) }}"
                                    placeholder="Pilih Jenis Kelamin"
                                    :options="[
                                        ['value' => 'L', 'label' => 'Laki-Laki'],
                                        ['value' => 'P', 'label' => 'Perempuan']
                                    ]"
                                />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Tempat Tanggal Lahir</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"  value="{{ old('tempat_lahir', $data->tempat_lahir) }}" placeholder="" value="{{ old('tempat_lahir')}}">
                                    @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    
                                    <input type="date" class="form-control tgl @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="basicInput" value="{{ old('tanggal_lahir', $data->tanggal_lahir)}}" placeholder="">
                                    @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-input-field type="text" name="nisn" id="nisn" label="NISN (Nomor Induk Siswa Nasional)" placeholder="Masukan NISN" value="{{ old('nisn', $data->nisn) }}" error="{{ $errors->first('nisn') }}" />

                            </div>
                            <div class="col-md-6">
                                <x-input-field type="text" name="no_tlp" id="no_tlp" label="No Telepon/HP" placeholder="Masukan No Telepon/HP" value="{{ old('no_tlp', $data->no_tlp) }}"  error="{{ $errors->first('no_tlp') }}" />
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label for="basicInput">Alamat Lengkap Rumah</label>
                            <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="basicInput" placeholder="" rows="4">{{ old('alamat', $data->alamat) }}</textarea>
                            @error('alamat')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
        
        
                        <div class="row">
                            <div class="col-md-6">
                                <x-input-field type="text" name="email" id="email" label="E-mail" placeholder="Masukan E-mail" value="{{ old('email', $data->email) }}" error="{{ $errors->first('email') }}" />
                            </div>
        
                            <div class="col-md-6">
                                <x-input-field type="password" name="password" id="password" label="Password" placeholder="Masukan Password" error="{{ $errors->first('password') }}" />
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