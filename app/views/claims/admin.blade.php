@extends('layouts.default')
@section('content')

    <div id="main-content">
        <div class="container">


            <div class="form-group titulo">
                <h3>Administración de reclamos</h3>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nombre del reclamo</th>
                        <th>Fecha de creacion</th>
                        <th>Fecho de modificacion</th>
                        <th>Usuario</th>
                        <th>Verificado/No verificado</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($claims as $claim)
                            <tr>
                                <td>{{$claim->title}}</td>
                                <td>{{$claim->created_at}}</td>
                                <td>{{$claim->updated_at}}</td>
                                <td><a href="http://desdemicalle.org:1337/users/show/admin">{{$claim->user->username}}</a></td>
                                @if($claim->isChecked)
                                    <td>Verificado</td>
                                @else
                                    <td>No Verificado</td>
                                @endif
                                <td><a class="btn btn-xs btn-default" href="/claims/edit/{{$claim->id}}"><i class="icon-pencil"></i></a></td>
                                {{--<td><a class="btn btn-xs btn-primary delete-user" href="javascript:void(0)" data-id="22" data-username="admin"><i class="icon-cross"></i></a></td>--}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if (!$claims->count())
                <p>Lamentablemente, no hay reclamos.</p>
            @endif

        </div>
    </div>
@stop