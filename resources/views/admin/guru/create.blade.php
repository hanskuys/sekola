<x-base-layout>
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Tambah Data Guru</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.guru.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <x-input-field type="text"  name="nip" id="nip" label="NIP" placeholder="Masukan NIP" error="{{ $errors->first('nip') }}" />
                                
                            <x-input-field type="text"  name="nuptk" id="nuptk" label="NUPTK" placeholder="Masukan NUPTK" error="{{ $errors->first('nuptk') }}" />

                            <x-input-field type="text"  name="tmp_lahir" id="tmp_lahir" label="Tenpat Lahir" placeholder="Masukan Tenpat Lahir" error="{{ $errors->first('tmp_lahir') }}" />
                            
                            <x-select-field
                                label="Jenis Kelamin"
                                name="jk"
                                id="jk"
                                value=""
                                placeholder="Pilih Jenis Kelamin"
                                :options="[
                                    ['value' => 'L', 'label' => 'Laki-Laki'],
                                    ['value' => 'P', 'label' => 'Perempuan']
                                ]"
                            />
                            <x-input-field type="text"  name="email" id="email" label="Alamat Email" placeholder="Masukan Email" error="{{ $errors->first('email') }}" />


                        </div>
                        <div class="col-md-6">
                            <x-input-field type="text"  name="nbm" id="nbm" label="NBM" placeholder="Masukan NBM" error="{{ $errors->first('nbm') }}" />
                            
                            <x-input-field type="text"  name="nama" id="nama" label="Nama Lengkap" placeholder="Masukan Nama Lengkap" error="{{ $errors->first('nama') }}" />

                            <x-input-field type="text" inputClass="tgl" name="tgl_lahir" id="tgl_lahir" label="Tanggal Lahir" placeholder="Masukan Tanggal Lahir" error="{{ $errors->first('tgl_lahir') }}" />

                            <x-input-field type="text" inputClass="tgl" name="tgl_mulai" id="tgl_mulai" label="Tanggal Mulai" placeholder="Masukan Tanggal Mulai" error="{{ $errors->first('tgl_mulai') }}" />

                            <x-input-field type="text"  name="password" id="password" label="Password" placeholder="Masukan Tanggal Lahir" error="{{ $errors->first('password') }}" />

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
</x-base-layout>