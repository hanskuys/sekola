<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMP Muhammadiyah 3 Kota Bandung</title>
    
    <link rel="stylesheet" href="{{asset("assets/css/main/app.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/css/main/app-dark.css") }}">
    <link rel="shortcut icon" href="{{ asset("assets/images/logo/favicon.svg") }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset("assets/images/logo/favicon.png") }}" type="image/png">
    
    <link rel="stylesheet" href="{{ asset("assets/css/shared/iconly.css") }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="/assets/images/logo/logo.jpg" alt="Logo" style="height: 70px !important;">
                            </a>
                        </div>
                        <div class="header-top-right">

                            @if (auth()->guard('siswa')->check())
                                
                                <div class="dropdown">
                                    <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="text">
                                            <h6 class="user-dropdown-name">{{ auth()->guard('siswa')->user()->nama_siswa }}</h6>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                    <li><a class="dropdown-item" href="{{ url('/siswa') }}">Beranda</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('siswa.logout') }}">Logout</a></li>
                                    </ul>
                                </div>
                            @else
                            <a class="btn btn-primary" href="{{ route('login') }}">
                                Masuk
                            </a>

                            
                            <a class="btn btn-outline-primary" href="{{ route('daftar') }}">
                                Daftar
                            </a>
                            @endif

                            <!-- Burger button responsive -->
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            <li class="menu-item">
                                <a href="{{ url('/') }}" class="menu-link">
                                    <span>Beranda</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('/') }}#tentang-kami" class="menu-link">
                                    <span>Tentang Kami</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('/') }}#visi-misi" class="menu-link">
                                    <span>Visi & Misi</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('/') }}#galeri" class="menu-link">
                                    <span>Galeri</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

            </header>
                {{ $slot }}

            <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2023 &copy; Mazer</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://saugi.me">Saugi</a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset("assets/js/bootstrap.js") }}"></script>
    <script src="{{ asset("assets/js/app.js") }}"></script>
    <script src="{{ asset("assets/js/pages/horizontal-layout.js") }}"></script>
</body>

</html>