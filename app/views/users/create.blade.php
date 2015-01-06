@extends('layouts.default')
@section('content')

<div class="container">
  <row>
    <div class="col-md-8">

      <h1>Registrarse</h1>

      {{ Form::open( ['route' => 'users.store', 'class' => 'form-horizontal'] ) }}

        <div class="form-group">
          {{ Form::label('username', 'Nombre de usuario: ', ['class' => 'col-sm-3 control-label']) }}
          <div class="col-sm-9">
            {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Nombre de usuario']) }}
          </div>
          {{ $errors->first('username', ':O   :message') }}
        </div>

        <div class="form-group">
          {{ Form::label('email', 'Correo electrónico: ', ['class' => 'col-sm-3 control-label']) }}
          <div class="col-sm-9">
            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
          </div>
          {{ $errors->first('email', ':P   :message') }}
        </div>

        <div class="form-group">
          {{ Form::label('password', 'Contraseña: ', ['class' => 'col-sm-3 control-label']) }}
          <div class="col-sm-9">
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) }}
          </div>
          {{ $errors->first('password') }}
        </div>

        <div class="form-group">
          {{ Form::label('name', 'Nombre: ', ['class' => 'col-sm-3 control-label']) }}
          <div class="col-sm-9">
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('lastName', 'Apellido: ', ['class' => 'col-sm-3 control-label']) }}
          <div class="col-sm-9">
            {{ Form::text('lastName', null, ['class' => 'form-control', 'placeholder' => 'Apellido']) }}
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-8">
            {{ Form::submit('Registrarse', ['class' => 'btn btn-default']) }}
          </div>
        </div>

      {{ Form::close() }}

    </div>
  </row>
</div>

@stop