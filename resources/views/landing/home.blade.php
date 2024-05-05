<x-landing-layout>
    @push('styles')
        <style>
            .carousel-item {
                height: 400px !important;
                max-height: !important;
                overflow : hidden;
            }

            .carousel-item > img {
                position: absolute;
                left: 50%;
                top: 50%;
                -webkit-transform: translateY(-50%) translateX(-50%);
            }
            .carousel-control-next, .carousel-control-prev {
                width: 7% !important;s
            }
        </style>
    @endpush

    <div class="content-wrapper container">
        <div id="carouselExampleControls" class="carousel slide mb-4" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/assets/images/galeri/1.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/assets/images/galeri/2.jpeg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>

        <div class="card" id="tentang-kami">
            <div class="card-header text-center">
                <h2 class="fs-3">Tentang Kami</h2>
            </div>
            <div class="card-body text-center">
                <p>SMP Muhammadiyah 3 bandung didirikan oleh beberapa tokoh aktivis pada saat itu. awal mula didirikannya sekolah karena para tokoh atau aktivis berpikir kenapa pada jaman itu Indonesia bisa dijajah oleh belanda karena minimnya pendidikan atau ilmu yang didapat oleh anak muda sehingga daya berpikir mereka cenderung kurang dari rata-rata, maka dari itu para tokoh atau aktivis mendirikanlah sebuah sekolah SMP Muhammadiyah sebagai suatu pendidikan yang dilengkapi dengan Pendidikan agama islam. 
                    SMP Muhammadiyah 3 Bandung didirikan pada tahun 1963 secara penanggalan didirikannya tidak adanya bukti kapan dikarenakan kegiatan seremonial atau peresmiannya tidak dilakukan pada saat itu, tetapi dengan seiring bertambahnya waktu SMP Muhammadiyah 3 Bandung baru mendapatkan izin operasional Pendidikan pada tahun 1970.</p>
            </div>
        </div>

        
        <div class="card" id="visi-misi">
            <div class="card-header text-center">
                <h2 class="fs-3">VISI & MISI SEKOLAH</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>Terwujudnya civitas akademika SMP Muhammadiyah 3 Bandung yang Unggul dalam Ilmu Pengetahuan berlandaskan Iman dan Taqwa</p>
                    </div>
                    <div class="col-md-6">
                        <ol>
                            <li>Meningkatkan mutu profesinalisme SDI SMP Muhammadiyah 3 Bandung</li>
                            <li>Meningkatkan mutu SDI SMP Muhammadiyah 3 Bandung dalam Ilmu Pengetahuan berlandaskan Iman dan Taqwa</li>
                            <li>Meningkatkan mutu Peserta Didik SMP Muhammadiyah 3 Bandung dalam Ilmu Pengetahuan berlandaskan Iman dan Taqwa</li>
                            <li>Meningkatkan Sarana dan Prasarana penunjang IMTAQ dan IPTEK</li>
                            <li>Meningkatkan manajemen mutu SMP Muhammadiyah 3 Bandung</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-landing-layout>