<x-auth-layout>
    <div class="page-heading d-flex justify-content-center items-center">
        <h3>Formulir Pendaftaran Akun</h3>
    </div>
    
    <div class="page-content">
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('daftar') }}" method="post">
                                @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Lengkap</label>
                                        <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa" id="basicInput" placeholder="">
                                        @error('nama_siswa')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicSelect">Jenis Kelamin</label>
                                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="basicSelect">
                                            <option selected hidden>Pilih Jenis Kelamin</option>
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
            
                            {{-- ttl --}}
                            <div class="form-group">
                                <label for="basicInput">Tempat Tanggal Lahir</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="basicInput" placeholder="">
                                        @error('tempat_lahir')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        
                                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="basicInput" placeholder="">
                                        @error('tanggal_lahir')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
            
                            {{-- nis&nik --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">NISN (Nomor Induk Siswa Nasional)</label>
                                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="basicInput" placeholder="">
                                        @error('nisn')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">No Telepon/HP</label>
                                        <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" name="no_tlp" id="basicInput" placeholder="+62">
                                        @error('no_tlp')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
            
                                <div class="form-group">
                                    <label for="basicInput">Alamat Lengkap Rumah</label>
                                    <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="basicInput" placeholder="" rows="4"></textarea>
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
            
            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="basicInput">E-mail</label>
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror form-control-xl"
                                            placeholder="Email">
                                        <div class="form-control-icon">
                                            <i class="bi bi-at"></i>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-md-6">
                                    <div>
                                        <label for="password">Password</label>
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <input type="password" name="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror form-control-xl" placeholder="Password">
                                            <div class="form-control-icon">
                                                <i class="bi bi-shield-lock"></i>
                                            </div>
                                        </div>
                                        @error('password')
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
                </div>
            </div>
        </section>
    </div>
</x-auth-layout>