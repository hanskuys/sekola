<x-base-layout>
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Selamat Datang {{ auth()->user()->nama }}</h3>
</div>

<div class="page-content">
    @if (auth()->user()->detail == null || auth()->user()->ortu == null)
    <div class="card">
        <div class="card-body px-4 py-4-5">
            <p>Helo {{ auth()->user()->nama }}
                <br>
                Terimakasih sudah melakukan pendaftaran, silahkan untuk melengkapi pendaftaran anda dengan melengkapi formulir berikut ini:
            </p>
            <ol>
                <li>
                    <a href="{{ route('siswa.profil.detail') }}">Data Lengkap</a>
                </li>
                <li>
                    <a href="{{ route('siswa.profil.ortu') }}">Data Orang Tua</a>
                </li>
                <li>
                    <a href="{{ route('siswa.profil.dapodik') }}">Data Dapodik</a>
                </li>
            </ol>
        </div>
    </div>
    @else
        <div class="row">
            <div class="col-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon red mb-2">
                                    <i class="iconly-boldBookmark"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 d-flex justify-content-center align-items-center">
                                <h3 class="text-muted font-semibold">Kelas {{ $kelas ? $kelas->kelas->kelas : "Belum Ada" }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon purple mb-2">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Total Mata Pelajaran</h6>
                                <h6 class="font-extrabold mb-0">{{ $total_pelajaran }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
</x-base-layout>