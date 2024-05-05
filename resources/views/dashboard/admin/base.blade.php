<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.admin.partials.head')

    @stack('styles')
</head>

<body>
    <div id="app">
        @include('dashboard.admin.partials.sidebar')
        <div id="main" class="layout-navbar">
            @include('dashboard.admin.partials.header')
            

            <div id="main-content">
                @include('partials.flash')
                @yield('content')
            </div>

            @include('dashboard.admin.partials.footer')
        </div>
    </div>

    @include('dashboard.admin.partials.scripts')

    @stack('scripts')
</body>

</html>
