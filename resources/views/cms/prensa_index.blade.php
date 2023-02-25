@extends('cms.menu')




@section('panel-heading')
  <h3 class="panel-title">Noticias <strong>Publicadas</strong></h3>
@endsection




@section('row-widgets')
<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-2">
    <a href="{{ URL::to('cms/prensa/crear?tipo=Texto') }}" class="tile tile-default">
      <span class="fas fa-font text-danger"></span>
      <p>Publicar Texto</p>
    </a>
  </div>
  <div class="col-md-2">
    <a href="{{ URL::to('cms/prensa/crear?tipo=Audio') }}" class="tile tile-default">
      <span class="fas fa-volume-up text-info"></span>
      <p>Publicar Audio</p>
    </a>
  </div>
  <div class="col-md-2">
    <a href="{{ URL::to('cms/prensa/crear?tipo=Video') }}" class="tile tile-default">
      <span class="far fa-video text-warning"></span>
      <p>Publicar Video</p>
    </a>
  </div>
  <div class="col-md-3">
  </div>
</div>
@endsection




@section('panel-body')
<div class="panel-body panel-body-table">
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-actions">
      <thead>
        <tr>
          <th class="text-center">Imagen</th>
          <th class="text-center">Noticia</th>
          <th class="text-center">Tipo</th>
          <th class="text-center">Fecha</th>
          <th class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($noticias as $noticia)
        <tr>
          <td class="text-center">
            <input type="checkbox" name="noticia[]" value="$noticia['_id']">
          </td>
          <td class="text-center">
            @if($noticia['imagenes']['1'])
              <img src="{{ asset('noticias/'.$noticia['imagenes']['1']) }}" width="130" alt="{{ $noticia['titulo'] }}" class="img-thumbnail">
            @else
              <img src="{{ asset('app/img/otras/'.'no.jpg') }}" width="130" alt="{{ $noticia['titulo'] }}" class="img-thumbnail">
            @endif
          </td>
          <td>
            <strong>{{ $noticia['titulo'] }}</strong>
          </td>
          <td class="text-center">
            @if($noticia['tipo'] == "Texto")
            <strong><span class="btn btn-primary"><i class="far fa-font"></i> &nbsp;Texto</span></strong>
            @elseif($noticia['tipo'] == "Audio")
            <strong><span class="btn btn-primary"><i class="far fa-font"></i> &nbsp;Audio</span></strong>
            @elseif($noticia['tipo'] == "Video")
            <strong><span class="btn btn-primary"><i class="far fa-font"></i> &nbsp;Vídeo</span></strong>
            @endif
          </td>
          <td class="text-center">
            <strong>@dMy($noticia['fecha'])</strong>
          </td>
          <td class="text-center">
            <ul class="panel-controls text-center">
              <li>
                <a tabindex="4" data-toggle="tooltip" data-placement="top" data-original-title="Editar" class="control-warning" href="{{ url('/cms/prensa/'.$noticia['_id']) }}">
                  <span class="far fa-pencil-alt"></span>
                </a>
              </li>
              <li>
                <a tabindex="{{ ++$tabindex }}" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar" class="control-danger mb-control" data-box="#mb-{{ $noticia['_id'] }}">
                  <span class="fa fa-times"></span>
                </a>
              </li>
            </ul>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>




@foreach($noticias as $noticia)
  <div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-{{ $noticia['_id'] }}">
    <div class="mb-container">
      <div class="mb-middle">
        <div class="mb-title"><span class="fa fa fa-times"></span>¿ Borrar <strong>Noticia</strong> ?</div>
        <div class="mb-content">
          <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar la noticia.</p>
        </div>
        <div class="mb-footer">
          <div class="pull-right">
            <form action="{{ url('cms/prensa/'.$noticia['_id']) }}" method="POST">
              <input name="_method" type="hidden" value="DELETE">
              <input name="_token"  type="hidden" value="{{ csrf_token() }}">
              <button class="btn btn-success btn-lg" type="submit">Sí</button>
              <button class="btn btn-danger btn-lg mb-control-close">No</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach

@endsection




@section('panel-footer')
  <a href="{{ url('cms') }}" class="btn btn-default pull-left">Anterior</a>
  <span class="pull-right">

  </span>
@endsection
