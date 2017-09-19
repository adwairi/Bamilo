<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bamilo') }}</title>

    <link href="{{ asset('pixel/css/bootstrap.css') }}" rel="stylesheet" type="text/css" class="px-demo-stylesheet-bs">
    <link href="{{ asset('pixel/css/pixeladmin.css') }}" rel="stylesheet" type="text/css" class="px-demo-stylesheet-bs">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="{{ asset('css/bamilo/sidebar_menu.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bamilo/items.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bamilo/demo.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bamilo/tree_view.css') }}" rel="stylesheet" type="text/css">
    {{--    <link href="{{ asset('css/bamilo/topBare.css') }}" rel="stylesheet" type="text/css">--}}


    <script src="{{ asset('node_modules/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('pixel/js/bootstrap.js') }}"></script>
    <script src="{{ asset('pixel/js/pixeladmin.js') }}"></script>
    <script src="{{ asset('js/bamilo/sidebar_menu.js') }}"></script>
    <script src="{{ asset('js/bamilo/items.js') }}"></script>
    <script src="{{ asset('js/bamilo/tree_view.js') }}"></script>
    <script src="{{ asset('js/bamilo/data_table.js') }}"></script>
    <script src="{{ asset('js/bamilo/pace.min.js') }}"></script>
    <script src="{{ asset('js/bamilo/demo.js') }}"></script>


</head>
<body>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {{--<!-- Branding Image -->--}}
            {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
            {{--{{ config('app.name', 'Laravel') }}--}}
            {{--</a>--}}
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endguest
            </ul>
        </div>
    </div>
</nav>

@if (Route::has('login'))
        @auth
        @include('head.sidebar_menu')
        @endauth
@endif

<div class="main">
    {{--@include('head.header')--}}
@yield('content')
</div>
</body>
</html>