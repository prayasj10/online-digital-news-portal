
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- select2 -->
    <!-- jquery -->
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
{{--    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>--}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">


{{--    <!-- bootstrap toogle -->--}}

{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}

{{--    <!-- bootstrap modal -->--}}

{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >--}}
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}


{{--    <!-- cdn-select2 -->--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

{{--    <!-- Scripts -->--}}
    <script src="{{ asset('js/app.js') }}"></script>

{{--    <!-- ckeditor -->--}}
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

{{--    <!-- Styles -->--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        <!-- jquery sortable -->
{{--    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">--}}
{{--    <script src="//code.jquery.com/jquery-1.12.4.js"></script>--}}
{{--    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
{{--    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>--}}



</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a href="/" class="navbar-brand pl-2">
            <img src="/frontend/posts/logo.jpg" alt="Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8;height:30px">
        </a>
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
            </li>
{{--            <li class="nav-item d-none d-sm-inline-block">--}}
{{--                <a href="/home" class="nav-link pl-5">Home</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item d-none d-sm-inline-block">--}}
{{--                <a href="#" class="nav-link">Contact</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                    Help--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                    <a class="dropdown-item" href="#">FAQ</a>--}}
{{--                    <a class="dropdown-item" href="#">Support</a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item" href="#">Contact</a>--}}
{{--                </div>--}}
{{--            </li>--}}
        </ul>
        <!-- SEARCH FORM -->
{{--        <form class="form-inline ml-3">--}}
{{--            <div class="input-group input-group-sm">--}}
{{--                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
{{--                <div class="input-group-append">--}}
{{--                    <button class="btn btn-navbar" type="submit">--}}
{{--                        <i class="fas fa-search"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
        <!-- Right navbar links -->
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
@include('layouts.sidebar')
</div>
@stack('scripts')
</body>
</html>

