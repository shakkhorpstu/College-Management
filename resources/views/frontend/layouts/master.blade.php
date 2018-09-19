<!DOCTYPE html>
<html lang="en">
<head>

  <title>Satkhira govt. college</title>

  <meta charset="UTF-8">
  <meta name="description" content="Unica University Template">
  <meta name="keywords" content="event, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="shortcut icon"/>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ asset('public/front/css/bootstrap.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('public/front/css/font-awesome.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('public/front/css/themify-icons.css') }}"/>
  <link rel="stylesheet" href="{{ asset('public/front/css/magnific-popup.css') }}"/>
  <link rel="stylesheet" href="{{ asset('public/front/css/animate.css') }}"/>
  <link rel="stylesheet" href="{{ asset('public/front/css/owl.carousel.css') }}"/>
  <link rel="stylesheet" href="{{ asset('public/front/css/style.css') }}"/>
  <link rel="stylesheet" href="{{ asset('public/front/css/custom.css') }}"/>

</head>
<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  @include('frontend.partials.header')

  @include('frontend.partials.nav')

  @section('content')
  @show

  @include('frontend.partials.footer')

  <!--====== Javascripts & Jquery ======-->
  <script src="{{ asset('public/front/js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('public/front/js/popper.min.js') }}"></script>
  <script src="{{ asset('public/front/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('public/front/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('public/front/js/jquery.countdown.js') }}"></script>
  <script src="{{ asset('public/front/js/masonry.pkgd.min.js') }}"></script>
  <script src="{{ asset('public/front/js/magnific-popup.min.js') }}"></script>
  <script src="{{ asset('public/front/js/main.js') }}"></script>

</body>
</html>
