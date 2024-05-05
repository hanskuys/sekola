<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.casis.partials.head')

    @stack('styles')
</head>

<body>
    <div id="app" class="mx-5 my-5">
        {{-- @include('dashboard.casis.partials.sidebar') --}}
            @include('dashboard.casis.partials.header')
            
            {{-- @include('partials.flash') --}}

            @yield('content')

            {{-- @include('dashboard.casis.partials.footer') --}}
    </div>

    @include('dashboard.casis.partials.scripts')

    @stack('scripts')
</body>

</html>
