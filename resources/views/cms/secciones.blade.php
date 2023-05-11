@extends('ayudig.cms.menu')




@section('h2')
<h2><span class="far fa-copy"></span> Mis Secciones</h2>
<div class="pull-right">
  <a href="#" data-toggle="modal" data-target="#create_seccion" class="btn btn-info" tabindex="{{ ++$tabindex }}">
    <span class="far fa-plus"></span> AGREGAR SECCIÓN
  </a>
</div>
@endsection




@section('panel-heading')
<h3 class="panel-title">Secciones <strong>Creadas</strong></h3>
@endsection




@section('panel-body')
<div class="panel-body panel-body-table">
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-actions">
      <thead>
        <tr>
          <th class="text-center">Título</th>
          <th class="text-center">Link</th>
          <th class="text-center">Plantilla</th>
          <th class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($secciones->secciones as $seccion)
        <tr>
          <td class="text-left">
            <strong>{{ $seccion->titulo }}</strong>
          </td>
          <td>
            <a href="http://{{ $dominio }}/{{ $seccion->slug }}" target="_blank">www.{{ $dominio }}/{{ $seccion->slug }}</a>
          </td>
          <td class="text-center">
            <strong>{{ $seccion->config['plantilla'] }}</strong>
          </td>
          <td class="text-center" style="width:150px;">
            <ul class="panel-controls text-center">
              <li>
                <a tabindex="4" data-toggle="tooltip" data-placement="top" data-original-title="Editar" class="control-warning" href="{{ url('cms/Seccion/'.$seccion->id.'/edit') }}">
                  <span class="far fa-pencil-alt"></span>
                </a>
              </li>
              @if($seccion->config['borrame'] == 1)
              <li>
                <a tabindex="{{ ++$tabindex }}" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar" class="control-danger mb-control" data-box="#mb-{{ $seccion->id }}">
                  <span class="fa fa-times"></span>
                </a>
              </li>
              @endif
            </ul>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>




@foreach($secciones->secciones as $seccion)
  <div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-{{ $seccion->id }}">
    <div class="mb-container">
      <div class="mb-middle">
        <div class="mb-title"><span class="fa fa fa-times"></span>¿ Borrar <strong>Sección</strong> ?</div>
        <div class="mb-content">
          <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar la sección.</p>
        </div>
        <div class="mb-footer">
          <div class="pull-right">
            <form action="{{ url('cms/Seccion/'.$seccion->id) }}" method="POST">
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




<!--/////////////////////////////////////////////
////////////////////// MODALS
/////////////////////////////////////////////-->

<div class="modal animated fade" id="create_seccion" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Cerrar</span>
        </button>
        <h4 class="modal-title" id="smallModalHead">
          <span class="far fa-copy"></span>
          Crear <strong>Sección</strong>
        </h4>
      </div>

      <form name="validate" action="{{ url('cms/Seccion') }}" method="POST" autocomplete="off">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="modal-body form-horizontal">
          <p>Los campos marcados con <code>*</code> son obligatorios.</p>
        </div>

        <div class="modal-body form-horizontal form-group-separated">

          <div class="form-group">
            <label for="titulo" class="col-md-3 control-label">Título:<code>*</code></label>
            <div class="col-md-8 col-xs-12">
              <div class="input-group">
                <span class="input-group-addon"><span class="far fa-font"></span></span></span>
                <input id="titulo" class="validate[required,maxSize[50]] form-control" maxlength="50" type="text" class="form-control" name="titulo"/>
              </div>
            </div>
          </div>


          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Plantilla</label>
            <div class="col-md-8 col-xs-12">
              <select class="form-control select" name="plantilla">
                <option value="{{ $secciones->precargadas['5']['plantilla'] }}">Página en Blanco</option>
                <option value="{{ $secciones->precargadas['6']['plantilla'] }}">Página con menú lateral</option>
              </select>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Enviar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection




@section('panel-footer')
  <a href="{{ url('cms') }}" class="btn btn-default pull-left">Anterior</a>
@endsection
