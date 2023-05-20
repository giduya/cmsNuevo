@extends('cms.menuCms')




@section('h2')
<h2><span class="far fa-sitemap"></span> Editar Menú</h2>

<div class="pull-right">
  <a href="#" data-toggle="modal" data-target="#create_menu" class="btn btn-info" tabindex=" {{ ++$tabindex }}">
    <span class="far fa-plus"></span> AGREGAR MENÚ
  </a>
</div>
@endsection




@section('panel-heading')
<h3 class="panel-title">Menús <strong>Creados</strong></h3>

  <ul class="panel-controls">
    <li>
      <span data-original-title="Editar Html del Menú (UL)" data-toggle="tooltip" data-placement="left" >
        <a href="{{ url('cms/'.request()->route('id').'/'.request()->route('seccion').'/html') }}" tabindex=" {{ ++$tabindex }}" class="btn btn-primary btn-rounded btn-condesed btn-sm" >
          <span class="far fa-code"></span> Editar HTML
        </a>
      </span>
    </li>
  </ul>
@endsection




@section('panel-body')
<div class="panel-body" style="padding:50px;">
  <ol class="dd-list">
    @foreach($config['menu'] as $key => $menu)
    <li class="dd-item">
      <div class="dd-handle">
        <span class="seccion">
          {{ $menu['menu'] }}
        </span>
        <ul class="panel-controls">
          <li data-original-title="Agregar Submenú" data-toggle="tooltip" data-placement="top">
            <a tabindex="{{ ++$tabindex }}" data-toggle="modal" data-target="#modal_submenu{{ $key }}" class="control-default">
              <span class="far fa-plus"></span>
            </a>

            <div class="modal animated fade" id="modal_submenu{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="smallModalHeadsubmenuceate{{ $key }}" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true">&times;</span>
                      <span class="sr-only">Cerrar</span>
                    </button>
                    <h4 class="modal-title" id="smallModalHeadsubmenuceate{{ $key }}">
                      <span class="far fa-sitemap"></span>
                      Crear <strong>Submenú</strong>
                    </h4>
                  </div>

                  <form name="validate" action="{{ url('cms/Menu') }}" method="POST" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="modal-body form-horizontal">
                      <p>Los campos marcados con <code>*</code> son obligatorios.</p>
                    </div>
                    <div class="modal-body form-horizontal form-group-separated">
                      <div class="form-group">
                        <label for="menu{{ $key }}" class="col-md-3 control-label">Submenú:<code>*</code></label>
                        <div class="col-md-8 col-xs-12">
                          <div class="input-group">
                            <span class="input-group-addon"><span class="far fa-font"></span></span>
                            <input id="menu{{ $key }}" maxlength="20" class="validate[required,maxSize[31]] form-control" type="text" name="menu"/>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="lista{{ $key }}" class="col-md-3 control-label">No de Lista:<code>*</code></label>
                        <div class="col-md-9 col-xs-12">
                          <div class="input-group">
                            <span class="input-group-addon"><span class="far fa-sort-numeric-down"></span></span>
                            <input id="lista{{ $key }}" type="number" class="validate[custom[integer],min[1],max[10]] form-control input-small" name="lista" value="1" />
                          </div>
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

          </li>

          <li>
            <a tabindex="{{ ++$tabindex }}" data-toggle="tooltip" data-placement="top" data-original-title="Configurar" class="control-primary" href="{{ URL::to('cms/paso_1') }}">
              <span class="far fa-wrench"></span>
            </a>
          </li>

        </ul>
      </div>
    </li>
    @endforeach
  </ol>
</div>
@endsection