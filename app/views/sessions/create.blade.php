@extends('layouts.default')
@section('content')

<div class="container">
  <row>
    <div class="col-md-8">

      <h1>Ingresar al sitio</h1>

      {{ Form::open( ['route' => 'sessions.store', 'class' => 'form-horizontal'] ) }}

        <div class="form-group">
          {{ Form::label('email', 'Correo electrónico: ', ['class' => 'col-sm-3 control-label']) }}
          <div class="col-sm-9">
            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('password', 'Contraseña: ', ['class' => 'col-sm-3 control-label']) }}
          <div class="col-sm-9">
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) }}
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-8">
            {{ Form::submit('Ingresar', ['class' => 'btn btn-default']) }}
          </div>
        </div>

      {{ Form::close() }}

    </div>
  </row>
</div>

@stop