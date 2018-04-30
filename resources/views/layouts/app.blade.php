<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ config('app.name','') }}</title>

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/font.css')}}">

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />

    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
        <div class="navbar navbar-lightgit add .">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/img/plantprop-logo.jpg" alt="" width="80"></a>
            <a class="navbar-brand" href="{{ url('/') }}">
                ระบบบริหารจัดการศูนย์ขยายพันธ์ุพืช
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

            <!-- Right Side Of Navbar -->
            <div class="nav navbar-right my-2 my-sm-0">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <div class="row">
                        <a href="{{ route('register') }}"><i class="material-icons">account_circle</i></a>
                        officer
                    </div>
                @else
                    <div class="row">

                    </div><br>
                    <div class="row">
                        ผู้ใช้งานระบบโดย : คุณ{{ Auth::user()->name }}<br>
                        {{ Auth::user()->position }} <br>
                        {{ $agency_name[Auth::user()->agency] }}
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">settings_applications</i>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">ตั้งค่าโปรไฟล์</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}">ออกจากระบบ</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
    </nav>
    {{--</div>--}}
    @if (Auth::user())
    @include('layouts.nav')
    @endif
    @yield('content')

</div>
@include('layouts.footer')

<!-- Scripts -->
@yield('scripts')



</body>
</html>