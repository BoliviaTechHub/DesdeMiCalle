@extends('layouts.default')
@section('content')

    <div id="main-content">
        <div class="container">
            {{ Form::open( array('route' => 'users.update', 'class' => 'form-horizontal ng-pristine ng-valid', 'role' => 'form') ) }}
            {{ Form::hidden('id', $user->id)}}
                <div class="form-group col-md-12 titulo">
                    <h3 class="col-md-4">EDITAR USUARIO</h3>
                    <h5 class="col-md-4 date-style">Fecha de Creación: {{$user->created_at}}</h5>
                    <h5 class="col-md-4 date-style">Fecha de Modificación: {{$user->updated_at}}</h5>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label">Nombres</label>
                    <div class="col-md-8">
                        <input class="form-control" id="name" name="name" type="text" placeholder="Ej. Alan" value="{{$user->name}}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label">Apellidos</label>
                    <div class="col-md-8">
                        <input class="form-control" id="lastName" name="lastName" type="text" placeholder="Ej. Turing" value="{{$user->lastName}}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label">Nombre de Usuario</label>
                    <div class="col-md-8">
                        <input class="form-control" id="username" name="username" type="text" placeholder="Ej. jhtan" value="{{$user->username}}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label">Correo Electrónico</label>
                    <div class="col-md-8">
                        <input class="form-control" id="email" name="email" type="text" placeholder="Ej. jhtan@jhtan.com" value="{{$user->email}}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label">Verificador</label>
                    <div class="col-md-8">
                        <div class="onoffswitch">
                            <input type="checkbox" name="isChecker" class="onoffswitch-checkbox" id="myonoffswitch" @if($user->hasRole('checker')) checked @endif>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label">Admin</label>
                    <div class="col-md-8">
                        <div class="onoffswitch">
                            <input type="checkbox" name="isAdmin" class="onoffswitch-checkbox" id="myonoffswitch" @if($user->hasRole('admin')) checked @endif>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                    </div>
                </div>
                {{--<div class="form-group col-md-6">--}}
                    {{--<label class="col-md-4 control-label">Cambiar Imagen</label>--}}
                    {{--<div class="col-md-8">--}}
                        {{--<input type="file" id="exampleInputFile">--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-md-12 text-center bottom-bar">
                    <button type="submit" class="btn btn-primary btn-sm">Guadar Datos</button>
                    {{--<button type="submit" class="btn btn-danger btn-sm">Eliminar Uuario Definitivamente</button>--}}
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop