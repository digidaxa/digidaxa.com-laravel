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

  <link rel="apple-touch-icon" sizes="57x57" href="{{ '/img/apple-icon-57x57.png' }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ '/img/apple-icon-60x60.png' }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ '/img/apple-icon-72x72.png' }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ '/img/apple-icon-76x76.png' }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ '/img/apple-icon-114x114.png' }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ '/img/apple-icon-120x120.png' }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ '/img/apple-icon-144x144.png' }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ '/img/apple-icon-152x152.png' }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ '/img/apple-icon-180x180.png' }}">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{ '/img/android-icon-192x192.png' }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ '/img/favicon-32x32.png' }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ '/img/favicon-96x96.png' }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ '/img/favicon-16x16.png' }}">
  <link rel="manifest" href="{{ '/img/manifest.json' }}">

  <!-- Custom fonts for this template-->
  <link href="{{ 'sb-admin-2/vendor/fontawesome-free/css/all.min.css' }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ 'sb-admin-2/css/sb-admin-2.min.css' }}" rel="stylesheet">

</head>

<body class="bg-light">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center align-item-center" style="height: 100vh;">

      <div class="col-10 col-md-8 col-lg-6 m-auto">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            @yield('container')
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ 'sb-admin-2/vendor/jquery/jquery.min.js' }}"></script>
  <script src="{{ 'sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js' }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ 'sb-admin-2/vendor/jquery-easing/jquery.easing.min.js' }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ 'sb-admin-2/js/sb-admin-2.min.js' }}"></script>

</body>

</html>