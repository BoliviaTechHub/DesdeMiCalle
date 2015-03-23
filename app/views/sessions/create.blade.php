@extends('layouts.default')
@section('content')

<!-- Site styles -->
<link type="text/css" rel="stylesheet" href="{{asset('css/signin.css')}}">

<div class="container">
  <row>
    <div class="col-md-8">
      <div class="container">
        <form role="form" method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8" class="form-signin">
          <h2 class="form-signin-heading">Ingresar al sitio</h2>
          <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
          <fieldset>
            <div class="form-group">
              <label for="email">Correo Electrónico o Nombre de Usuario</label>
              <input class="form-control" tabindex="1" placeholder="Correo Electrónico o Nombre de Usuario" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
            </div>
            <div class="form-group">
              <label for="password">
                {{{ Lang::get('confide::confide.password') }}}
              </label>
              <input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
<!--              <p class="help-block">-->
<!--                <a href="{{{ URL::to('/users/forgot_password') }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>-->
<!--              </p>-->
            </div>
            <div class="checkbox">
              <label for="remember">
                <input tabindex="4" type="checkbox" name="remember" id="remember" value="1"> {{{ Lang::get('confide::confide.login.remember') }}}
              </label>
            </div>
            @if (Session::get('error'))
            <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
            @endif

            @if (Session::get('notice'))
            <div class="alert">{{{ Session::get('notice') }}}</div>
            @endif
            <div class="form-group">
              <button tabindex="3" type="submit" class="btn btn-lg btn-primary btn-block">{{{ Lang::get('confide::confide.login.submit') }}}</button>
              <a class="btn btn-lg btn-default btn-block" href="/register">Registrarse</a>
                <a class="btn btn-lg btn-default btn-block" href="/users/loginWithFacebook"><i class="fa fa-facebook"></i> Ingresar con Facebook</a>
                <a class="btn btn-lg btn-default btn-block" href="/users/loginWithTwitter"><i class="fa fa-twitter"></i> Ingresar con Twitter</a>
                <a class="btn btn-lg btn-default btn-block" href="/users/loginWithGoogle"><i class="fa fa-google"></i> Ingresar con Google</a>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </row>
</div>

@stop