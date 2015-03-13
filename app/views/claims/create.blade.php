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
    <label>Es un reclamo acerca de:</label><br/>
    <ul class="nav nav-pills" id="reclamos-descripcion">
        <li class="active"><a href="#basura"><div class="img-reclamo basura"></div><span>Basura</span></a></li>
        <li><a href="#agua"><div class="img-reclamo agua"></div><span>Agua</span></a></li>
        <li><a href="#calle"><div class="img-reclamo calle"></div><span>Calles y plazas</span></a></li>
        <li><a href="#luz"><div class="img-reclamo luz"></div><span>Luz y electricidad</span></a></li>
        <li><a href="#salud"><div class="img-reclamo salud"></div><span>Salud y ambulancias</span></a></li>
        <li><a href="#obra"><div class="img-reclamo obra"></div><span>Edificios y/o infraestructuras</span></a></li>
        <li><a href="#pluvial"><div class="img-reclamo pluvial"></div><span>Cloacas y/o pluviales</span></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="basura">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">¿Cuál es el problema?</label>
                    <div class="col-sm-10 btn-group" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked> fdsfd
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="option2" autocomplete="off"> La obra está detina
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="option3" autocomplete="off"> La obra está mal hecha
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="option3" autocomplete="off"> Deberían hacer una obra
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">¿Algo mas que quieras decir?</label>
                    <div class="col-sm-10">
                        {{ Form::textarea('description', null, ['class' => '', 'placeholder' => 'Descripción', 'rows' => '4', 'cols' => '50']) }}
                    </div>
                </div>
            </form>
        </div>
