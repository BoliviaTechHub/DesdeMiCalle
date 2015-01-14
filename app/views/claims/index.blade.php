@extends('layouts.default')
@section('content')

<div class="container">
  <row>
    <h1>Reclamos Realizados <small>Acá encontrarás todos los reclamos registrados en Desde Mi Calle.</small></h1>
    <div class="col-md-3">
      <div>
        <h2>Filtrar por Categoría:</h2>
        @foreach ($categories as $category)
        <div>{{$category->name}}</div>
        @endforeach
      </div>
      <div>
        <h2>Filtrar por Barrio:</h2>
        @foreach ($neighborhoods as $neighborhood)
        <div>{{$neighborhood->name}}</div>
        @endforeach
      </div>
    </div>
    <div class="col-md-9">
      @if ($claims->count())
      @foreach ($claims as $claim)
      <div>
        <span><h3>{{link_to("/claims/{$claim->id}", $claim->title)}}</h3></span>
        <span><p>{{$claim->description}}</p> Fecha: {{date("l jS \of F Y h:i:s A", strtotime($claim->created_at))}}</span>
      </div>
      @endforeach
      @else
      <p>Actualmente, no existen reclamos.</p>
      @endif
    </div>
  </row>
</div>

@stop