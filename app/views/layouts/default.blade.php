<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="jhtan">
<!--  <link rel="icon" href="../../favicon.ico">-->

  <title>Desde Mi Calle</title>

  <!-- Bootstrap core CSS -->
  <link type="text/css" rel="stylesheet" href="{{asset('vendor/bootSwatch/bootstrap.min.css')}}">

  <!-- Font Awesome core CSS -->
  <link type="text/css" rel="stylesheet" href="{{asset('vendor/font-awesome-4.2.0/css/font-awesome.min.css')}}">

  <!-- Site styles -->
  <link type="text/css" rel="stylesheet" href="{{asset('css/styles.css')}}">
  <link type="text/css" rel="stylesheet" href="{{asset('css/home.css')}}">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>

<!-- NAVBAR
================================================== -->
<div class="navbar-wrapper">
  <div class="container">

    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Desde Mi Calle</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <!---<li><a href="javascript:void(0)">Acerca de Nosotros</a></li>-->
            <!---<li><a href="javascript:void(0)">Contacto</a></li>-->
            <li><a href="/claims">Reclamos</a></li>
            <li><a href="/publicWorks">Obras P&uacute;blicas</a></li>
            <li><a href="/informationRequests">Requerimientos de Información</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if(!Auth::check())
            <li class="login-buttons"><h5><a href="/login" class="btn btn-primary btn-sm">Ingresar</a></h5></li>
            <li class="login-buttons"><h5><a href="/register" class="btn btn-default btn-sm">Registrarse</a></h5></li>
            @else
            <li class="login-buttons"><h4>Hola! {{Auth::user()->username}}</h4></li>
            <li class="login-buttons"><h5><a href="/logout" class="btn btn-default btn-sm">Salir</a></h5></li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

  </div>
</div>

@yield('content')

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('vendor/jQuery/jquery-2.1.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/bootstrap/assets/docs.min.js')}}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script type="text/javascript" src="{{asset('vendor/bootstrap/assets/ie10-viewport-bug-workaround.js')}}"></script>

</body>
</html>