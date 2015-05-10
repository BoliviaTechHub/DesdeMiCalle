@extends('layouts.default')
@section('content')

<!-- Site styles -->
<link type="text/css" rel="stylesheet" href="{{asset('css/signin.css')}}">

<div id="main-content">
    <div class="container">

        <form role="form" method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8" class="form-horizontal ng-pristine ng-valid form-signin">
            <div class="form-group titulo">
                <h3>Ingresar al sitio</h3>
            </div>
            <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
            {{--<div class="form-group">--}}
                {{--<label>Puedes utilizar</label>--}}
                {{--<a class="btn btn-lg btn-clear btn-block" href="/users/loginWithFacebook"><span class="icon-facebook2 icon-float"></span> Facebook</a>--}}
                {{--<a class="btn btn-lg btn-clear btn-block" href="/users/loginWithTwitter"><span class="icon-twitter2 icon-float"></span> Twitter</a>--}}
                {{--<a class="btn btn-lg btn-clear btn-block" href="/users/loginWithGoogle"><span class="icon-google-plus2 icon-float"></span>Google +</a>--}}
            {{--</div>--}}

            <fieldset>
                <div class="form-group">
                    <hr/>
                    {{--<div class="alert alert-danger" role="alert"><span class="icon-cancel-circle"></span> E-mail o password incorrecto</div>--}}
                    <label for="email">E-mail o Nombre de Usuario</label>
                    <input class="form-control" tabindex="1" placeholder="E-mail o Nombre de Usuario" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
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
                <div class="form-group">
                    <button tabindex="3" type="submit" class="btn btn-lg btn-primary btn-block">INGRESAR</button>
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
                <label>No tienes cuenta aún? <a class="btn btn-link" href="/register"><span class="icon-clipboard icon-medium"></span> Regístrate</a></label>
            </fieldset>
        </form>
    </div>

</div>



@stop