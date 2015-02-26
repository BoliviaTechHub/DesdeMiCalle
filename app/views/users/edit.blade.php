@extends('layouts.default')
@section('content')

<div class="container">
    <row>
        <div class="col-md-8">

            <h1>Editar Usuario</h1>

            {{ Form::open( array('route' => 'users.update', 'class' => 'form-horizontal') ) }}
            {{ Form::hidden('id', $user->id)}}

            <div class="form-group">
                {{ Form::label('name', 'Nombre: ', ['class' => 'col-sm-3 control-label']) }}
                <div class="col-sm-9">
                    {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
                </div>
                {{$errors->first('name')}}
            </div>

            <div class="form-group">
                {{ Form::label('lastName', 'Apellido: ', ['class' => 'col-sm-3 control-label']) }}
                <div class="col-sm-9">
                    {{ Form::text('lastName', $user->lastName, ['class' => 'form-control', 'placeholder' => 'Apellido']) }}
                </div>
                {{$errors->first('lastName')}}
            </div>

            <div class="form-group">
                {{ Form::label('username', 'Nombre de Usuario: ', ['class' => 'col-sm-3 control-label']) }}
                <div class="col-sm-9">
                    {{ Form::text('username', $user->username, ['class' => 'form-control', 'placeholder' => 'Nombre de Usuario']) }}
                </div>
                {{$errors->first('username')}}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Correo Electrónico: ', ['class' => 'col-sm-3 control-label']) }}
                <div class="col-sm-9">
                    {{ Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Correo Electrónico']) }}
                </div>
                {{$errors->first('email')}}
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-8">
                    {{ Form::submit('Guardar', ['class' => 'btn btn-default']) }}
                </div>
            </div>

            {{ Form::close() }}

        </div>
    </row>
</div>

@stop