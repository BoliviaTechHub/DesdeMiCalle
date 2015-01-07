@extends('layouts.default')
@section('content')

<!-- Site styles -->
<link type="text/css" rel="stylesheet" href="{{asset('css/signin.css')}}">

<div class="container">
  <row>
    <div class="col-md-8">
      <div class="container">
        {{ Form::open( ['route' => 'sessions.store', 'class' => 'form-signin'] ) }}
          <h2 class="form-signin-heading">Ingresar al sitio</h2>
          {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
          {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) }}
<!--          <div class="checkbox">-->
<!--            <label>            <input type="checkbox" value="remember-me"> Remember me          </label>-->
<!--          </div>-->
          {{ Form::submit('Ingresar', ['class' => 'btn btn-lg btn-primary btn-block']) }}
          <a class="btn btn-lg btn-default btn-block" href="/register">Registrarse</a>
        {{ Form::close() }}
      </div>
    </div>
  </row>
</div>

@stop