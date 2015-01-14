@extends('layouts.default')
@section('content')

<div class="container">
  <row>
    <div class="col-md-8">
      <h1>{{$claim->title}}</h1>
      <span> Fecha: {{date("l jS \of F Y h:i:s A", strtotime($claim->created_at))}}</span></span>
      <p>{{$claim->description}}</p>
    </div>
    <div class="col-md-4">
      <a class="btn btn-default btn-lg" href="/claims/create">Haz tu reclamo</a>
      <a class="btn btn-default btn-lg">Me sumo a este reclamo</a>
    </div>
  </row>
</div>

@stop