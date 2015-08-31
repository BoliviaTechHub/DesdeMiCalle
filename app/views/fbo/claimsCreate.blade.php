@extends('fbo.default')
@section('content')
    <a href="/fbo" class="button button-primary">< Volver</a>

    {{ Form::open( ['route' => 'claims.store', 'files' => true] ) }}

    <div class="text-left crea-reclamo">
        <label class="col-xs-12 question">Es un reclamo acerca de:</label>
        @foreach($categories as $category)
            @if($category->parentId == 0)
                <br>
                <div class="col-xs-12 tipo-reclamo" >
                    <input type="radio" name="categoryId" value="{{$category->id}}" autocomplete="off"><img src="{{asset('fbo_files/img/icons/' . $category->class . '.png')}}" class="icon-reclamo"> {{$category->name}}
                </div>
            @endif
        @endforeach

        {{--<label class="col-xs-12 question">¿Cuál es el problema?</label>--}}
        {{--<div class="col-xs-12 tipo-reclamo" >--}}
            {{--<input type="radio" name="options" id="option1">Sub Reclamo1--}}
        {{--</div>--}}

        <label class="col-xs-12 question">¿Algo mas que quieras decir?</label>
        {{ Form::textarea('description', null, ['class' => '', 'rows' => '4', 'cols' => '50']) }}
        {{--<label class="col-xs-12 question">¿Tienes alguna fotografia?</label>--}}
        {{--<input type="file" id="myFile" class="file">--}}
        <p class="text-center">
            <button class="btn-clear btn-reclamo clear-success" type="submit">Publicar mi reclamo</button>
        </p>
    </div>

    <input id="latitude" type="hidden" name="latitude" value="0">
    <input id="longitude" type="hidden" name="longitude" value="0">
    <input id="fbo" type="hidden" name="fbo" value="1">

    {{ Form::close() }}
@stop