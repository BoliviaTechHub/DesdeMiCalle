@extends('layouts.default')
@section('content')

<div id="main-content">
    <div class="container">
        <div class="form-group titulo">
            <h3>Reporte de reclamos
                <a class="btn btn-md btn-success pull-right" href="/claims/get_report?q={{$idsString}}" target="_blank"><i class="icon-download2"></i> Exportar PDF de reclamos</a>
            </h3>
        </div>
        {{--<div class="section-filter col-md-4">--}}
            {{--<label class="checkbox-inline">Filtrar por:</label>--}}
            {{--<label class="checkbox-inline">--}}
                {{--<input type="checkbox" id="inlineCheckbox1" value="option1"> Verificados--}}
            {{--</label>--}}
            {{--<label class="checkbox-inline">--}}
                {{--<input type="checkbox" id="inlineCheckbox2" value="option2"> No verificados--}}
            {{--</label>--}}
        {{--</div>--}}
        {{--<div class="form-group section-filter col-md-4">--}}
            {{--<label for="dtp_input2" class="col-sm-3 control-label">Fecha: </label>--}}
            {{--<div class="input-group date form_date col-sm-9" data-date="" data-date-format="d/m/yyyy" data-link-field="dtp_input2" data-link-format="d/m/yyyy">--}}
                {{--<input class="form-control" size="16" type="text" value="" readonly>--}}
                {{--<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>--}}
                {{--<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>--}}
            {{--</div>--}}
            {{--<input type="hidden" id="dtp_input2" value="" />--}}
        {{--</div>--}}
        {{--<div class="form-group  section-filter col-md-4">--}}
            {{--<label for="input6" class="col-sm-2 control-label">Zona:</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--<select class="form-control">--}}
                    {{--<option>San Antonio</option>--}}
                    {{--<option>Copacabana</option>--}}
                {{--</select>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="table-responsive">
            <table class="table reclamo">
                <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Problema</th>
                    <th>Nombre del reclamo</th>
                    <th>Fecha de creacion</th>
                    <th>Usuario Reclamante</th>
                    <th>Verificación</th>
                </tr>
                </thead>

                <tbody>

                @if($claims->count())
                    @foreach($claims as $claim)
                        <tr>
                            <td><div class="img-reclamo {{$claim->parentCategory->class}}"></div></td>
                            <td>{{$claim->claimWorkCategory->name}}</td>
                            <td>{{$claim->title}}</td>
                            <td>{{date("F/j/Y G:i", strtotime($claim->created_at))}}</td>
                            <td><a href="/users/edit/{{$claim->User->username}}">{{$claim->User->username}}</a></td>
                            <td>
                                @if($claim->isChecked)
                                    <div class="text-success">Verificado</div>
                                @else
                                    <div class="text-danger">No Verificado</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p>Actualmente, no existen reclamos.</p>
                @endif

                </tbody>
            </table>
        </div>
    </div>
</div>

@stop