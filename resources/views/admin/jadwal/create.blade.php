<x-base-layout>
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Tambah Jadwal Pelajaran</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.guru.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-4">
                            <x-select-field
                                label="Tahun Ajaran"
                                name="tahun"
                                id="filter-tahun"
                                value=""
                                placeholder="Pilih Tahun Ajaran"
                                :options="$tahun"
                            />
                        </div>
                        <div class="col-4">
                            <x-select-field
                                label="Kelas"
                                name="kelas"
                                id="filter-kelas"
                                value=""
                                placeholder="Pilih Kelas"
                                :options="$kelas"
                            />
                        </div>
                        <div class="col-4">
                            <x-select-field
                                label="Semester"
                                name="smt"
                                id="filter-smt"
                                value=""
                                placeholder="Pilih Semester"
                                :options="[['value' => 'Ganjil','label' => 'Ganjil'], ['value' => 'Genap','label' => 'Genap']]"
                            />
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Hari</th>
                                <th width="120px">Jam Mulai</th>
                                <th width="120px">Jam Selesai</th>
                                <th>Pelajaran</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0; $i < count($hari);  $i++)
                            <tr>
                                <td>
                                    {{ ucwords($hari[$i]) }}
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="hari[{{$hari[$i]}}]['jam_mulai']"/>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="hari[{{$hari[$i]}}]['jam_selesai']"/>
                                </td>
                                <td></td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
</x-base-layout>