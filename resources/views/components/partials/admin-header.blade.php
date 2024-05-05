<header>
    <nav class="navbar navbar-expand navbar-light navbar-top">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            @if(auth()->guard('web')->check())
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600">
                                    {{ auth()->guard('web')->user()->name }}</h6>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                        style="min-width: 11rem;">
                        <li>
                            <h6 class="dropdown-header">Hello,
                                {{ auth()->guard('web')->user()->name }}
                            </h6>
                        </li>
                            <i class="icon-mid bi bi-gear me-2"></i>
                                Pengaturan
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                <i class="fa fa-right-from-bracket me-2"></i>
                                Keluar
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @elseif(auth()->guard('karyawan')->check())
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600">
                                    {{ auth()->guard('karyawan')->user()->nama }}</h6>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                        style="min-width: 11rem;">
                        <li>
                            <h6 class="dropdown-header">Hello,
                                {{ auth()->guard('karyawan')->user()->nama }}
                            </h6>
                        {{-- </li>
                            <i class="icon-mid bi bi-gear me-2"></i>
                                Pengaturan
                            </a>
                        </li> --}}
                        <li>
                            <a class="dropdown-item" href="{{ route('guru.logout') }}">
                                <i class="fa fa-right-from-bracket me-2"></i>
                                Keluar
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </nav>
</header>
