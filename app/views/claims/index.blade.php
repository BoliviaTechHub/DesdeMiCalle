@extends('layouts.default')
@section('content')

<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <div id="sidebar-wrapper-content">
            <img class="img-responsive logo" src="{{asset('images/logo2.png')}}"/>
            <div id="claimsIndex" class="{{$newClaimClass}}"></div>
            <div class="section-title">
                <h3>RECLAMOS REALIZADOS</h3>
                <p>Aquí se listan todos los reclamos registrados. <br/>También puedes:</p>
                <a class="btn btn-lg btn-clear" href="claims/create"><i class="icon-bullhorn icon-float"></i> Publicar un reclamo</a>
                <a class="btn btn-lg btn-clear btn-success" href="claims/export"><i class="icon-download2 icon-float"></i> Exportar Reclamos</a>
            </div>
            <div class="section-filter">
                <p>Puedes filtrar los reclamos por: </p>
                <a href="?type=all" @if ($claimType == 'all') class="active" @endif ><div class="img-reclamo todos glyphicon glyphicon-list-alt"></div></a>
                <a href="?type=basura" @if ($claimType == 'basura') class="active" @endif ><div class="img-reclamo basura"></div></a>
                <a href="?type=agua" @if ($claimType == 'agua') class="active" @endif ><div class="img-reclamo agua"></div></a>
                <a href="?type=calle" @if ($claimType == 'calle') class="active" @endif ><div class="img-reclamo calle"></div></a>
                <a href="?type=luz" @if ($claimType == 'luz') class="active" @endif ><div class="img-reclamo luz"></div></a>
                <a href="?type=salud" @if ($claimType == 'salud') class="active" @endif ><div class="img-reclamo salud"></div></a>
                <a href="?type=obra" @if ($claimType == 'obra') class="active" @endif ><div class="img-reclamo obra"></div></a>
                <a href="?type=pluvial" @if ($claimType == 'pluvial') class="active" @endif ><div class="img-reclamo pluvial"></div></a>
                <form action="" method="get" id="search" class="search-form">
<!--                    <input type="text" class="" name="k" data-default="100" placeholder="Busca un reclamo..."/><span class="icon-search icon-medium"></span>-->
                </form>
            </div>
            @if (sizeof($claims))
                @foreach ($claims as $claim)
                    <div class="row reclamo">
                        <div class="col-md-2 text-right">
                            <a class="link-map" href="javascript:void(0)"><div class="img-reclamo {{$claim->parentCategory->class}}"></div></a>
                        </div>
                        <div class="col-md-10">
                            <h3><a class="claim-title" data-id="{{$claim->id}}" href="/claims/{{$claim->id}}" data-latitude="{{$claim->latitude}}" data-longitude="{{$claim->longitude}}" data-title="{{$claim->title}}" data-url="/claims/{{$claim->id}}" data-class="{{$claim->parentCategory->class}}">{{$claim->title}}</a> <small>{{$claim->user_name}}</small></h3>
                            @if($claim->isChecked)
                                <div><span class="badge success">Verificado</span>
                            @else
                                <div><span class="badge">No verificado</span>
                            @endif
                            <span> {{date("F/j/Y G:i", strtotime($claim->created_at))}}</span></div>
                            {{--<p>{{$claim->description}}</p>--}}
                        </div>
                    </div>
                @endforeach
            @else
                <p>Actualmente, no existen reclamos.</p>
            @endif
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <a href="#menu-toggle" class="btn-toogle" id="menu-toggle"><span class="icon-cross icon-medium"></span></a>
        <div class="map">
            <div id="claims-index-map" style="height:100%; width:100%;"></div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    <!-- Modal -->
    @if(strlen($newClaimId))
    <div class="modal fade" id="shareNewClaimModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title" id="myModalLabel">Socializa el reclamo!</h3>
          </div>
          <div class="modal-body">
              <h4>Comparte tu reclamo en las redes sociales:</h4>
              <h3>
              <a id="fb-share"
                 style='text-decoration:none;'
                 type="icon_link"
                 onClick="window.open('http://www.facebook.com/sharer.php?s=100&p[title]={{urlencode($newClaim->title)}}&p[summary]={{urlencode(substr($newClaim->description, 0, 30)) . '...'}}&p[url]={{URL::to('/');}}/claims/{{$newClaim->id}}&p[images][0]={{urlencode($newClaim->image_url)}}','sharer','toolbar=0,status=0,width=580,height=325');"
                 href="javascript: void(0)">
                  <i class="icon-facebook2 icon-big"></i>
              </a>
              <a class="twitter popup" href="http://twitter.com/share?text={{urlencode($newClaim->title) . 'via: @desdemicalle ' . urlencode('#DesdeMiCalle')}}">
                  <i class="icon-twitter2 icon-big"></i>
              </a>
              {{--<a href="#"><i class="icon-google-plus2 icon-medium"></i></a>--}}
              </h3>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    @endif
</div>
@stop