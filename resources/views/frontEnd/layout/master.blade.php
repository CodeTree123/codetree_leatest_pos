<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('public/frontEnd/images/icon.png') }}" rel="shortcut icon"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="{{ asset('/') }}public/frontEnd/css/animate.css">
    
    <link rel="stylesheet" href="{{ asset('/') }}public/frontEnd/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}public/frontEnd/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}public/frontEnd/css/magnific-popup.css">

    <link rel="stylesheet" href="{{ asset('/') }}public/frontEnd/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ asset('/') }}public/frontEnd/css/jquery.timepicker.css">

    <link rel="stylesheet" href="{{ asset('/') }}public/frontEnd/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('/') }}public/frontEnd/css/style.css">
  </head>
  <body>
   @include('frontEnd.include.header')
    <!-- END nav -->
    
    

    @yield('content') 

    
    @include('frontEnd.include.footer')
  

  <!-- loader -->
 <!-- <div id="ftco-loader" class="show fullscreen">
      <svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>-->


  <script src="{{ asset('/') }}public/frontEnd/js/jquery.min.js"></script>
  <script src="{{ asset('/') }}public/frontEnd/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{ asset('/') }}public/frontEnd/js/popper.min.js"></script>
  <script src="{{ asset('/') }}public/frontEnd/js/bootstrap.min.js"></script>
  <script src="{{ asset('/') }}public/frontEnd/js/jquery.easing.1.3.js"></script>
  <script src="{{ asset('/') }}public/frontEnd/js/jquery.waypoints.min.js"></script>
  <script src="{{ asset('/') }}public/frontEnd/js/jquery.stellar.min.js"></script>
  <script src="{{ asset('/') }}public/frontEnd/js/jquery.animateNumber.min.js"></script>
  <script src="{{ asset('/') }}public/frontEnd/js/bootstrap-datepicker.js"></script>
  <script src="{{ asset('/') }}public/frontEnd/js/jquery.timepicker.min.js"></script>
  <script src="{{ asset('/') }}public/frontEnd/js/owl.carousel.min.js"></script>
  <script src="{{ asset('/') }}public/frontEnd/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ asset('/') }}public/frontEnd/js/scrollax.min.js"></script>
  <script src="{{ asset('/') }}public/frontEnd/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('/') }}public/frontEnd/js/google-map.js"></script>
  <script src="{{ asset('/') }}public/frontEnd/js/main.js"></script>
    
  </body>
</html>