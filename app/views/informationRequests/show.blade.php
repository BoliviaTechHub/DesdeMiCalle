@extends('layouts.default')
@section('content')

<div class="container">
  <row>
    <div class="col-md-8">
      <h1>{{$informationRequest->title}}</h1>
      <span> Fecha: {{date("l jS \of F Y h:i:s A", strtotime($informationRequest->created_at))}}</span></span>
      <p>{{$informationRequest->description}}</p>
    </div>
    <div class="col-md-4">
    </div>
  </row>
</div>

@stop