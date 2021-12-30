<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Misael Villegas">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>DIF Tecámac</title>
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/owl-carousel/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/owl-carousel/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/magnific-popup.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/etlinefont.css') }}">
    <link href="{{ asset('assets/css/style.css') }}" type="text/css" rel="stylesheet" />
</head>

<body data-spy="scroll" data-target="#main-menu">
    <div id="pageloader">
        <div class="loader">
            <img src="{{ asset('assets/images/progress.gif') }}" alt='loader' />
        </div>
    </div>

    <header id="header" style="background: #d4447c; margin-bottom: 5%;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#main-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-bars"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--Start Logo -->
                    <div class="logo-nav">
                        <a href="index.html">
                            <img src="{{ asset('assets/images/logo.png') }}" style="width: 15%; margin-top: 2%;"
                                alt="Company logo" />
                        </a>
                        <div class="clear-toggle"></div>
                        <div id="main-menu" class="collapse scroll navbar-right">
                            <ul class="nav">
                                <li class="active"> <a href="{{ url('/#home') }}">Inicio</a> </li>

                                <li> <a href="#about">Nosotros</a> </li>

                                <li> <a href="#servicios">Servicios</a> </li>

                                <li> <a href="#comunicacion">Comunicación</a> </li>

                                <li> <a href="#contact">Contacto</a> </li>

                                <li>
                                    {{-- <input class="form-control" id="name" placeholder="search" type="text"> --}}
                                    <img src="{{ asset('assets/images/search-icon.png') }}" class="cursor-pointer" style="width: 10%;" alt="search">
                                </li>
                            </ul>
                        </div><!-- end main-menu -->
                    </div>
                    <!--End Logo -->
                </div>
            </div>
        </div>
    </header>

    <main style="margin-top: 8%; margin-bottom: 10%;">
        @yield('content')
    </main>

     <footer style="position: fixed;bottom: 0; width: 100%;">
        <div class="container">
            <div class="row">
                <!--Start copyright-->
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="copyright">
                        <p>Copyright © 2016 All Rights reserved by: <a href="http://templatestock.co">Template Stock</a>
                        </p>
                    </div>
                </div>
                <!--End copyright-->

                <!--start social icons-->
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="social-icons">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!--End social icons-->
            </div> <!-- /.row-->
        </div> <!-- /.container-->
    </footer>

    <a href="#" class="scrollup"> <i class="fa fa-chevron-up"> </i> </a>

    <script type="text/javascript" src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/owl-carousel/owl.carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.flexslider-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/easing.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.easypiechart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.appear.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.parallax-1.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.mixitup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
