<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Appraisal Systen">
    <meta name="author" content="Capital Sage">
    <meta name="keyword" content="Appraisal, Employeer, employees, Business">
{{--    <link rel="shortcut icon" href="img/favicon.png">--}}
    <link href="{{asset('img/favicon.ico')}}" rel="icon">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <title>Appraisal System</title>

    <!-- Bootstrap CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{asset('css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- full calendar css-->
    <link href="{{asset('css/fullcalendar/fullcalendar/bootstrap-fullcalendar.css')}}" rel="stylesheet" />
    <link href="{{asset('css/fullcalendar/fullcalendar/fullcalendar.css')}}" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="{{asset('css/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}" type="text/css">
    <link href="{{asset('css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{asset('css/fullcalendar.css')}}">
    <link href="{{asset('css/widgets.css')}}" rel="stylesheet">
    <link href="{{asset('css/member_template.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('css/xcharts.min.css')}}" rel=" stylesheet">
    <link href="{{asset('css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">
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
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
<!-- container section start -->
<section id="container" class="">


    <header class="header dark-bg">
        <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
        </div>

        <!--logo start-->
        @if(auth()->user()->role == 'admin')
            <a href="/" class="logo"><span class="lite">{{Auth::user()->name}} </span></a>
        @else
            <a href="/" class="logo"><span class="lite">{{Auth::user()->name}} Staff</span></a>
        @endif
        <!--logo end-->

        <div class="nav search-row" id="top_menu">
            <!--  search form start -->
            <ul class="nav top-menu">
                <li>
                    <form class="navbar-form">
                        <input class="form-control" placeholder="Search" type="text">
                    </form>
                </li>
            </ul>
            <!--  search form end -->
            <div class="text-center text-white msg ">@include('includes.messages')</div>
        </div>

        <div class="top-nav notification-row">
            <!-- notification dropdown start-->
            <ul class="nav pull-right top-menu">

                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="{{asset('img/avatar.jpg')}}" width="60">
                            </span>
                        <span class="username"> {{Auth::user()->email}}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li class="eborder-top">
                            <a href="#"><i class="icon_profile"></i> My Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon_chat_alt"></i> Chats</a>
                        </li>
                        <li>
                            <a class="" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="icon_key_alt"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!-- notificatoin dropdown end-->
        </div>
    </header>
    <!--header end-->
<div class="emptySpace"></div>
    <!--sidebar start-->
{{--    @include('includes.employee_sidebar')--}}
    @yield('sidebar')
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="">Home</a></li>
                        <li><i class="fa fa-laptop"></i>Dashboard</li>
                    </ol>
                </div>
            </div>

            @yield('content')
        </section>
        <div class="text-right">
            <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
                -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </section>
    <!--main content end-->
</section>
<!-- container section start -->

<!-- javascripts -->
<script src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-ui-1.9.2.custom.min.js')}}"></script>
<!-- bootstrap -->
<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
<!-- nice scroll -->
<script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>
<!-- charts scripts -->
<script src="{{asset('js/jquery.knob.js')}}"></script>
<script src="{{asset('js/jquery.sparkline.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery.easy-pie-chart.js')}}"></script>
<script src="{{asset('js/owl.carousel.js')}}"></script>
<!-- jQuery full calendar -->
<<script src="{{asset('js/fullcalendar.min.js')}}"></script>
<!-- Full Google Calendar - Calendar -->
<script src="{{asset('js/fullcalendar/fullcalendar.js')}}"></script>
<!--script for this page only-->
<script src="{{asset('js/calendar-custom.js')}}"></script>
<script src="{{asset('js/jquery.rateit.min.js')}}"></script>
<!-- custom select -->
<script src="{{asset('js/jquery.customSelect.min.js')}}"></script>
<script src="{{asset('js/chart-master/Chart.js')}}"></script>

<!--custome script for all page-->
<script src="{{asset('js/scripts.js')}}"></script>
<!-- custom script for this page-->
<script src="{{asset('js/sparkline-chart.js')}}"></script>
<script src="{{asset('js/easy-pie-chart.js')}}"></script>
<script src="{{asset('js/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('js/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('js/xcharts.min.js')}}"></script>
<script src="{{asset('js/jquery.autosize.min.js')}}"></script>
<script src="{{asset('js/jquery.placeholder.min.js')}}"></script>
<script src="{{asset('js/gdp-data.js')}}"></script>
<script src="{{asset('js/morris.min.js')}}"></script>
<script src="{{asset('js/sparklines.js')}}"></script>
<script src="{{asset('js/charts.js')}}"></script>
<script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
@yield('scripts')
<script>
    //knob
    $(function() {
        $(".knob").knob({
            'draw': function() {
                $(this.i).val(this.cv + '%')
            }
        })
    });

    //carousel
    $(document).ready(function() {
        $("#owl-slider").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

        });
    });

    //custom select box

    $(function() {
        $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function() {
        $('#map').vectorMap({
            map: 'world_mill_en',
            series: {
                regions: [{
                    values: gdpData,
                    scale: ['#000', '#000'],
                    normalizeFunction: 'polynomial'
                }]
            },
            backgroundColor: '#eef3f7',
            onLabelShow: function(e, el, code) {
                el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
            }
        });
    });
</script>

</body>

</html>
