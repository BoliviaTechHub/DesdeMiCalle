@extends('layouts.default')
@section('content')

<div id="main-content">
    {{ Form::open( ['route' => 'claims.store', 'class' => 'form-horizontal'] ) }}
    <div id="rootwizard">
        <div class="navbar">
            <div class="navbar-inner">
                <ul class="nav">
                    <li><a href="#tab1" data-toggle="tab"><span class="badge">1</span> ¿Cuál es tu reclamo?</a></li>
                    <li><a href="#tab2" data-toggle="tab"><span class="badge">2</span> ¿Dónde esta tu reclamo?</a></li>
                </ul>
            </div>
        </div>
        <div class="tab-content well">
            <div class="tab-pane" id="tab1">
                <label>Es un reclamo <a href=""></a>cerca de:</label><br/>
                <ul class="nav nav-pills" id="reclamos-descripcion">
                    @if ($categories->count())
                        @foreach ($categories as $category)
                            @if ($category->parentId == 0)
                                <li><a href="#{{$category->class}}"><div class="img-reclamo {{$category->class}}"></div><span>{{$category->name}}</span></a></li>
                            @endif
                        @endforeach
                    @else
                        <p>Acutalmente no existen categorías.</p>
                    @endif
                </ul>

                <div class="tab-content">
                    @if ($categories->count())
                        @foreach ($categories as $category)
                            @if ($category->parentId == 0)
                                <div class="tab-pane" id="{{$category->class}}">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">¿Cuál es el problema?</label>
                                        <div class="col-sm-10 btn-group" data-toggle="buttons">
                                            @foreach ($categories as $childCategory)
                                                @if ($childCategory->parentId == $category->id)
                                                    <label class="btn btn-primary">
                                                        <input type="radio" name="categoryId" value="{{$childCategory->id}}" autocomplete="off"> {{$childCategory->name}}
                                                    </label>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label class="col-sm-2 control-label">¿Algo mas que quieras decir?</label>
                        <div class="col-sm-10">
                            {{ Form::textarea('description', null, ['class' => '', 'placeholder' => 'Descripción', 'rows' => '4', 'cols' => '50']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab2">
                <div class="row">
                    <div class="col-sm-8">
                        <label>Ubica tu reclamo en el mapa</label>
                        <div id="map" style="width: 600px; height: 400px"></div>
                        <input id="latitude" type="hidden" name="latitude" value="0">
                        <input id="longitude" type="hidden" name="longitude" value="0">
                    </div>
                    <div class="col-sm-4">
                        <label>¿Tienes alguna fotografia?</label>
                    </div>
                </div>
            </div>
            <div class="clear-fix"></div>
        </div>
        <ul class="pager wizard">
            <li class="previous first" style="display:none;"><a href="#"><i class="icon-circle-left"></i> Inicio</a></li>
            <li class="previous"><a href="#"><i class="icon-circle-left"></i> Volver</a></li>
            {{--<li id="lastButton" class="next last" style="display:none;"><a href="javascript:void(0)">Finalizar Reclamo <i class="icon-checkmark"></i> </a></li>--}}
            {{--<li id="lastButton" class="next last" style="display:none;"><a href="javascript:void(0)">{{ Form::submit('Finalizar Reclamo', ['class' => '']) }}<i class="icon-checkmark"></i> </a></li>--}}
            <li id="lastButton" class="next last" style="display:none;"><a href="javascript:void(0)">{{ Form::submit('Finalizar Reclamo', ['class' => '']) }}<i class="icon-checkmark"></i> </a></li>
            {{--{{ Form::submit('Finalizar Reclamo', ['class' => '']) }}--}}
            <li id="nextButton" class="next"><a href="javascript:void(0)">Siguiente <i class="icon-circle-right"></i> </a></li>
        </ul>
    </div>
{{ Form::close() }}
</div>

@stop