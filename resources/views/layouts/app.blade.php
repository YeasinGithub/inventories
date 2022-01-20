<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- =====  BASIC PAGE NEEDS  ===== -->
    <meta charset="utf-8">
    <title>Bigmarket E-commerce Bootstrap Template</title>
  
    <!-- =====  SEO MATE  ===== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="distribution" content="global">
    <meta name="revisit-after" content="2 Days">
    <meta name="robots" content="ALL">
    <meta name="rating mt-5 mb-5" content="8 YEARS">
    <meta name="GOOGLEBOT" content="NOARCHIVE">
  
    <!-- =====  MOBILE SPECIFICATION  ===== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- =====  CSS  ===== -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="../../../use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('frontend/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">  
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.css')}}">
    <link rel="shortcut icon" href="{{asset('frontend/images/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('frontend/images/apple-touch-icon.html')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('frontend/images/apple-touch-icon-72x72.html')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('frontend/images/apple-touch-icon-114x114.html')}}">






</head>
<body>
    <div id="app">
       
    </div>


    <a id="scrollup"></a>
    <!-- <script>
        $(".owl-carousel").owlCarousel({
            navigation : true
        });
    </script> -->
    <script src="{{asset('frontend/js/modernizr.js')}}"></script>
    <script src="{{asset('frontend/js/jQuery_v3.1.1.min.js')}}"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.magnific-popup.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.firstVisitPopup.js')}}"></script>
    <script src="{{asset('frontend/js/custom.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <!-- <script>
        $(".owl-carousel").owlCarousel({
                navigation : true
        });
    </script> -->
</body>
</html>
