@extends('layouts.box')
@section('content')
    <section id="home" class="home">
        <div class="flexslider">
            <ul class="slides scroll">
                <li class="first">
                    <img style="height: 100%" src="{{ asset('assets/images/others/ubris-inicio.png') }}" alt="">
                </li>
            </ul>
        </div>
    </section>
    <section class="section" style="padding-top: 0%;margin-bottom: 10%;">
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
                                                        Pasar con el médico especialista para que determine el diagnostico,
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
                                                    src="{{ asset('assets/images/icons/icono-requisitos.png') }}" alt="">
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
                                                    src="{{ asset('assets/images/icons/icono-requisitos.png') }}" alt="">
                                                <h4 style="font-size: 20px;line-height: 35px;text-align: justify">
                                                    EN CASO DE SER MENOR DE EDAD ADEMÁS DE LOS DOCUMENTOS ANTERIORES, DEBEN
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
@endsection
