<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

    <link href="{{ '/bootstrap/css/bootstrap.min.css' }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="{{ '/styles/home.css' }}" rel="stylesheet">

</head>

<body>
    <header>
        @include('partials.home.navbar')
    </header>

    @include('partials.home.hero')

    @yield('container')
    <script src="{{ '/bootstrap/js/bootstrap.bundle.min.js' }}"></script>
</body>

</html>