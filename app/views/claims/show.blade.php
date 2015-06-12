@extends('layouts.default')
@section('content')

<div id="wrapper">


    <!-- Sidebar -->
    <div id="sidebar-wrapper">



        <div id="sidebar-wrapper-content">
            <div class="section-title">
                <a class="btn btn-link" href="/claims"><i class="icon-circle-left"></i> Volver</a><br/>
                {{--<a id="supportToClaimButton" class="btn btn-lg btn-clear" data-claimId="{{$claim->id}}"><i class="glyphicon glyphicon-thumbs-up icon-float"></i> Apoyo el Reclamo (5)</a><br/>--}}
<!--                <a class="btn btn-lg btn-clear"><i class="icon-bubbles icon-float"></i> Pedir informacion</a>-->
            </div>
            <div class="row reclamo">
                <div class="col-md-2 text-right">
                    <a class="link-map" href="javascript:void(0)"><div class="img-reclamo {{$claim->parentCategory->class}}"></div></a>
                </div>
                <div class="col-md-10">
                    <h4 class="problema">{{$claim->childCategory->name}}</h4>
                    <h3><a id="claim-title" href="javascript:void(0)" data-title="{{$claim->title}}" data-url="/claims/{{$claim->id}}" data-latitude="{{$claim->latitude}}" data-longitude="{{$claim->longitude}}">{{$claim->title}}</a> <small>{{$user_name}}</small></h3>
                    <div>
                        @if($claim->isChecked)
                            <span class="badge success">Verificado</span>
                        @else
                            <span class="badge">No verificado</span>
                        @endif
                        <span> {{date("F/j/Y G:i", strtotime($claim->created_at))}}</span>
                    </div>
                    <p>{{$claim->description}}</p>
<!--                    <p>Quiero compartir este reclamo en: <a href="javascript:void(0)"><i class="icon-facebook2 icon-medium"></i></a></p>-->
                    @if ($claim->image_url)
                        <img class="img-responsive" src="/{{$claim->image_url}}"/>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <a href="#menu-toggle" class="btn-toogle" id="menu-toggle"><span class="icon-cross icon-medium"></span></a>

        <div class="map">
            <div id="show-claim-map" style="height:100%; width:100%;"></div>
        </div>

    </div>
    <!-- /#page-content-wrapper -->



</div>

@stop