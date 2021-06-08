<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Appraisal System | @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('css/aos.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <style>
        label{
            color: #112;
        }
        .card-header{
            color: #112;
            font-weight: 800;
            text-transform: uppercase;
            font-size: 20px;
        }
    </style>

    <!-- =======================================================
    * Template Name: Restaurantly - v1.2.1
    * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex">

    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="/">Appraisal</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
  @if(Auth::user())
{{--       logged in users--}}
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li>
                        <a class="" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <li><a href=""></a></li>
                    <li><a href="{{route('admin.index')}}">Admin</a></li>
                    <li><a href="#specials"></a></li>
                    <li><a href="{{route('employee.index')}}">Employee</a></li>
                    <li><a href="#gallery"></a></li>
                    <li><a href="#chefs"></a></li>
                    <li><a href="#contact"></a></li>

                </ul>
            </nav><!-- .nav-menu -->
      @else
{{--      anonymous users--}}
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="{{route('login')}}">Login</a></li>
                <li><a href="#about"></a></li>
                <li><a href="{{route('register')}}">Register</a></li>
                <li><a href="#specials"></a></li>
                <li><a href="#events"></a></li>
                <li><a href="#gallery"></a></li>
                <li><a href="#chefs"></a></li>
                <li><a href="#contact"></a></li>
                <li class="book-a-table text-center"><a href="{{route('register')}}">Create a Business</a></li>
            </ul>
        </nav><!-- .nav-menu -->

        @endif
    </div>
</header><!-- End Header -->


<main id="main" class="m-5">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="emptySpace m-5">

    </div>
    <div class="text-center msg p-5"><small class="text-muted">@include('includes.messages')</small></div>
    @yield('content')
</main><!-- End #main -->


<!-- Vendor JS Files -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/validate.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('js/venobox.min.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('/js/main.js')}}"></script>
<script>
    $('div.msg').delay(5000).slideUp(300);
</script>
</body>

</html>
