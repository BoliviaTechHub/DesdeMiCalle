<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
    <div class="title">
        <a href="/fbo" class="logo"><img src="{{asset('images/logo2.png')}}" width="300px"></a>
    </div>

    <h1>Hacer un reclamo</h1>

    {{ Form::open( ['route' => 'claims.store', 'files' => true] ) }}
    {{ Form::textarea('description', null, ['class' => '', 'placeholder' => 'Descripción', 'rows' => '3', 'cols' => '30']) }}

    @foreach($categories as $category)
        @if($category->parentId == 0)
            <br>
            <input type="radio" name="categoryId" value="{{$category->id}}" autocomplete="off"> {{$category->name}}
        @endif
    @endforeach

    <br>

    <input id="latitude" type="hidden" name="latitude" value="0">
    <input id="longitude" type="hidden" name="longitude" value="0">
    <input id="fbo" type="hidden" name="fbo" value="1">

    {{ Form::submit('Finalizar Reclamo', ['class' => '']) }}
    {{ Form::close() }}

</body>

<style>
    body {
        font-family: sans-serif;
        background: #181818;
        height: 400px;
        padding-top: 40px;
        text-align: center;
    }

    .title {
        max-width: 1000px;
        margin: 0 auto;
        padding: 0px 20px;
        position: relative;
    }

    h1 {
        text-align: center;
        width: 100%;
        /*margin-top: 120px;*/
        margin-top: 50px;
        margin-bottom: 50px;
        color: #eee;
        font-weight: 800;
        font-size: 40px;
    }

    a {
        text-decoration: none;
    }
</style>

</html>