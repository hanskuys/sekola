<!DOCTYPE html>
<html lang="en">
<head>
    @include('auth.partials.head')
</head>
<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    @include('components.partials.flash')
                    @yield('content')
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>
    </div>

    @include('auth.partials.scripts')
</body>

</html>
