@extends('cms.menuCms')




@section('content')
<div class="row">

  <div class="col-md-2">
  </div>

  <div class="col-md-2">
    <a href="{{ URL::to('cms/diseno/Portada') }}" class="tile tile-default">
      <span class="far fa-object-group text-info"></span>
      <p class="text-primary">Editar Diseño</p>
    </a>
  </div>

  <div class="col-md-2">
    <a href="{{ URL::to('cms/menu') }}" class="tile tile-default">
      <span class="far fa-sitemap text-danger"></span>
      <p class="text-primary">Editar Menú</p>
    </a>
  </div>

  <div class="col-md-2">
    <a href="{{ URL::to('cms/prensa/') }}" class="tile tile-default">
      <span class="far fa-newspaper text-warning"></span>
      <p class="text-primary">Publicar Noticia</p>
    </a>
  </div>

  <div class="col-md-2">
    <a href="{{ URL::to('cms/secciones') }}" class="tile tile-default">
      <span class="far fa-file-alt text-success"></span>
      <p class="text-primary">Secciones Existentes</p>
    </a>
  </div>

  <div class="col-md-2">
  </div>

</div>


<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><strong>Tráfico</strong> del Sitio Web</h3>
      </div>
      <div class="panel-body">
      </div>
    </div>
  </div>
</div>

@endsection
