<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Desde mi calle - ACM SIM</title>
    <link rel="icon" href="{{asset('/fbo_files/img/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fbo_files/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fbo_files/css/style.css')}}">
</head>
<body>

<div class="container">
    <div class="text-center">
        <a href="/fbo" class="brand"><img src="{{asset('/fbo_files/img/logomain.png')}}"></a>
        <br/>
        @yield('content')
        <br/>
        <img src="{{asset('/fbo_files/img/logo-hivos.png')}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="{{asset('/fbo_files/img/bth.png')}}">
    </div>

</div>
<div class="container footer">
    <div class="row">
        <div class="col-xs-7">
            <label>© 2015 SIM</label>
        </div>
        <div class="col-xs-5 text-right">
            <a class="button btn-clear button-icon btn-git" href="http://github.com/BoliviaTechHub/DesdeMiCalle" target="_blank"></a>
        </div>
    </div>
</div>
</body>
</html>