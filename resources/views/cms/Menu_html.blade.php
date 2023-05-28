@extends('cms.menuCms')




@section('h2')
  <h2><span class="far fa-code"></span> Editar HTML</h2>
@endsection




@section('panel-heading')
  <h3 class="panel-title">Editar código fuente del <strong>Menú</strong></h3>
@endsection




@section('panel-body')
<div class="panel-body">
  Los atributos que uses en <code>LI</code>, <code>A</code> de esta sección se aplicarán a todos los <code>LI</code>, <code>A</code> nuevos.

  <p>&nbsp;</p>

  <form id="form" name="validate" class="form-horizontal" action="{{ url('cms/modulo/html') }}" method="POST" autocomplete="off">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="PUT">

    <div class="form-group">
      <div class="col-md-2 col-xs-12"></div>
      <div class="col-md-8 col-xs-12">
        <textarea rows="4" name="modulohtmlbefore" placeholder="Agrega tu código html" class="form-control" autofocus>{{ $html['modulohtmlbefore'] }}</textarea>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-2 col-xs-12"></div>
      <div class="col-md-8 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon">&lt;UL (menú principal)</span>
          <input id="ulattributesall" type="text" maxlength="255" class="validate[maxSize[255]] form-control" placeholder="Agrega tus atributos" name="ulattributes" value="{{ $html['ulattributes'] }}" />
          <span class="input-group-addon">&gt;</span>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-3 col-xs-12"></div>
      <div class="col-md-7 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon">&lt;LI (sin submenu)</span>
          <input id="liattributesall_link" type="text" maxlength="255" class="validate[maxSize[255]] form-control" placeholder="Agrega tus atributos" name="liattributes_link" value="{{ $html['liattributes_link'] }}" />
          <span class="input-group-addon">&gt;</span>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-4 col-xs-12"></div>
      <div class="col-md-6 col-xs-12">
        <textarea rows="4" name="lihtmlafter_link" placeholder="Agrega tu código html" class="form-control">{{ $html['lihtmlafter_link'] }}</textarea>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-4 col-xs-12"></div>
      <div class="col-md-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon">&lt;A (sin submenú)</span>
          <input id="aattributesall_link" type="text" maxlength="255" class="validate[maxSize[255]] form-control" placeholder="Agrega tus atributos" name="aattributes_link" value="{{ $html['aattributes_link'] }}" />
          <span class="input-group-addon">&gt;</span>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-5 col-xs-12"></div>
      <div class="col-md-5 col-xs-12">
        <textarea rows="4" name="ahtmlafter_link" placeholder="Agrega tu código html" class="form-control">{{ $html['ahtmlafter_link'] }}</textarea>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-6 col-xs-12"></div>
      <div class="col-md-4 col-xs-12">
        <div class="input-group">
          <code>Nombre del Menú</code>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-5 col-xs-12"></div>
      <div class="col-md-5 col-xs-12">
        <textarea rows="4" name="ahtmlbefore_link" placeholder="Agrega tu código html" class="form-control">{{ $html['ahtmlbefore_link'] }}</textarea>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-4 col-xs-12"></div>
      <div class="col-md-6 col-xs-12">
        <div class="input-group">
          <code>&lt;/A (sin submenú)></code>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-4 col-xs-12"></div>
      <div class="col-md-6 col-xs-12">
        <textarea rows="4" name="lihtmlbefore_link" placeholder="Agrega tu código html" class="form-control">{{ $html['lihtmlbefore_link'] }}</textarea>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-3 col-xs-12"></div>
      <div class="col-md-7 col-xs-12">
        <div class="input-group">
          <code>&lt;/li (sin submenú)></code>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-3 col-xs-12"></div>
      <div class="col-md-7 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon">&lt;LI (con submenu)</span>
          <input id="liattributesall_drop" type="text" maxlength="255" class="validate[maxSize[255]] form-control" placeholder="Agrega tus atributos" name="liattributes_drop" value="{{ $html['liattributes_drop'] }}" />
          <span class="input-group-addon">&gt;</span>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-4 col-xs-12"></div>
      <div class="col-md-6 col-xs-12">
        <textarea rows="4" name="lihtmlafter_drop" placeholder="Agrega tu código html" class="form-control">{{ $html['lihtmlafter_drop'] }}</textarea>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-4 col-xs-12"></div>
      <div class="col-md-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon">&lt;A (con submenú)</span>
          <input id="aattributesall_drop" type="text" maxlength="255" class="validate[maxSize[255]] form-control" placeholder="Agrega tus atributos" name="aattributes_drop" value="{{ $html['aattributes_drop'] }}" />
          <span class="input-group-addon">&gt;</span>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-5 col-xs-12"></div>
      <div class="col-md-5 col-xs-12">
        <textarea rows="4" name="ahtmlafter_drop" placeholder="Agrega tu código html" class="form-control">{{ $html['ahtmlafter_drop'] }}</textarea>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-6 col-xs-12"></div>
      <div class="col-md-4 col-xs-12">
        <div class="input-group">
          <code>Nombre del Menú</code>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-5 col-xs-12"></div>
      <div class="col-md-5 col-xs-12">
        <textarea rows="4" name="ahtmlbefore_drop" placeholder="Agrega tu código html" class="form-control">{{ $html['ahtmlbefore_drop'] }}</textarea>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-4 col-xs-12"></div>
      <div class="col-md-6 col-xs-12">
        <div class="input-group">
          <code>&lt;/A (con submenú)></code>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-4 col-xs-12"></div>
      <div class="col-md-6 col-xs-12">
        <textarea rows="4" name="subulhtmlbefore" placeholder="Agrega tu código html" class="form-control">{{ $html['subulhtmlbefore'] }}</textarea>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-4 col-xs-12"></div>
      <div class="col-md-6 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon">&lt;ul (submenú)</span>
          <input id="subulattributesall" type="text" maxlength="255" class="validate[maxSize[255]] form-control" placeholder="Agrega tus atributos" name="subulattributes" value="{{ $html['subulattributes'] }}" />
          <span class="input-group-addon">&gt;</span>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-5 col-xs-12"></div>
      <div class="col-md-5 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon">&lt;li (submenú)</span>
          <input id="subliattributesall" type="text" maxlength="255" class="validate[maxSize[255]] form-control" placeholder="Agrega tus atributos" name="subliattributes" value="{{ $html['subliattributes'] }}" />
          <span class="input-group-addon">&gt;</span>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-6 col-xs-12"></div>
      <div class="col-md-4 col-xs-12">
        <textarea rows="4" name="sublihtmlafter" placeholder="Agrega tu código html" class="form-control">{{ $html['sublihtmlafter'] }}</textarea>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-6 col-xs-12"></div>
      <div class="col-md-4 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon">&lt;a (submenú)</span>
          <input id="subaattributesall" type="text" maxlength="255" class="validate[maxSize[255]] form-control" placeholder="Agrega tus atributos" name="subaattributes" value="{{ $html['subaattributes'] }}" />
          <span class="input-group-addon">&gt;</span>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-7 col-xs-12"></div>
      <div class="col-md-3 col-xs-12">
        <textarea rows="4" name="subahtmlafter" placeholder="Agrega tu código html" class="form-control">{{ $html['subahtmlafter'] }}</textarea>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-8 col-xs-12"></div>
      <div class="col-md-2 col-xs-12">
        <div class="input-group">
          <code>Nombre del SubMenú</code>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-7 col-xs-12"></div>
      <div class="col-md-3 col-xs-12">
        <textarea rows="4" name="subahtmlbefore" placeholder="Agrega tu código html" class="form-control">{{ $html['subahtmlbefore'] }}</textarea>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-6 col-xs-12"></div>
      <div class="col-md-4 col-xs-12">
        <div class="input-group">
          <code>&lt;/a (submenú)></code>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-6 col-xs-12"></div>
      <div class="col-md-4 col-xs-12">
        <textarea rows="4" name="sublihtmlbefore" placeholder="Agrega tu código html" class="form-control">{{ $html['sublihtmlbefore'] }}</textarea>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-5 col-xs-12"></div>
      <div class="col-md-5 col-xs-12">
        <div class="input-group">
          <code>&lt;/li (submenú)></code>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-4 col-xs-12"></div>
      <div class="col-md-6 col-xs-12">
        <div class="input-group">
          <code>&lt;/ul (submenú)></code>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-4 col-xs-12"></div>
      <div class="col-md-6 col-xs-12">
        <textarea rows="4" name="lihtmlbefore_drop" placeholder="Agrega tu código html" class="form-control">{{ $html['lihtmlbefore_drop'] }}</textarea>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-3 col-xs-12"></div>
      <div class="col-md-7 col-xs-12">
        <div class="input-group">
          <code>&lt;/LI (con submenú)></code>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-2 col-xs-12"></div>
      <div class="col-md-8 col-xs-12">
        <div class="input-group">
          <code>&lt;/UL></code>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-2 col-xs-12"></div>
      <div class="col-md-8 col-xs-12">
        <textarea rows="4" name="modulohtmlafter" placeholder="Agrega tu código html" class="form-control">{{ $html['modulohtmlafter'] }}</textarea>
      </div><!--col-md-6-->
    </div>

  </form><!--form-->
</div>
@endsection




@section('panel-footer')
  <a href="{{ url('cms/modulo/'.request()->route('id')) }}" tabindex="{{ ++$tabindex }}" class="btn btn-default">Anterior</a>
  <button class="btn btn-info" type="submit" form="form">Siguiente</button>
@endsection
