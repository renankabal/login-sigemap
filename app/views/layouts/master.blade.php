<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        @section('title')
            Laravel Authentication
        @show
    </title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    @yield('meta')
    @section('style')
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}">
        <style>
        @section('styles')
            body {
                padding-top: 60px;
            }
        @show
        </style>
    @show

    <!-- jQuery and Modernizr -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    @yield('script.header')

</head>
<body>
    <!-- Navbar -->
    @include('includes.navigation')

    <div class="container">

        <!--Success-Messages-->
        @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Success</h4>
                {{{$message}}}
            </div>
        @endif

        @yield('content')
    </div>

    @section('script.footer')
         <!-- Script Footer -->
         <script src="{{ URL::asset('assets/js/vendor/bootstrap.min.js') }}"></script>
         <script src="{{ URL::asset('assets/js/main.js') }}"></script>
    @show

</body>
</html>