<!--        <div class="tab-pane" id="agua">-->
<!--            <form class="form-horizontal">-->
<!--                <div class="form-group">-->
<!--                    <label class="col-sm-2 control-label">¿Cuál es el problema?</label>-->
<!--                    <div class="col-sm-10 btn-group" data-toggle="buttons">-->
<!--                        <label class="btn btn-primary active">-->
<!--                            <input type="radio" name="options" id="option1" autocomplete="off" checked> 4534-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="options" id="option2" autocomplete="off"> La obra está detina-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="options" id="option3" autocomplete="off"> La obra está mal hecha-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="options" id="option3" autocomplete="off"> Deberían hacer una obra-->
<!--                        </label>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label class="col-sm-2 control-label">¿Algo mas que quieras decir?</label>-->
<!--                    <div class="col-sm-10">-->
<!--                        <textarea rows="4" cols="50"></textarea>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--        <div class="tab-pane" id="calle">-->
<!--            <form class="form-horizontal">-->
<!--                <div class="form-group">-->
<!--                    <label class="col-sm-2 control-label">¿Cuál es el problema?</label>-->
<!--                    <div class="col-sm-10 btn-group" data-toggle="buttons">-->
<!--                        <label class="btn btn-primary active">-->
<!--                            <input type="radio" name="options" id="option1" autocomplete="off" checked> saasfaf-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="options" id="option2" autocomplete="off"> La obra está detina-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="options" id="option3" autocomplete="off"> La obra está mal hecha-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="options" id="option3" autocomplete="off"> Deberían hacer una obra-->
<!--                        </label>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label class="col-sm-2 control-label">¿Algo mas que quieras decir?</label>-->
<!--                    <div class="col-sm-10">-->
<!--                        <textarea rows="4" cols="50"></textarea>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--        <div class="tab-pane" id="luz">-->
<!--            <form class="form-horizontal">-->
<!--                <div class="form-group">-->
<!--                    <label class="col-sm-2 control-label">¿Cuál es el problema?</label>-->
<!--                    <div class="col-sm-10 btn-group" data-toggle="buttons">-->
<!--                        <label class="btn btn-primary active">-->
<!--                            <input type="radio" name="options" id="option1" autocomplete="off" checked> fdnhnghhgnsfd-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="options" id="option2" autocomplete="off"> La obra está detina-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="options" id="option3" autocomplete="off"> La obra está mal hecha-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="options" id="option3" autocomplete="off"> Deberían hacer una obra-->
<!--                        </label>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label class="col-sm-2 control-label">¿Algo mas que quieras decir?</label>-->
<!--                    <div class="col-sm-10">-->
<!--                        <textarea rows="4" cols="50"></textarea>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--        <div class="tab-pane" id="salud">-->
<!--            <form class="form-horizontal">-->
<!--                <div class="form-group">-->
<!--                    <label class="col-sm-2 control-label">¿Cuál es el problema?</label>-->
<!--                    <div class="col-sm-10 btn-group" data-toggle="buttons">-->
<!--                        <label class="btn btn-primary active">-->
<!--                            <input type="radio" name="options" id="option1" autocomplete="off" checked> fderrrrrrsfd-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="options" id="option2" autocomplete="off"> La obra está detina-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="options" id="option3" autocomplete="off"> La obra está mal hecha-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="options" id="option3" autocomplete="off"> Deberían hacer una obra-->
<!--                        </label>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label class="col-sm-2 control-label">¿Algo mas que quieras decir?</label>-->
<!--                    <div class="col-sm-10">-->
<!--                        <textarea rows="4" cols="50"></textarea>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--        <div class="tab-pane" id="obra">-->
<!--            <form class="form-horizontal">-->
<!--                <div class="form-group">-->
<!--                    <label class="col-sm-2 control-label">¿Cuál es el problema?</label>-->
<!--                    <div class="col-sm-10 btn-group" data-toggle="buttons">-->
<!--                        <label class="btn btn-primary active">-->
<!--                            <input type="radio" name="options" id="option1" autocomplete="off" checked> fdsfdhrthtrhrthr-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="options" id="option2" autocomplete="off"> La obra está detina-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="options" id="option3" autocomplete="off"> La obra está mal hecha-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="options" id="option3" autocomplete="off"> Deberían hacer una obra-->
<!--                        </label>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label class="col-sm-2 control-label">¿Algo mas que quieras decir?</label>-->
<!--                    <div class="col-sm-10">-->
<!--                        <textarea rows="4" cols="50"></textarea>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--        <div class="tab-pane" id="pluvial">-->
<!--            <form class="form-horizontal">-->
<!--                <div class="form-group">-->
<!--                    <label class="col-sm-2 control-label">¿Cuál es el problema?</label>-->
<!--                    <div class="col-sm-10 btn-group" data-toggle="buttons">-->
<!--                        <label class="btn btn-primary active">-->
<!--                            <input type="radio" name="options" id="option1" autocomplete="off" checked> fdsfdwrqrerqe-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="options" id="option2" autocomplete="off"> La obra está detina-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="options" id="option3" autocomplete="off"> La obra está mal hecha-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="options" id="option3" autocomplete="off"> Deberían hacer una obra-->
<!--                        </label>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label class="col-sm-2 control-label">¿Algo mas que quieras decir?</label>-->
<!--                    <div class="col-sm-10">-->
<!--                        {{ Form::textarea('description', null, ['class' => '', 'placeholder' => 'Descripción', 'rows' => '4', 'cols' => '50']) }}-->
<!--                    </div>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
    </div>
    </div>
    <div class="tab-pane" id="tab2">
        <p><input type='text' name='name' id='name' placeholder='Enter Your Name'>  para que veas como valida el wizard esta es la web http://vadimg.com/twitter-bootstrap-wizard-example/#demo</p>
        <div class="row">
            <div class="col-sm-8">
                <label>Ubica tu reclamo en el mapa</label>
                <div class="map">
                    <!-- el mapa puede ir en cualquiere formato que manejes pero siempre al 100% de altura y ancho-->
    <!--                <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en-US&amp;geocode=&amp;            q=cochabamba+bolivia&amp;aq=&amp;sll=40.649987,-73.950002&amp;sspn=0.060301,0.132093&amp;gl=US&amp;ie=UTF8&amp;hq=&amp;hnear=Cochabamba,+Cercado,+Cochabamba+Dept,+Bolivia&amp;t=m&amp;z=12&amp;            ll=-17.383333,-66.166667&amp;output=embed"></iframe>-->
                </div>
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
            <li id="lastButton" class="next last" style="display:none;"><a href="javascript:void(0)">Finalizar Reclamo <i class="icon-checkmark"></i> </a></li>
            <li id="nextButton" class="next"><a href="javascript:void(0)">Siguiente <i class="icon-circle-right"></i> </a></li>
        </ul>
    </div>
{{ Form::close() }}
</div>

<!--<div class="container">-->
<!--  <row>-->
<!--    <div class="col-md-8">-->
<!---->
<!--      <h1>Realizar Reclamo</h1>-->
<!---->
<!--      {{ Form::open( ['route' => 'claims.store', 'class' => 'form-horizontal'] ) }}-->
<!---->
<!--      <div class="form-group">-->
<!--        {{ Form::label('title', 'Título: ', ['class' => 'col-sm-3 control-label']) }}-->
<!--        <div class="col-sm-9">-->
<!--          {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título']) }}-->
<!--        </div>-->
<!--      </div>-->
<!---->
<!--      <div class="form-group">-->
<!--        {{ Form::label('description', 'Descripción: ', ['class' => 'col-sm-3 control-label']) }}-->
<!--        <div class="col-sm-9">-->
<!--          {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descripción']) }}-->
<!--        </div>-->
<!--      </div>-->
<!---->
<!--      <div class="form-group">-->
<!--        <div class="col-sm-offset-3 col-sm-8">-->
<!--          {{ Form::submit('Enviar Reclamo', ['class' => 'btn btn-default']) }}-->
<!--        </div>-->
<!--      </div>-->
<!---->
<!--      {{ Form::close() }}-->
<!---->
<!--    </div>-->
<!--  </row>-->
<!--</div>-->

@stop