@extends('layouts.default')
@section('content')

<div id="wrapper">


    <!-- Sidebar -->
    <div id="sidebar-wrapper">



        <div id="sidebar-wrapper-content">
            <div class="section-title">
                <a class="btn btn-link" href="/claims"><i class="icon-circle-left"></i> Volver</a><br/>
<!--                <a class="btn btn-lg btn-clear"><i class="glyphicon glyphicon-thumbs-up icon-float"></i> Apoyo el Reclamo (5)</a><br/>-->
<!--                <a class="btn btn-lg btn-clear"><i class="icon-bubbles icon-float"></i> Pedir informacion</a>-->
            </div>
            <div class="row reclamo">
                <div class="col-md-2 text-right">
                    <a class="link-map" href="javascript:void(0)"><div class="img-reclamo basura"></div></a>
                </div>
                <div class="col-md-10">
                    <h3><a href="javascript:void(0)">{{$claim->title}}</a> <small>{{$user_name}}</small></h3>
                    <div><span class="badge success">Verificado</span><span> {{date("F/j/Y G:i", strtotime($claim->created_at))}}</span></div>
                    <p>{{$claim->description}}</p>
<!--                    <p>Quiero compartir este reclamo en: <a href="javascript:void(0)"><i class="icon-facebook2 icon-medium"></i></a></p>-->
                    <img class="img-responsive" src="/{{$claim->image_url}}"/>
                </div>

            </div>

        </div>



    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <a href="#menu-toggle" class="btn-toogle" id="menu-toggle"><span class="icon-cross icon-medium"></span></a>

        <div class="map">

            <!-- el mapa puede ir en cualquiere formato que manejes pero siempre al 100% de altura y ancho-->
            <h1>o_O mapita O.o</h1>
<!--            <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en-US&amp;geocode=&amp;q=cochabamba+bolivia&amp;aq=&amp;sll=40.649987,-73.950002&amp;sspn=0.060301,0.132093&amp;gl=US&amp;ie=UTF8&amp;hq=&amp;hnear=Cochabamba,+Cercado,+Cochabamba+Dept,+Bolivia&amp;t=m&amp;z=12&amp;ll=-17.383333,-66.166667&amp;output=embed"></iframe>-->


        </div>

    </div>
    <!-- /#page-content-wrapper -->



</div>

@stop