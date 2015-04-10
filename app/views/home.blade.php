@extends('layouts.default')
@section('content')

<div class="pre-loader">
    <div class="load-con">
        <span class="icon-location icon-big"></span>
        <p>Un Momento por favor</p>
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
</div>

<div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"><i class="icon-bullhorn"></i></li>
        <li data-target="#myCarousel" data-slide-to="1"><i class="icon-binoculars"></i></li>
        <li data-target="#myCarousel" data-slide-to="2"><i class="icon-bubbles"></i></li>
    </ol>
    <!-- Wrapper for Slides -->
    <div class="carousel-inner">
        <div class="fixed-brand"><img class="img-responsive" src="{{asset('images/logoinv.png')}}"/><div class="city">La Paz</div>
            <img class="img-responsive" src="{{asset('images/logo-hivos.png')}}"/>
        </div>
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('{{asset("images/slide/1.jpg")}}');"></div>
            <div class="carousel-caption">
                <div class="col-md-5"><div class="view-mobile"><img class="img-responsive" src="{{asset('images/logoinv.png')}}"/><div class="city">La Paz</div></div></div>
                <div class="col-md-7">
                    <a class="btn btn-lg btn-clear" href="/claims/create"><i class="icon-bullhorn icon-float"></i> Quiero publicar un reclamo</a>
                    <h2>¿Como funciona?</h2>
                    <p>Somos la plataforma que te permite realizar reclamos en linea sobre asuntos urbanos.</p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-circle">
                                <span>1</span>
                                <i class="icon-bubble icon-big icon-vertical"></i>
                            </div>
                            <p>Descríbenos tu reclamo</p>
                        </div>
                        <div class="col-md-4">
                            <div class="icon-circle">
                                <span>2</span>
                                <i class="icon-location icon-big icon-vertical"></i>
                            </div>
                            <p>Localizalo en el mapa</p>
                        </div>
                        <div class="col-md-4">
                            <div class="icon-circle">
                                <span>3</span>
                                <i class="icon-binoculars icon-big icon-vertical"></i>
                            </div>
                            <p>Monitorea el avance</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <!-- Set the second background image using inline CSS below. -->
            <div class="fill" style="background-image:url({{asset('images/slide/2.jpg')}}');"></div>
            <div class="carousel-caption">
                <div class="col-md-offset-5 col-md-7">
                    {{--<a class="btn btn-lg btn-clear" href="/publicWorks"><i class="icon-binoculars icon-float"></i> Quiero ver las obras públicas</a>--}}
                    <a class="btn btn-lg btn-clear" href="javascript:void(0)"><i class="icon-binoculars icon-float"></i> Proximamente...</a>
                    <h2>Monitorea Obras Publicas</h2>
                    <p>Existe un conjunto de obras públicas que puedes monitorear para mejorar tu ciudad. <br/> No te quedes callado, ¡habla por tu ciudad!</p>
                </div>
            </div>
        </div>
        <div class="item">
            <!-- Set the third background image using inline CSS below. -->
            <div class="fill" style="background-image:url({{asset('images/slide/3.jpg')}});"></div>
            <div class="carousel-caption">
                <div class="col-md-offset-5 col-md-7">
                    {{--<a class="btn btn-lg btn-clear" href="/informationRequests/create"><i class="icon-bubbles icon-float"></i> Quiero pedir información</a>--}}
                    <a class="btn btn-lg btn-clear" href="javascript:void(0)"><i class="icon-bubbles icon-float"></i> Proximamente...</a>
                    <h2>Consulta sobre las Obras Publicas</h2>
                    <p>¿Hay alguna obra que esta siendo monitoreada sobre la que necesitas información? <br/> Realiza tu consulta</p>
                </div>
            </div>
        </div>
    </div>
</div>

@stop