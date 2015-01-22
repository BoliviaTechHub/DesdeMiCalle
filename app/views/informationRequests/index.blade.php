@extends('layouts.default')
@section('content')

<div class="container">
  <row>
    <h1>Requerimientos de Información Realizados <small>loooooooooooooool.</small></h1>
    <div class="col-md-3">
      <div>
        <h2>Filtrar por Categoría:</h2>
      </div>
      <div>
        <h2>Filtrar por Barrio:</h2>
      </div>
    </div>
    <div class="col-md-9">
      @if ($informationRequests->count())
      @foreach ($informationRequests as $informationRequest)
      <div>
        <span><h3>{{link_to("/informationRequests/{$informationRequest->id}", $informationRequest->title)}}</h3></span>
        <span><p>{{$informationRequest->description}}</p> Fecha: {{date("l jS \of F Y h:i:s A", strtotime($informationRequest->created_at))}}</span>
      </div>
      @endforeach
      @else
      <p>Actualmente, no existen Requerimientos de Información.</p>
      @endif
    </div>
  </row>
</div>

@stop