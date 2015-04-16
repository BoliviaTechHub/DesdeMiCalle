@extends('layouts.default')
@section('content')

<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <div id="sidebar-wrapper-content">
            <img class="img-responsive logo" src="{{asset('images/logo2.png')}}"/>
            <div class="section-title">
                <h3>RECLAMOS REALIZADOS</h3>
                <p>Aquí se listan todos los reclamos registrados. <br/>También puedes:</p>
                <a class="btn btn-lg btn-clear" href="claims/create"><i class="icon-bullhorn icon-float"></i> Publicar un reclamo</a>
            </div>
            {{--<div class="section-filter">--}}
                {{--<p>Puedes filtrar los reclamos por: </p>--}}
                {{--<a href="javascript:void(0)"><div class="img-reclamo todos glyphicon glyphicon-list-alt"></div></a>--}}
                {{--<a href="javascript:void(0)" class="active"><div class="img-reclamo basura"></div></a>--}}
                {{--<a href="javascript:void(0)"><div class="img-reclamo agua"></div></a>--}}
                {{--<a href="javascript:void(0)"><div class="img-reclamo calle"></div></a>--}}
                {{--<a href="javascript:void(0)"><div class="img-reclamo luz"></div></a>--}}
                {{--<a href="javascript:void(0)"><div class="img-reclamo salud"></div></a>--}}
                {{--<a href="javascript:void(0)" class="active"><div class="img-reclamo obra"></div></a>--}}
                {{--<a href="javascript:void(0)"><div class="img-reclamo pluvial"></div></a>--}}
                {{--<form action="" method="get" id="search" class="search-form">--}}
{{--<!--                    <input type="text" class="" name="k" data-default="100" placeholder="Busca un reclamo..."/><span class="icon-search icon-medium"></span>-->--}}
                {{--</form>--}}
            {{--</div>--}}
            @if ($claims->count())
                @foreach ($claims as $claim)
                    <div class="row reclamo">
                        <div class="col-md-2 text-right">
                            <a class="link-map" href="javascript:void(0)"><div class="img-reclamo {{$claim->parentCategory->class}}"></div></a>
                        </div>
                        <div class="col-md-10">
                            <h3><a class="claim-title" data-id="{{$claim->id}}" href="/claims/{{$claim->id}}" data-latitude="{{$claim->latitude}}" data-longitude="{{$claim->longitude}}" data-title="{{$claim->title}}" data-url="/claims/{{$claim->id}}" data-class="{{$claim->parentCategory->class}}">{{$claim->title}}</a> <small>{{$claim->user_name}}</small></h3>
                            <div><span class="badge success">Verificado</span><span> {{date("F/j/Y G:i", strtotime($claim->created_at))}}</span></div>
                            {{--<p>{{$claim->description}}</p>--}}
                        </div>
                    </div>
                @endforeach
            @else
                <p>Actualmente, no existen reclamos.</p>
            @endif
        </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <a href="#menu-toggle" class="btn-toogle" id="menu-toggle"><span class="icon-cross icon-medium"></span></a>
        <div class="map">
            <div id="claims-index-map" style="height:100%; width:100%;"></div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>
@stop