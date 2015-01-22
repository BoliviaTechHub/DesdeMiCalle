@extends('layouts.default')
@section('content')

<div class="container">
  <row>
    <h1>Obras Públicas  <small>looooooooooooooooooooooool.</small></h1>
    <div class="col-md-3">
      <div>
        <h2>Filtrar por Categoría:</h2>
      </div>
      <div>
        <h2>Filtrar por Barrio:</h2>
      </div>
    </div>
    <div class="col-md-9">
      @if ($publicWorks->count())
      @foreach ($publicWorks as $publicWork)
      <div>
        <span><h3>{{link_to("/publicWorks/{$publicWork->id}", $publicWork->title)}}</h3></span>
        <span><p>{{$publicWork->description}}</p> Fecha: {{date("l jS \of F Y h:i:s A", strtotime($publicWork->created_at))}}</span>
      </div>
      @endforeach
      @else
      <p>Actualmente, no existen Obras Públicas.</p>
      @endif
    </div>
  </row>
</div>

@stop