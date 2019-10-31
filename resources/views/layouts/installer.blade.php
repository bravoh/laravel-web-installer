<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link name="favicon" type="image/x-icon" href="{{asset('public/vendor/laravel-web-installer/img/favicon.png')}}" rel="shortcut icon" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('public/vendor/laravel-web-installer/css/bootstrap.min.css')}}" rel="stylesheet">

    <!--Font Awesome [ OPTIONAL ]-->
    <link href="{{ asset('public/vendor/laravel-web-installer/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

</head>
<body>
<div id="container" class="">
    <div class="cls-content">
        <div class="container">

            <div class="panel">
                <div class="panel-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

<!--JAVASCRIPT-->
<!--=================================================-->

@yield('script')

</body>
</html>
