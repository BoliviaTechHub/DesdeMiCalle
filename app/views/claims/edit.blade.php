@extends('layouts.default')
@section('content')

    <div id="main-content">
        <div class="container">

            {{ Form::open( ['route' => 'claims.update', 'class' => 'form-horizontal ng-pristine ng-valid', 'role' => 'form', 'files' => true] ) }}
            {{ Form::hidden('id', $claim->id)}}
                <div class="form-group col-md-12 titulo">
                    <h3 class="col-md-4">EDITAR RECLAMO</h3>
                    <h5 class="col-md-4 date-style">Fecha de Creación: {{$claim->created_at}}</h5>
                    <h5 class="col-md-4 date-style">Fecha de Modificación: {{$claim->updated_at}}</h5>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label">Título del Reclamo</label>
                    <div class="col-md-8">
                        <input class="form-control" id="focusedInput" type="text" placeholder="Título del Reclamo" name="title" value="{{$claim->title}}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label">Descripcion del Reclamo</label>
                    <div class="col-md-8">
                        <input class="form-control" id="focusedInput" type="text" placeholder="Descripción del reclamo" name="description" value="{{$claim->description}}">
                    </div>
                </div>
                {{--<div class="form-group col-md-6" id="rootwizard">--}}
                    {{--<label>Es un reclamo acerca de:</label><br/>--}}
                    {{--<ul class="nav nav-pills" id="reclamos-descripcion">--}}
                        {{--<li class="active"><a href="#basura"><div class="img-reclamo basura"></div><span>Basura</span></a></li>--}}
                        {{--<li><a href="#agua"><div class="img-reclamo agua"></div><span>Agua</span></a></li>--}}
                        {{--<li><a href="#calle"><div class="img-reclamo calle"></div><span>Calles y plazas</span></a></li>--}}
                        {{--<li><a href="#luz"><div class="img-reclamo luz"></div><span>Luz y electricidad</span></a></li>--}}
                        {{--<li><a href="#salud"><div class="img-reclamo salud"></div><span>Salud y ambulancias</span></a></li>--}}
                        {{--<li><a href="#obra"><div class="img-reclamo obra"></div><span>Edificios y/o infraestructuras</span></a></li>--}}
                        {{--<li><a href="#pluvial"><div class="img-reclamo pluvial"></div><span>Cloacas y/o pluviales</span></a></li>--}}
                    {{--</ul>--}}

                    {{--<div class="tab-content">--}}
                        {{--<div class="tab-pane active" id="basura">--}}
                            {{--<form class="form-horizontal">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-sm-2 control-label">¿Cuál es el problema?</label>--}}
                                    {{--<div class="col-sm-10 btn-group" data-toggle="buttons">--}}
                                        {{--<label class="btn btn-primary active">--}}
                                            {{--<input type="radio" name="options" id="option1" autocomplete="off" checked> fdsfd--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option2" autocomplete="off"> La obra está detina--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option3" autocomplete="off"> La obra está mal hecha--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option3" autocomplete="off"> Deberían hacer una obra--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane" id="agua">--}}
                            {{--<form class="form-horizontal">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-sm-2 control-label">¿Cuál es el problema?</label>--}}
                                    {{--<div class="col-sm-10 btn-group" data-toggle="buttons">--}}
                                        {{--<label class="btn btn-primary active">--}}
                                            {{--<input type="radio" name="options" id="option1" autocomplete="off" checked> 4534--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option2" autocomplete="off"> La obra está detina--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option3" autocomplete="off"> La obra está mal hecha--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option3" autocomplete="off"> Deberían hacer una obra--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane" id="calle">--}}
                            {{--<form class="form-horizontal">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-sm-2 control-label">¿Cuál es el problema?</label>--}}
                                    {{--<div class="col-sm-10 btn-group" data-toggle="buttons">--}}
                                        {{--<label class="btn btn-primary active">--}}
                                            {{--<input type="radio" name="options" id="option1" autocomplete="off" checked> saasfaf--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option2" autocomplete="off"> La obra está detina--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option3" autocomplete="off"> La obra está mal hecha--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option3" autocomplete="off"> Deberían hacer una obra--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane" id="luz">--}}
                            {{--<form class="form-horizontal">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-sm-2 control-label">¿Cuál es el problema?</label>--}}
                                    {{--<div class="col-sm-10 btn-group" data-toggle="buttons">--}}
                                        {{--<label class="btn btn-primary active">--}}
                                            {{--<input type="radio" name="options" id="option1" autocomplete="off" checked> fdnhnghhgnsfd--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option2" autocomplete="off"> La obra está detina--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option3" autocomplete="off"> La obra está mal hecha--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option3" autocomplete="off"> Deberían hacer una obra--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane" id="salud">--}}
                            {{--<form class="form-horizontal">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-sm-2 control-label">¿Cuál es el problema?</label>--}}
                                    {{--<div class="col-sm-10 btn-group" data-toggle="buttons">--}}
                                        {{--<label class="btn btn-primary active">--}}
                                            {{--<input type="radio" name="options" id="option1" autocomplete="off" checked> fderrrrrrsfd--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option2" autocomplete="off"> La obra está detina--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option3" autocomplete="off"> La obra está mal hecha--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option3" autocomplete="off"> Deberían hacer una obra--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane" id="obra">--}}
                            {{--<form class="form-horizontal">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-sm-2 control-label">¿Cuál es el problema?</label>--}}
                                    {{--<div class="col-sm-10 btn-group" data-toggle="buttons">--}}
                                        {{--<label class="btn btn-primary active">--}}
                                            {{--<input type="radio" name="options" id="option1" autocomplete="off" checked> fdsfdhrthtrhrthr--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option2" autocomplete="off"> La obra está detina--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option3" autocomplete="off"> La obra está mal hecha--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option3" autocomplete="off"> Deberían hacer una obra--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane" id="pluvial">--}}
                            {{--<form class="form-horizontal">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-sm-2 control-label">¿Cuál es el problema?</label>--}}
                                    {{--<div class="col-sm-10 btn-group" data-toggle="buttons">--}}
                                        {{--<label class="btn btn-primary active">--}}
                                            {{--<input type="radio" name="options" id="option1" autocomplete="off" checked> fdsfdwrqrerqe--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option2" autocomplete="off"> La obra está detina--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option3" autocomplete="off"> La obra está mal hecha--}}
                                        {{--</label>--}}
                                        {{--<label class="btn btn-primary">--}}
                                            {{--<input type="radio" name="options" id="option3" autocomplete="off"> Deberían hacer una obra--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-6">--}}
                    {{--<label>Ubica tu reclamo en el mapa</label>--}}
                    {{--<div class="map">--}}
                        {{--<!-- el mapa puede ir en cualquiere formato que manejes pero siempre al 100% de altura y ancho-->--}}
                        {{--<iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en-US&amp;geocode=&amp;            q=cochabamba+bolivia&amp;aq=&amp;sll=40.649987,-73.950002&amp;sspn=0.060301,0.132093&amp;gl=US&amp;ie=UTF8&amp;hq=&amp;hnear=Cochabamba,+Cercado,+Cochabamba+Dept,+Bolivia&amp;t=m&amp;z=12&amp;            ll=-17.383333,-66.166667&amp;output=embed"></iframe>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-6">--}}
                    {{--<label class="col-md-4 control-label">Usuario</label>--}}
                    {{--<div class="col-md-8">--}}
                        {{--<input class="form-control" id="focusedInput" type="text" placeholder="Ej. jperez">--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label">Estado de verificación</label>
                    <div class="col-md-8">
                        <div class="onoffswitch">
                            <input type="checkbox" name="isChecked" class="onoffswitch-checkbox" id="myonoffswitch" @if($claim->isChecked) checked @endif>
                            <label class="onoffswitch-label verificado" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                    </div>
                </div>

                {{--<div class="form-group col-md-6">--}}
                    {{--<label class="col-md-4 control-label">Status</label>--}}
                    {{--<div class="col-md-8">--}}
                        {{--<div class="onoffswitch">--}}
                            {{--<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>--}}
                            {{--<label class="onoffswitch-label" for="myonoffswitch">--}}
                                {{--<span class="onoffswitch-inner"></span>--}}
                                {{--<span class="onoffswitch-switch"></span>--}}
                            {{--</label>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group col-md-6">--}}
                    {{--<label class="col-md-4 control-label">Cambiar Imagen</label>--}}
                    {{--<div class="col-md-8">--}}
                        {{--<input type="file" id="exampleInputFile">--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="col-md-12 text-center bottom-bar">
                    <button type="submit" class="btn btn-primary btn-sm">Guadar Datos</button>
                    {{--<button type="submit" class="btn btn-danger btn-sm">Eliminar Reclamo Definitivamente</button>--}}
                </div>
            {{ Form::close() }}
        </div>

    </div>
@stop