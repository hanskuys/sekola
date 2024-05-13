<x-base-layout>
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Nilai</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card overflow-auto">
            <div class="card-body">
                
                <form method="GET" id="formFilter">
                    <div class="row">
                        <div class="col-md-4">
                            <x-select-field
                                label="Tahun Ajaran"
                                name="tahun"
                                id="filter-tahun"
                                :value="request('tahun', get_tahun()->id)"
                                placeholder="Pilih Tahun Ajaran"
                                :options="$tahun"
                            />
                        </div>
                        <div class="col-md-4">
                            <x-select-field
                                label="Semester"
                                name="smt"
                                id="filter-smt"
                                :value="request('smt', '')"
                                placeholder="Pilih Semester"
                                :options="[['value' => 'Ganjil','label' => 'Ganjil'], ['value' => 'Genap','label' => 'Genap']]"
                            />
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="my-auto">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                    Cari
                                </button>
                                <button type="button" class="btn btn-danger" onclick="reset()">
                                    <i class="fa fa-refresh"></i>
                                    Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if ($data)
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th rowspan="2" width="30%">Pelajaran</th>
                                <th colspan="6" width="30%" class="text-center">Nilai Harian</th>
                                <th rowspan="2" width="10%" class="text-center">Rata Rata Nilai</th>
                                <th rowspan="2" width="10%" class="text-center">PUS</th>
                                <th rowspan="2" width="10%" class="text-center">ASAJ</th>
                                <th rowspan="2" width="10%" class="text-center">Raport</th>
                            </tr>
                            <tr>
                                <th class="text-center">1</th>
                                <th class="text-center">2</th>
                                <th class="text-center">3</th>
                                <th class="text-center">4</th>
                                <th class="text-center">5</th>
                                <th class="text-center">6</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $pelajaran => $types)
                            @php
                                $ulanganData = array($types['Ulangan 1'] ?? 0, $types['Ulangan 2'] ?? 0, 
                                $types['Ulangan 3'] ?? 0, $types['Ulangan 4'] ?? 0, 
                                $types['Ulangan 5'] ?? 0, $types['Ulangan 6'] ?? 0);
                                $ulangan = round(array_sum($ulanganData) / count($ulanganData));

                                $nilaiData = array($ulangan ?? 0, $types['PUS'] ?? 0, $types['ASAJ'] ?? 0);
                                $raport = round(array_sum($nilaiData) / count($nilaiData));
                            @endphp
                                <tr>
                                    <td>{{ $pelajaran }}</td>
                                    <td class="text-center">{{ $types['Ulangan 1'] ?? '-' }}</td>
                                    <td class="text-center">{{ $types['Ulangan 2'] ?? '-' }}</td>
                                    <td class="text-center">{{ $types['Ulangan 3'] ?? '-' }}</td>
                                    <td class="text-center">{{ $types['Ulangan 4'] ?? '-' }}</td>
                                    <td class="text-center">{{ $types['Ulangan 5'] ?? '-' }}</td>
                                    <td class="text-center">{{ $types['Ulangan 6'] ?? '-' }}</td>
                                    <td class="text-center">{{ $ulangan ?? '-' }}</td>
                                    <td class="text-center">{{ $types['PUS'] ?? '-' }}</td>
                                    <td class="text-center">{{ $types['ASAJ'] ?? '-' }}</td>
                                    <td class="text-center">{{ $raport ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </section>
</div>
</x-base-layout>