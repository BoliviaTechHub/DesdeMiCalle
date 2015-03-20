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
                <p><input type='text' name='name' id='name' placeholder='Enter Your Name'>  para que veas como valida el wizard esta es la web http://vadimg.com/twitter-bootstrap-wizard-example/#demo</p>
                <div class="row">
                    <div class="col-sm-8">
                        <label><U></U><bica></bica> tu reclamo <e></e>n el mapa</label>
                        <div class="map">
                            <!-- el mapa puede ir en cualquiere formato que manejes pero siempre al 100% de altura y ancho-->
                            <!--                <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en-US&amp;geocode=&amp;            q=cochabamba+bolivia&amp;aq=&amp;sll=40.649987,-73.950002&amp;sspn=0.060301,0.132093&amp;gl=US&amp;ie=UTF8&amp;hq=&amp;hnear=Cochabamba,+Cercado,+Cochabamba+Dept,+Bolivia&amp;t=m&amp;z=12&amp;            ll=-17.383333,-66.166667&amp;output=embed"></iframe>-->
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label>¿Tienes <alg></alg><un></un>a fotografia?</label>
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