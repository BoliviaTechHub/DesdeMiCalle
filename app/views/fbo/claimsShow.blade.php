@extends('fbo.default')
@section('content')
    <a href="/fbo/claims" class="button button-primary">< Volver</a>
    <div class="reclamo">
        <div class="col-xs-2 text-right">
            <a class="icon-reclamo" href="javascript:void(0)"><img src="{{asset('fbo_files/img/icons/' . $claim->parentCategory->class . '.png')}}"></a>
        </div>
        <div class="col-xs-10 text-left">
            <h3>
{{--                <small>{{$claim->title}}</small><br/>--}}
                {{$claim->title}}<br/><small>{{$claim->user_name}}</small><br/>
                @if($claim->isChecked)
                    <span class="badge success">Verificado</span>
                @else
                    <span class="badge danger">No Verificado</span>
                @endif
                <small><i> {{date("F/j/Y G:i", strtotime($claim->created_at))}}</i></small>
            </h3>
            <p>{{$claim->description}}</p>
            {{--<img src="img/reclamo-img.jpg">--}}
        </div>
    </div>
@stop