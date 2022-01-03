<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Misael Villegas">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIF Tecámac</title>
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
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

    <header id="header">
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
                                alt="logo" />
                        </a>
                        <div class="clear-toggle"></div>
                        <div id="main-menu" class="collapse scroll navbar-right">
                            <ul class="nav">
                                <li class="active"> <a href="#home">Inicio</a> </li>

                                <li> <a href="#nosotros">Nosotros</a> </li>

                                <li> <a href="#servicios">Servicios</a> </li>

                                <li> <a href="#comunicacion">Comunicación</a> </li>

                                <li> <a href="#contacto">Contacto</a> </li>

                                <li>
                                    {{-- <input class="form-control" id="name" placeholder="search" type="text"> --}}
                                    <img src="{{ asset('assets/images/search-icon.png') }}" class="cursor-pointer"
                                        style="width: 10%;" alt="search">
                                </li>
                            </ul>
                        </div><!-- end main-menu -->
                    </div>
                    <!--End Logo -->
                </div>
            </div>
        </div>
    </header>

    <section id="home" class="home">
        <div class="row">
            <div class="col-sm-12">
                <div class="flexslider">
                    <ul class="slides scroll">
                        <li class="first">
                            <div class="slider-text-wrapper">
                                <div class="container">
                                    <div class="big"
                                        style="font-size: 160px;font-weight: 900;margin-top: 13%">DIF
                                    </div>
                                    <hr>
                                    <div class="small">Tecámac</div>
                                </div>
                            </div>
                            <img style="height: 100%" src="{{ asset('assets/images/slider/home-background.png') }}"
                                alt="">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section" style="padding-top: 0%;">
        <div class="container">
            <div class="row">
                <div class="tab-content-main">
                    <div class="container">
                        <div class="tab-content">
                            <div class="tab-pane active in" id="tab-content-1">
                                <div class="margin-bottom-30">
                                    <div class="tab1-features">
                                        <div class="info">
                                            <h4 class="text-center" style="line-height: 40px">En Tecámac somos
                                                solidarios de corazón</h4>
                                            <p class="text-center" style="font-size: 20px">Vestibulum tortor quam,
                                                feugiat vitae, ultricies eget, tempor sit
                                                amet. Et netus et malesuada fames ac turpis egestas tristique
                                                senectus. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- /.row-->
        </div> <!-- /.container-->
    </section>

    <section id="nosotros" class="section" style="background: #CCD1D1;">
        <div class="container">
            <div class="row">
                <div class="tab-content-main">
                    <div class="container">
                        <div class="tab-content">
                            <div class="tab-pane active in" id="tab-content-1">
                                <div class="col-md-6 margin-bottom-30">
                                    <div class="tab1-features">
                                        <div class="info">
                                            <h4>Nosotros</h4>
                                            <p>Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit
                                                amet. Et netus et malesuada fames ac turpis egestas tristique
                                                senectus. </p>
                                            <li class="filter" data-filter="fashion"
                                                style="text-transform: none">Leer Más</li>
                                        </div>
                                    </div>

                                    <div class="tab1-features">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="tab-carousel">
                                        <div class="item"><img
                                                src="{{ asset('assets/images/works/nosotros.png') }}" alt="">
                                        </div>
                                        <div class="item"><img
                                                src="{{ asset('assets/images/works/3.png') }}" alt="">
                                        </div>
                                        <div class="item"><img
                                                src="{{ asset('assets/images/works/5.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- /.row-->
        </div> <!-- /.container-->
    </section>

    <section id="servicios" class="section" style="padding-top: 0%">
        <div class="container">
            <div class="row">
                <div class="tab-content-main">
                    <div class="container">
                        <div class="tab-content">
                            <div class="tab-pane active in" id="tab-content-1">
                                <div class="col-md-6 margin-bottom-30">
                                    <div class="tab1-features">
                                        <div class="info-menu">
                                            <h4 class="text-center pink">unidad básica de
                                                rehabilitaión e integración
                                                social (ubris)</h4>
                                        </div>
                                        <div class="info-menu">
                                            <h4 class="text-center gray">procuraduría de protección
                                                niñas, niños y
                                                adolescentes</h4>
                                        </div>
                                        <div class="info-menu pink">
                                            <h4 class="text-center pink">Estancias infantiles</h4>
                                        </div>
                                        <div class="info-menu">
                                            <h4 class="text-center gray">centro de atención a víctimas de
                                                violencia
                                                (cavv)</h4>
                                        </div>
                                        <div class="info-menu">
                                            <h4 class="text-center pink">centro de desarrollo comunitario
                                                (cdc)</h4>
                                        </div>
                                        <div class="info-menu">
                                            <h4 class="text-center gray">casas club del adulto mayor
                                                (ccam)</h4>
                                        </div>
                                        <div class="info-menu pink">
                                            <h4 class="text-center pink">dirección de atención y defensa
                                                de los derechos
                                                de la mujer</h4>
                                        </div>
                                        <div class="info-menu">
                                            <h4 class="text-center gray">trabajo social</h4>
                                        </div>
                                    </div>

                                    <div class="tab1-features">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div style="display: flex;align-items: center;justify-content: center;">
                                        <div style="margin-top: 38%;">
                                            <div class="tab1-features">
                                                <div class="info">
                                                    <h4 style="text-transform: none;">Servicios</h4>
                                                    <p
                                                        style="font-size: 18px;color:#000;line-height: 35px;text-align: justify;">
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id
                                                        voluptates eius velit obcaecati, consequuntur provident, soluta
                                                        ipsam, maiores a sint repellat dolorum doloremque porro iusto
                                                        explicabo assumenda quo eligendi nihil</p>
                                                    <li class="filter" data-filter="fashion"
                                                        style="text-transform: none">Conoce Más</li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- /.row-->
        </div><!-- /.container-->
    </section>

    <section id="galeria" class="section" style="background: #d4447c;">
        <!-- Filtering -->
        <div class="title-box text-center">
            <h2 class="title" style="color: #fff;">Galeria</h2>
        </div>
        <div class="work-main">
            <!-- Work Grid -->
            <ul class="work-grid">
                <!-- Work Item -->
                <li class="work-item thumnail-img mix corporate">
                    <div class="work-image">
                        <img src="{{ asset('assets/images/galeria/1.png') }}" alt="thumbnail">

                        <!--Hover link-->
                        <div class="hover-link">

                            <a href="{{ asset('assets/images/galeria/1.png') }}" class="popup-image">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <!--End link-->

                        <!--Hover Caption-->
                        <div class="work-caption">
                            <h4>Project Title</h4>
                            <p>Photography</p>
                        </div>
                        <!--End Caption-->

                    </div> <!-- /.work-image-->
                </li>
                <!--End Work Item -->

                <!-- Work Item -->
                <li class="work-item thumnail-img mix fashion wedding">
                    <div class="work-image">
                        <img src="{{ asset('assets/images/galeria/2.png') }}" alt="thumbnail">

                        <!--Hover link-->
                        <div class="hover-link">

                            <a href="{{ asset('assets/images/galeria/2.png') }}" class="popup-image">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <!--End link-->

                        <!--Hover Caption-->
                        <div class="work-caption">
                            <h4>Project Title</h4>
                            <p>Photography</p>
                        </div>
                        <!--End Caption-->

                    </div> <!-- /.work-image-->
                </li>
                <!--End Work Item -->

                <!-- Work Item -->
                <li class="work-item thumnail-img mix corporate">
                    <div class="work-image">
                        <img src="{{ asset('assets/images/galeria/3.png') }}" alt="thumbnail">

                        <!--Hover link-->
                        <div class="hover-link">

                            <a href="{{ asset('assets/images/galeria/3.png') }}" class="popup-image">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <!--End link-->

                        <!--Hover Caption-->
                        <div class="work-caption">
                            <h4>Project Title</h4>
                            <p>Photography</p>
                        </div>
                        <!--End Caption-->

                    </div> <!-- /.work-image-->
                </li>
                <!--End Work Item -->

                <!-- Work Item -->
                <li class="work-item thumnail-img mix corporate">
                    <div class="work-image">
                        <img src="{{ asset('assets/images/galeria/4.png') }}" alt="thumbnail">

                        <!--Hover link-->
                        <div class="hover-link">

                            <a href="{{ asset('assets/images/galeria/4.png') }}" class="popup-image">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <!--End link-->

                        <!--Hover Caption-->
                        <div class="work-caption">
                            <h4>Project Title</h4>
                            <p>Photography</p>
                        </div>
                        <!--End Caption-->

                    </div> <!-- /.work-image-->
                </li>
                <!--End Work Item -->

                <!-- Work Item -->
                <li class="work-item thumnail-img mix fashion wedding">
                    <div class="work-image">
                        <img src="{{ asset('assets/images/galeria/5.png') }}" alt="thumbnail">

                        <!--Hover link-->
                        <div class="hover-link">

                            <a href="{{ asset('assets/images/galeria/5.png') }}" class="popup-image">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <!--End link-->

                        <!--Hover Caption-->
                        <div class="work-caption">
                            <h4>Project Title</h4>
                            <p>Photography</p>
                        </div>
                        <!--End Caption-->

                    </div> <!-- /.work-image-->
                </li>
                <!--End Work Item -->

                <!-- Work Item -->
                <li class="work-item thumnail-img mix event wedding">
                    <div class="work-image">
                        <img src="{{ asset('assets/images/galeria/6.png') }}" alt="thumbnail">

                        <!--Hover link-->
                        <div class="hover-link">

                            <a href="{{ asset('assets/images/galeria/6.png') }}" class="popup-image">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <!--End link-->

                        <!--Hover Caption-->
                        <div class="work-caption">
                            <h4>Project Title</h4>
                            <p>Photography</p>
                        </div>
                        <!--End Caption-->

                    </div> <!-- /.work-image-->
                </li>
                <!--End Work Item -->

                <!-- Work Item -->
                <li class="work-item thumnail-img mix event">
                    <div class="work-image">
                        <img src="{{ asset('assets/images/galeria/7.png') }}" alt="thumbnail">

                        <!--Hover link-->
                        <div class="hover-link">

                            <a href="{{ asset('assets/images/galeria/7.png') }}" class="popup-image">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <!--End link-->

                        <!--Hover Caption-->
                        <div class="work-caption">
                            <h4>Project Title</h4>
                            <p>Photography</p>
                        </div>
                        <!--End Caption-->

                    </div> <!-- /.work-image-->
                </li>
                <!--End Work Item -->

                <!-- Work Item -->
                <li class="work-item thumnail-img mix corporate">
                    <div class="work-image">
                        <img src="{{ asset('assets/images/galeria/8.png') }}" alt="thumbnail">

                        <!--Hover link-->
                        <div class="hover-link">

                            <a href="{{ asset('assets/images/galeria/8.png') }}" class="popup-image">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <!--End link-->

                        <!--Hover Caption-->
                        <div class="work-caption">
                            <h4>Project Title</h4>
                            <p>Photography</p>
                        </div>
                        <!--End Caption-->

                    </div> <!-- /.work-image-->
                </li>
                <!--End Work Item -->

                <!-- Work Item -->
                <li class="work-item thumnail-img mix event">
                    <div class="work-image">
                        <img src="{{ asset('assets/images/galeria/6.png') }}" alt="thumbnail">

                        <!--Hover link-->
                        <div class="hover-link">

                            <a href="{{ asset('assets/images/galeria/6.png') }}" class="popup-image">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <!--End link-->

                        <!--Hover Caption-->
                        <div class="work-caption">
                            <h4>Project Title</h4>
                            <p>Photography</p>
                        </div>
                        <!--End Caption-->

                    </div> <!-- /.work-image-->
                </li>
                <!--End Work Item -->

                <!-- Work Item -->
                <li class="work-item thumnail-img mix wedding">
                    <div class="work-image">
                        <img src="{{ asset('assets/images/galeria/1.png') }}" alt="thumbnail">

                        <!--Hover link-->
                        <div class="hover-link">

                            <a href="{{ asset('assets/images/galeria/1.png') }}" class="popup-image">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <!--End link-->

                        <!--Hover Caption-->
                        <div class="work-caption">
                            <h4>Project Title</h4>
                            <p>Photography</p>
                        </div>
                        <!--End Caption-->

                    </div> <!-- /.work-image-->
                </li>
                <!--End Work Item -->

                <!-- Work Item -->
                <li class="work-item thumnail-img mix fashion">
                    <div class="work-image">
                        <img src="{{ asset('assets/images/galeria/2.png') }}" alt="thumbnail">

                        <!--Hover link-->
                        <div class="hover-link">

                            <a href="{{ asset('assets/images/galeria/2.png') }}" class="popup-image">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <!--End link-->

                        <!--Hover Caption-->
                        <div class="work-caption">
                            <h4>Project Title</h4>
                            <p>Photography</p>
                        </div>
                        <!--End Caption-->

                    </div> <!-- /.work-image-->
                </li>
                <!--End Work Item -->

                <!-- Work Item -->
                <li class="work-item thumnail-img mix corporate">
                    <div class="work-image">
                        <img src="{{ asset('assets/images/galeria/3.png') }}" alt="thumbnail">

                        <!--Hover link-->
                        <div class="hover-link">

                            <a href="{{ asset('assets/images/galeria/3.png') }}" class="popup-image">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <!--End link-->

                        <!--Hover Caption-->
                        <div class="work-caption">
                            <h4>Project Title</h4>
                            <p>Photography</p>
                        </div>
                        <!--End Caption-->

                    </div> <!-- /.work-image-->
                </li>
                <!--End Work Item -->
            </ul>

        </div>
    </section>

    <section id="facts" class="section parallax">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div>
                    <h4 style="color: #fff;font-size: 25px; margin-bottom: 20px;" class="text-center">Estamos listos
                        para recibirte</h4>
                    <p style="color: #fff;font-size: 20px;" class="text-center">Los servicios los encuentras en las
                        distintas instalaciones de DIF Tecámac, encuentra el más cercano a tu domicilio. </p>
                    <div class="text-center">
                        <li class="filter" data-filter="fashion" style="text-transform: none;color:#fff;">
                            Directorio</li>
                    </div>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

    <section class="section" style="padding-top: 0%; background: #d4447c">
        <div class="container">
            <div class="row">
                <div class="tab-content-main">
                    <div class="container">
                        <div class="col-md-6">
                            <div class="info">
                                <h4 class="title-col">unidad administrativa dif tecámac</h4>
                                <p style="color: #fff;font-size:18px;">Vestibulum tortor quam, feugiat vitae, ultricies
                                    eget, tempor sit
                                    amet. Et netus et malesuada fames ac turpis egestas tristique
                                    senectus. </p>
                                <h4 class="title-col" style="margin-top: 2%;">Teléfono de contacto</h4>
                                <p style="color: #fff;font-size:18px;">Tel: (55) - 5938 - 8260</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info">
                                <h4 class="title-col">correo electrónico de contacto</h4>
                                <p style="color: #fff;font-size:18px;">diftecamac19.21@gmail.com</p>
                            </div>
                            <div class="row" style="margin-top: 10%;">
                                <div class="col-md-6">
                                    <h4 class="subtitle-col cursor-pointer">
                                        <i class="fas fa-link margin-right-5"></i>
                                        Mejora Regulatoria
                                    </h4>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="subtitle-col cursor-pointer">
                                        <i class="fas fa-link margin-right-5"></i>
                                        Transparencia
                                    </h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="subtitle-col cursor-pointer">
                                        <i class="fas fa-link margin-right-5"></i>
                                        Aviso de privacidad
                                    </h4>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="subtitle-col cursor-pointer">
                                        <i class="fas fa-link margin-right-5"></i>
                                        Denuncias y/o Quejas
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- /.row-->
        </div> <!-- /.container-->
    </section>

    <section class="section" style="padding-top: 0%">
        <div class="container">
            <div class="row">
                <div class="tab-content-main">
                    <div class="container">
                        <div class="row" style="margin-bottom:5%;">
                            <div class="col-md 6">
                                <h4 style="color: #d4447c;font-size: 25px; margin-bottom: 20px;">Misión</h4>
                                <p style="line-height: 35px;color:#000;font-size: 20px;text-align: justify;">
                                    Desarrollar programas de asistencia social mediante modelos innovadores con
                                    enfoque humano vanguardista, que mejoren la calidad de vida de las personas,
                                    familias y sociedad, a traves de actividades orientadas a mejorar su salud,
                                    educación y economía: resaltando y fomentando sus derechos humanos.
                                </p>
                            </div>
                            <div class="col-md 6 img-md">
                                <img src="{{ asset('assets/images/others/mision.png') }}" alt="">
                            </div>
                        </div>
                        <div class="row" style="margin-top:5%;">
                            <div class="col-md 6" style="margin-right: 8%">
                                <img src="{{ asset('assets/images/others/vision.png') }}" alt="">
                            </div>
                            <div class="col-md 6">
                                <h4 style="color: #d4447c;font-size: 25px; margin-bottom: 20px;" class="text">Visión</h4>
                                <p style="line-height: 35px;color:#000;font-size: 20px;text-align:justify;">Trabajar en
                                    coordinación con
                                    instituciones y organismos de los diversos sectores, para crear una cultura
                                    solidaria en
                                    beneficio de las familias y personas en situación de vulnerabilidad; implementando
                                    programas que les permitan
                                    mejorar las condiciones de vida personal, familiar y social, respetando y fomentando
                                    sus derechos.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- /.row-->
        </div> <!-- /.container-->
    </section>

    <section id="home" class="home">
        <div class="flexslider">
            <ul class="slides scroll">
                <li class="first">
                    <img style="width: 100%;background-size:cover;"
                        src="{{ asset('assets/images/others/ubris-inicio.png') }}" alt="">
                </li>
            </ul>
        </div>
    </section>
    <section class="section" style="padding-top: 0%;margin-bottom: 4%;">
        <div class="container">
            <div class="row">
                <div class="tab-content-main">
                    <div class="container margin-bottom-60">
                        <div class="tab-content">
                            <div class="tab-pane active in" id="tab-content-1">
                                <div class="margin-bottom-30">
                                    <div class="tab1-features">
                                        <div class="info">
                                            <h4>Requisitos</h4>
                                            <div class="margin-left-20">
                                                <div style="display: flex;align-items: center;justify-items: center;">
                                                    <h4 style="font-weight: normal">1. </h4>
                                                    <p style="font-size: 20px;color:#000">
                                                        Pasar con el médico especialista para que determine el
                                                        diagnostico,
                                                        tratamiento y tipo del mismo.
                                                    </p>
                                                </div>
                                                <div style="display: flex;align-items: center;">
                                                    <h4 style="font-weight: normal">2. </h4>
                                                    <p style="font-size: 20px;color:#000">
                                                        Acudir a trabajo social despues de que el médico determine que
                                                        requiere
                                                        el servicio de UBRIS.
                                                    </p>
                                                </div>
                                            </div>
                                            <div
                                                style="display: flex;align-items: center;justify-items: center;padding-right: 0px;">
                                                <img style="width: 3%;margin:25px;"
                                                    src="{{ asset('assets/images/icons/icono-requisitos.png') }}"
                                                    alt="">
                                                <h4 style="font-size: 20px;text-transform: uppercase;">dos copias de los
                                                    siguientes documentos:</h4>
                                            </div>
                                            <div class="margin-left-20">
                                                <p style="font-size: 20px;color:#000">
                                                    Acta de nacimiento en tamaño carta.
                                                </p>
                                                <p style="font-size: 20px;color:#000">
                                                    Comprobante de domicilio no mayor a 3 meses.
                                                </p>
                                                <p style="font-size: 20px;color:#000">
                                                    CURP en formato actual.
                                                </p>
                                                <p style="font-size: 20px;color:#000">
                                                    IFE o INE actualizada, ampliada al 150%.
                                                </p>
                                                <p style="font-size: 20px;color:#000">
                                                    3 fotografías tamaño infantil actualizadas del paciente.
                                                </p>
                                            </div>
                                            <div
                                                style="display: flex;align-items: center;justify-items: center;padding-right: 0px;">
                                                <img style="width: 3%;margin:25px;"
                                                    src="{{ asset('assets/images/icons/icono-requisitos.png') }}"
                                                    alt="">
                                                <h4 style="font-size: 20px;line-height: 35px;text-align: justify">
                                                    EN CASO DE SER MENOR DE EDAD ADEMÁS DE LOS DOCUMENTOS ANTERIORES,
                                                    DEBEN
                                                    TRAER LOS SIGUIENTES DOCUMENTOS
                                                </h4>
                                            </div>
                                            <div class="margin-left-20">
                                                <p style="font-size: 20px;color:#000">
                                                    Acta de nacimiento en tamaño carta del menor.
                                                </p>
                                                <p style="font-size: 20px;color:#000">
                                                    CURP del menor en formato actual.
                                                </p>
                                                <p style="font-size: 20px;color:#000">
                                                    3 fotografías tamaño infantil.
                                                </p>
                                                <p style="font-size: 20px;color:#000">
                                                    Comprobante de domicilio no mayor a 3 meses (en caso de que el menor
                                                    viva en un domicilio diferente).
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- /.row-->
        </div> <!-- /.container-->
    </section>

    <section id="comunicacion" class="section">
        <div class="container">
            <div class="row">

                <div class="title-box text-center">
                    <h2 class="title">Comunicación</h2>
                </div>

                <div class="col-md-4">
                    <div class="blog-post">
                        <div class="post-media">
                            <img src="{{ asset('assets/images/blog/com-1.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-post">
                        <div class="post-media">
                            <img src="{{ asset('assets/images/blog/com-2.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-post">
                        <div class="post-media">
                            <img src="{{ asset('assets/images/blog/com-3.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-post">
                        <div class="post-media">
                            <img src="{{ asset('assets/images/blog/com-4.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-post">
                        <div class="post-media">
                            <img src="{{ asset('assets/images/blog/com-5.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-post">
                        <div class="post-media">
                            <img src="{{ asset('assets/images/blog/com-6.png') }}" alt="">
                        </div>
                    </div>
                </div>

            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>

    <section id="contacto" class="section" style="background-position: center 0;
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;background-image: url({{ asset('assets/images/others/informacion.jpeg') }});">
        <div class="container">
            <div class="row">
                <div class="title-box text-center white margin-top-40">
                    <h2 class="title" style="text-transform: uppercase;">Información de contacto</h2>
                </div>
            </div>

            <div class="col-md-8 col-md-offset-2 contact-form">
                <div class="contact-info text-center">
                    <div style="display: flex;align-items:center; justify-content:center;">
                        <i class="fas fa-map-marker-alt" style="font-size: 60px;margin:15px;color:#fff;"></i>
                        <p style=" font-size: 25px; font-weight: lighter;line-height: 40px">Mandarinas S/ N Esq.
                            Naranjos, Col. Fracc.
                            Ojo de Agua, C.P. 55770</p>
                    </div>
                    <div style="display: flex;align-items:center; justify-content:center; margin-top: 60px;">
                        <i class="fas fa-phone" style="font-size: 60px;margin:15px;color:#fff;"></i>
                        <p style=" font-size: 25px; font-weight: lighter;line-height: 40px">
                            (55) 49 77 45 56
                            <br>
                            <br>
                            <br>
                            (55) 49 77 44 64
                        </p>
                    </div>
                    <div style="display: flex;align-items:center; justify-content:center; margin-top: 60px;">
                        <i class="far fa-calendar-alt" style="font-size: 60px;margin:15px;color:#fff;"></i>
                        <p style=" font-size: 25px; font-weight: lighter;line-height: 40px">
                            Lunes a Viernes de 9:00 am a 5:00 pm
                            <br>
                            <br>
                            <br>
                            Sabados de 9:00 am a 01:00 pm
                        </p>
                    </div>
                    <div style="display: flex;align-items:center; justify-content:center; margin-top: 60px;">
                        <i class="far fa-user-alt" style="font-size: 60px;margin:15px;color:#fff;"></i>
                        <p
                            style=" font-size: 25px; font-weight: lighter;line-height: 40px text-transform: uppercase; line-height: 35px;">
                            Coordinador de la unidad básica de rehabilitación e integración social u.b.r.i.s tecámac
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <!--Start copyright-->
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="copyright">
                        <p>Copyright © 2021 All Rights reserved by: DIF Tecámac</a>
                        </p>
                    </div>
                </div>
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
