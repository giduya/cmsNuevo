@extends('cms.menu')




@section('h2')
  <h2><span class="fab fa-css3"></span> Editar Css</h2>
@endsection




@section('panel-heading')
  <h3 class="panel-title">Crear Archivo <strong>CSS</strong></h3>
@endsection




@include('etc.codemirror')




@section('panel-body')
<div class="panel-body">
  <p>Los campos marcados con <code>*</code> son obligatorios.</p>
</div>
<div class="panel-body">
  <form id="validate" name="validate" class="form-horizontal" autocomplete="off" action="@if(isset($css)){{ url('cms/config/css/'.$css->id) }}@else{{ url('cms/config/css/') }}@endif" method="POST">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="tema" value="{{ $tema }}">
    @if(isset($css))
      <input type="hidden" name="_method" value="PATCH">
    @endif

    <div class="form-group">
      <label for="nombre" class="col-md-2 col-xs-12 control-label">
        Nombre:
        <code>*</code>
      </label>
      <div class="col-md-8 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><span class="far fa-file-code"></span></span>
          <input id="nombre" tabindex="{{ ++$tabindex }}" maxlength="35" type="text" placeholder="Nombre del archivo" maxlength="35" class="validate[required,maxSize[35]] form-control" @if(old('nombre')) value="{{ old('nombre') }}" @else  @if(isset($css)) value="{{ $css->nombre }}" @endif @endif autofocus="autofocus" name="nombre">
          <span class="input-group-addon">.css</span>
        </div><!--input-group-->
      </div><!--col-md-6-->
    </div><!--form-group-->

    <div class="form-group">
      <label for="atributos" class="col-md-2 col-xs-12 control-label">
        Atributos:
        <code>*</code>
      </label>
      <div class="col-md-8 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><span class="far fa-code"></span></span>
          <input id="atributos" tabindex="{{ ++$tabindex }}" type="text" maxlength="255" class="validate[required,maxSize[255]] form-control" @if(old('atributos')) value="{{ old('atributos') }}" @else  @if(isset($css)) value="{{ $css->atributos}}" @else value='rel="stylesheet" type="text/css"' @endif @endif name="atributos">
        </div><!--input-group-->
      </div><!--col-md-6-->
    </div><!--form-group-->

    <div class="form-group">
      <label for="lista" class="col-md-2 col-xs-12 control-label">
        Lista:
        <code>*</code>
      </label>
      <div class="col-md-2 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><span class="far fa-sort-numeric-down"></span></span>
          <input id="lista" tabindex="{{ ++$tabindex }}" maxlength="2" type="number" class="validate[custom[integer]] form-control" @if(old('lista')) value="{{ old('lista') }}" @else  @if(isset($css)) value="{{ $css->lista}}" @else value="0" @endif @endif name="lista">
        </div><!--input-group-->
      </div><!--col-md-6-->
    </div><!--form-group-->

    <div class="form-group">
      <label for="codeEditor" class="col-md-2 col-xs-12 control-label">
        Código Css:
        <code>*</code>
      </label>
      <div class="col-md-8 col-xs-12">
        <textarea id="codeEditor" tabindex="{{ ++$tabindex }}" name="css" class="form-control">@if(isset($css)){{ $css->fopen }}@else{{ old('css') }}@endif</textarea>
      </div><!--col-md-6-->
    </div>
  </form><!--form-->
</div>
@endsection




@section('panel-footer')
  <button class="btn btn-info pull-right" tabindex="{{ ++$tabindex }}" type="submit" form="validate">Siguiente</button>
  <a href="{{ url('cms/design/head/') }}" class="btn btn-default pull-left">Anterior</a>
@endsection
