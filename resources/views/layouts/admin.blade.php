<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bamilo') }}</title>


    {{--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">--}}
    {{--<link href="{{ asset('css/bamilo/items.css') }}" rel="stylesheet" type="text/css">--}}
    <link href="{{ asset('css/bamilo/tree_view.css') }}" rel="stylesheet" type="text/css">
    {{--    <link href="{{ asset('css/bamilo/topBare.css') }}" rel="stylesheet" type="text/css">--}}


    <script src="{{ asset('node_modules/jquery/dist/jquery.js') }}"></script>
    {{--<script src="{{ asset('js/bamilo/items.js') }}"></script>--}}
    <script src="{{ asset('js/bamilo/tree_view.js') }}"></script>
    <script src="{{ asset('js/bamilo/data_table.js') }}"></script>
    {{--<script src="{{ asset('js/bamilo/pace.min.js') }}"></script>--}}
    @include('main.headHTML')


</head>
<body>
    <script>var pxInit = [];</script>

    @if (Route::has('login'))
        @auth
        @include('main.sidebar')
        @endauth
    @endif
    @include('main.header')

    <script>
        pxInit.push(function() {
            $('#navbar-notifications').perfectScrollbar();
            $('#navbar-messages').perfectScrollbar();
        });
    </script>
    @yield('content')
    {{--@include('main.footer')--}}
    @yield('scripts')
</body>
</html>