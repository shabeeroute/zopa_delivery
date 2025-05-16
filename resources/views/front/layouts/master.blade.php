<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Mobile Web-app fullscreen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <!--Title-->
    <title>@yield('title') | Ecommerce Website Template</title>

    @include('front.includes.head-css')

</head>

<body>

    <div class="page-loader"></div>

    <div class="wrapper">

        <!--Use class "navbar-fixed" or "navbar-default" -->
        <!--If you use "navbar-fixed" it will be sticky menu on scroll (only for large screens)-->

        <!-- ======================== Navigation ======================== -->

        <nav class="navbar-fixed">

            <div class="container">

                @include('front.includes.top')

                @include('front.includes.nav')

                @include('front.includes.search-wrapper')

                @include('front.includes.login-wrapper')

                @include('front.includes.cart-wrapper')
            </div> <!--/container-->
        </nav>
        @yield('content')

        @include('front.includes.footer')

    </div> <!--/wrapper-->

@include('front.includes.footer-scripts')
</body>

</html>
