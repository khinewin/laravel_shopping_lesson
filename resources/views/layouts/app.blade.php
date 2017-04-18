<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{URL::to('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::to('bootstrap/css/app.css')}}" rel="stylesheet">


    <!-- Scripts -->
    <script src="{{URL::to('bootstrap/js/bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('bootstrap/js/jquery.js')}}" type="text/javascript"></script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    @include('layouts.navbar')

    <div class="container" id="myContainer">

        @yield('content')
    </div>


@include('layouts.footer')

    <!-- Scripts -->
    <script src="{{URL::to('bootstrap/js/bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('bootstrap/js/jquery.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('bootstrap/js/app.js')}}" type="text/javascript"></script>
</body>
</html>
