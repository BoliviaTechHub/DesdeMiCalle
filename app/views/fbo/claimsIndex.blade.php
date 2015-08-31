@extends('fbo.default')
@section('content')
    <a href="/fbo" class="button button-primary">< Volver</a>
    <a class="btn-clear btn-reclamo" href="/fbo/claims/create">Quiero publicar un reclamo</a>
    @foreach ($claims as $claim)
        <div class="reclamo">
            <div class="col-xs-2 text-right">
                <a class="icon-reclamo" href="/fbo/claim/{{$claim->id}}"><img src="{{asset('fbo_files/img/icons/' . $claim->parentCategory->class . '.png')}}"></a>
            </div>
            <div class="col-xs-10 text-left">
                <h3>
                    <a href="/fbo/claim/{{$claim->id}}">{{$claim->title}}</a><br/><small>{{$claim->user_name}}</small><br/>
                    @if($claim->isChecked)
                        <span class="badge success">Verificado</span>
                    @else
                        <span class="badge danger">No Verificado</span>
                    @endif
                    <small><i> {{date("F/j/Y G:i", strtotime($claim->created_at))}}</i></small>
                </h3>
                <p>{{$claim->description}}</p>
            </div>
        </div>
    @endforeach

    {{$claims->links()}}
@stop