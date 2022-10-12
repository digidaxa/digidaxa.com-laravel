<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Digidaxa">
    <meta name="author" content="Digidaxa studio">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
    <title>{{ $title }} &lsaquo; {{ $siteName }}</title>

    <link rel="apple-touch-icon" sizes="57x57" href="{{ '/img/icon/apple-icon-57x57.png' }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ '/img/icon/apple-icon-60x60.png' }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ '/img/icon/apple-icon-72x72.png' }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ '/img/icon/apple-icon-76x76.png' }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ '/img/icon/apple-icon-114x114.png' }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ '/img/icon/apple-icon-120x120.png' }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ '/img/icon/apple-icon-144x144.png' }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ '/img/icon/apple-icon-152x152.png' }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ '/img/icon/apple-icon-180x180.png' }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ '/img/icon/android-icon-192x192.png' }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ '/img/icon/favicon-32x32.png' }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ '/img/icon/favicon-96x96.png' }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ '/img/icon/favicon-16x16.png' }}">
    <link rel="manifest" href="{{ '/img/icon/manifest.json' }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{-- jika di path home --}}
    @if (Request::is('/'))<link rel="stylesheet" href={{ "/owl-carousel/owl.carousel.min.css" }}>
    <link rel="stylesheet" href={{ "/owl-carousel/owl.theme.default.min.css" }}>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src={{ "/owl-carousel/owl.carousel.min.js" }}></script>
    @endif

</head>

<body>
    @if (Request::is('/'))
    @include('partials.home.header')
    @endif
    {{-- @include('partials.home.hero') --}}

    @yield('container')

    @include('partials.home.footer')
    @include('partials.home.navbottom')
</body>

</html>