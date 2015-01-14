@extends('layouts.default')
@section('content')

<div class="container">
  <row>
    <div class="col-md-8">

      <h1>Realizar Reclamo</h1>

      {{ Form::open( ['route' => 'claims.store', 'class' => 'form-horizontal'] ) }}

      <div class="form-group">
        {{ Form::label('title', 'Título: ', ['class' => 'col-sm-3 control-label']) }}
        <div class="col-sm-9">
          {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título']) }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('description', 'Descripción: ', ['class' => 'col-sm-3 control-label']) }}
        <div class="col-sm-9">
          {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descripción']) }}
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-8">
          {{ Form::submit('Enviar Reclamo', ['class' => 'btn btn-default']) }}
        </div>
      </div>

      {{ Form::close() }}

    </div>
  </row>
</div>

@stop