@extends('layouts.default')
@section('content')

<div class="container">
    <h1>{{$user->username}}</h1>

    <h3>Nombre: <small>{{$user->name}}</small></h3>
    <h3>Segundo nombre: <small>{{$user->secondName}}</small></h3>
    <h3>Apellido: <small>{{$user->lastName}}</small></h3>
    <h3>Segundo apellido: <small>{{$user->secondName}}</small></h3>
    <h3>Correo electrónico: <small>{{$user->email}}</small></h3>
    <h3>Nombre de usuario: <small>{{$user->username}}</small></h3>
    <h3>Fecha de Creación: <small>{{$user->created_at}}</small></h3>
    <h3>Fecha de última modificación: <small>{{$user->updated_at}}</small></h3>
</div>

@stop