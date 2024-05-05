<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.guru.partials.head')

    @stack('styles')
</head>

<body>
    <div id="app">
        @include('dashboard.guru.partials.sidebar')

        <div id="main">
            @include('dashboard.guru.partials.header')
            
            @include('partials.flash')

            @yield('content')

        </div>
    </div>

    @include('dashboard.guru.partials.scripts')

    @stack('scripts')
</body>

</html>
