<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.siswa.partials.head')

    @stack('styles')
</head>

<body>
    <div id="app">
        @include('dashboard.siswa.partials.sidebar')

        <div id="main">
            @include('dashboard.siswa.partials.header')
            
            @include('partials.flash')

            @yield('content')

        </div>
    </div>

    @include('dashboard.siswa.partials.scripts')

    @stack('scripts')
</body>

</html>
