<div class="panel-body text-center">
  @if($modulo['nombre'])
    <h3>No Lista: {{ $modulo['lista'] }} | {{ $modulo['nombre'] }}</h3>
  @endif

  <div class="text-center">
    <img src="{{ asset('app/img/apps/cms_layout_'.$modulo['tipo'].'.png?') }}" alt="{{ $modulo['nombre'] }}" />
    <br/>

    <div class="btn-group">
      @isset($modulo['visibilidad'])
          <button class="btn btn-success btn-condensed" form="vis">
            <i class="far fa-eye-slash"></i> Ocultar
          </button>

          <button class="btn btn-success btn-condensed" form="vis">
            <i class="far fa-eye"></i> Mostrar
          </button>
        @endisset
          <a href="#" class="btn btn-info btn-condensed" data-toggle="modal" data-target="#modal_mover{{ $key }}">
            <span class="far fa-arrows-alt"></span> Mover
          </a>

          <a class="btn btn-warning btn-condensed" href="{{ URL::to('cms/modulo/'.$key.'/'.$modulo['columna']) }}">
            <i class="far fa-pencil-alt"></i> Editar
          </a>
          @isset($modulo['borrar'])
            <a class="btn btn-danger btn-condensed" data-toggle="modal" data-target="#modal_duplicado{{ $key }}">
              <i class="fas fa-times"></i> Borrar
            </a>
          @endisset
    </div>


  </div>
</div>
