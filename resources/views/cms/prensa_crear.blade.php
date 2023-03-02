@extends('cms.menu')




@section('h2')
  <h2><span class="far fa-newspaper"></span> Agregar Noticia</h2>
@endsection




@section('panel-heading')
<h3 class="panel-title">Llenar <strong>Formulario</strong></h3>
@endsection




@section('panel-body')
<div class="panel-body">
  <p>Los campos marcados con <code>*</code> son obligatorios.</p>
</div>
<div class="panel-body form-group-separated">
  <form id="validate" name="validate" class="form-horizontal" autocomplete="off" action="{{ url('cms/prensa/') }}@if(isset($noticia['_id']))/{{ $noticia['_id'] }}@endif" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="tipo" value="{{ $tipo }}">

    @if(isset($noticia['_id']))
    <input type="hidden" name="_method" value="PATCH">
    @endif

    <div class="form-group">
      <label for="titulo" class="col-md-2 col-xs-12 control-label">
        Título:
        <code>*</code>
      </label>
      <div class="col-md-8 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><span class="far fa-font"></span></span>
          <input id="titulo" tabindex="{{ ++$tabindex }}" maxlength="100" type="text" class="validate[required,maxSize[100]] form-control" value="@if(isset($noticia['titulo'])){{ $noticia['titulo'] }}@else{{ old('titulo') }}@endif" autofocus="autofocus" name="titulo">
        </div><!--input-group-->
      </div><!--col-md-8-->
    </div><!--form-group-->


    <div class="form-group">
      <label for="imagen_1" class="col-md-2 col-xs-12 control-label">
        Imagen Principal:
      </label>
      <div class="col-md-8 col-xs-12">
        <div class="input-group">
          <input id="imagen_1" tabindex="{{ ++$tabindex }}" class="fileinput" type="file" name="img1" accept="image/*">
        </div><!--input-group-->

        @if(isset($noticia['imagenes']['1']))
        <span class="help-block text-center" style="max-width:250px">
          <img src="{{ asset('noticias/'.$noticia['imagenes']['1']) }}" alt="" width="150" class="img-thumbnail">
          <br>
          <button type="button" class="btn btn-danger btn-default btn-condensed btn-sm mb-control" style="margin 5px 100px 0px 100px !important" data-box="#mb-img1">Borrar</button>
        </span>
        @endif

      </div><!--col-md-8-->
    </div><!--form-group-->


    <div class="form-group">
      <label for="fecha" class="col-md-2 col-xs-12 control-label">
        Fecha:
        <code>*</code>
      </label>
      <div class="col-md-2 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><span class="far fa-calendar-alt"></span></span>
          <input id="fecha" tabindex="{{ ++$tabindex }}" placeholder="DD/MM/AAAA" type="text" class="validate[required,custom[date]] form-control datepicker" name="fecha" value="@if(isset($noticia['fecha']))@dmY($noticia['fecha'])@else{{ old('fecha') }}@endif">
        </div>
      </div>
    </div>


    <div class="form-group">
      <label for="extracto" class="col-md-2 col-xs-12 control-label">
        Extracto:
        <code>*</code>
      </label>
      <div class="col-md-8 col-xs-12">
        <textarea id="extracto" tabindex="{{ ++$tabindex }}" rows="6" name="extracto" maxlength="5000" class="validate[required,maxSize[5000]] form-control">@if(isset($noticia['extracto'])){{ $noticia['extracto'] }}@else{{ old('extracto') }}@endif</textarea>
        <span class="help-block"><code>Agrega el primer parrafo de tu noticia o la introducción a la noticia.</code></span>
      </div><!--col-md-6-->
    </div><!--form-group-->


    @if($tipo == "Video")
    <div class="form-group">
      <label for="video_1" class="col-md-2 col-xs-12 control-label">
        Video 1:<code>*</code>
      </label>
      <div class="col-md-8 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><span class="fab fa-youtube"></span></span>
          <input id="video_1" placeholder="https://www.youtube.com/watch?v=BHKp4k-hTUc" tabindex="{{ ++$tabindex }}" value="@if(isset($noticia['videos']['1'])){{ $noticia->yt($noticia->video1)['url'] }}@else{{ old('video1') }}@endif" name="video1" maxlength="255" type="text" class="validate[required,custom[url],maxSize[255]] form-control">
        </div><!--input-group-->
        <span class="help-block">Únicamente se aceptan vídeos de Youtube</span>
        @if(isset($noticia->video1))
        <span class="help-block">
          {!! $noticia->yt($noticia->video1)['embed'] !!}
        </span>
        @endif
      </div><!--col-md-6-->
    </div><!--form-group-->


    <div class="form-group">
      <label for="video_2" class="col-md-2 col-xs-12 control-label">
        Video 2:
      </label>
      <div class="col-md-8 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><span class="fab fa-youtube"></span></span>
          <input id="video_2" placeholder="https://www.youtube.com/watch?v=BHKp4k-hTUc" tabindex="{{ ++$tabindex }}" value="@if(isset($noticia->video2)){{ $noticia->yt($noticia->video2)['url'] }}@else{{ old('video2') }}@endif" name="video2" maxlength="255" type="text" class="validate[custom[url],maxSize[255]] form-control">
        </div><!--input-group-->
        <span class="help-block">Únicamente se aceptan vídeos de Youtube</span>
        @if(isset($noticia->video2))
        <span class="help-block">
          {!! $noticia->yt($noticia->video2)['embed'] !!}
        </span>
        @endif
      </div><!--col-md-6-->
    </div><!--form-group-->


    <div class="form-group">
      <label for="video_3" class="col-md-2 col-xs-12 control-label">
        Video 3:
      </label>
      <div class="col-md-8 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><span class="fab fa-youtube"></span></span>
          <input id="video_3" placeholder="https://www.youtube.com/watch?v=BHKp4k-hTUc" tabindex="{{ ++$tabindex }}" value="@if(isset($noticia->video3)){{ $noticia->yt($noticia->video3)['url'] }}@else{{ old('video3') }}@endif" name="video3" maxlength="255" type="text" class="validate[custom[url],maxSize[255]] form-control">
        </div><!--input-group-->
        <span class="help-block">Únicamente se aceptan vídeos de Youtube</span>
        @if(isset($noticia->video3))
        <span class="help-block">
          {!! $noticia->yt($noticia->video3)['embed'] !!}
        </span>
        @endif
      </div><!--col-md-6-->
    </div><!--form-group-->
    @endif


    @if($tipo == "Audio")
    <div class="form-group">
      <label for="audio_1" class="col-md-2 col-xs-12 control-label">
        Nombre del MP3 1:<code>*</code>
      </label>
      <div class="col-md-5 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><span class="far fa-volume-up"></span></span>
          <input id="audio_1" tabindex="{{ ++$tabindex }}" value="@if(isset($noticia['audios']['1']['nombre'])){{ $noticia['audios']['1']['nombre'] }}@else{{ old('naudio1') }}@endif" type="text" name="naudio1" class="validate[required] form-control">
        </div><!--input-group-->

        @if(isset($noticia['audios']['1']['mp3']))
        <span class="help-block">
          <audio controls>
            <source src="{{ asset('noticias/'.$noticia['audios']['1']['mp3']) }}" type="audio/mpeg" required>
            Tu navegador no soporta este audio.
          </audio>
          <br>
          <button type="button" class="btn btn-danger btn-default btn-condensed btn-sm mb-control" style="margin 5px 100px 0px 100px !important" data-box="#mb-mp31">Borrar</button>
        </span>
        @endif
      </div><!--col-md-6-->

      <div class="col-md-3 col-xs-12">
        <div class="input-group">
          <input id="audio_1_file" tabindex="{{ ++$tabindex }}" class="fileinput" title="Seleccionar MP3 1:" type="file" name="aaudio1"  accept="audio/*">
        </div><!--input-group-->
      </div><!--col-md-6-->
    </div><!--form-group-->


    <div class="form-group">
      <label for="audio_2" class="col-md-2 col-xs-12 control-label">
        Nombre del Mp3 2:
      </label>
      <div class="col-md-5 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><span class="far fa-volume-up"></span></span>
          <input id="audio_2" tabindex="{{ ++$tabindex }}" value="@if(isset($noticia['audios']['2']['nombre'])){{ $noticia['audios']['2']['nombre'] }}@else{{ old('naudio2') }}@endif" type="text" name="naudio2" class="form-control">
        </div><!--input-group-->

        @if(isset($noticia['audios']['2']['mp3']))
        <span class="help-block">
          <audio controls>
            <source src="{{ asset('noticias/'.$noticia['audios']['2']['mp3']) }}" type="audio/mpeg">
            Tu navegador no soporta este audio.
          </audio>
          <br>
          <button type="button" class="btn btn-danger btn-default btn-condensed btn-sm mb-control" style="margin 5px 100px 0px 100px !important" data-box="#mb-mp32">Borrar</button>
        </span>
        @endif
      </div><!--col-md-6-->


      <div class="col-md-3 col-xs-12">
        <div class="input-group">
          <input id="audio_2_file" tabindex="{{ ++$tabindex }}" type="file" class="fileinput" title="Seleccionar MP3 2:" name="aaudio2"  accept="audio/*">
        </div><!--input-group-->
      </div><!--col-md-6-->
    </div><!--form-group-->


    <div class="form-group">
      <label for="audio_3" class="col-md-2 col-xs-12 control-label">
        Nombre del Mp3 3:
      </label>
      <div class="col-md-5 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><span class="far fa-volume-up"></span></span>
          <input id="audio_3" tabindex="{{ ++$tabindex }}" value="@if(isset($noticia['audios']['3']['nombre'])){{ $noticia['audios']['3']['nombre'] }}@else{{ old('naudio3') }}@endif" type="text" name="naudio3" class="form-control">
        </div><!--input-group-->

        @if(isset($noticia['audios']['3']['mp3']))
        <span class="help-block">
          <audio controls>
            <source src="{{ asset('noticias/'.$noticia['audios']['3']['mp3']) }}" type="audio/mpeg">
            Tu navegador no soporta este audio.
          </audio>
          <br>
          <button type="button" class="btn btn-danger btn-default btn-condensed btn-sm mb-control" style="margin 5px 100px 0px 100px !important" data-box="#mb-mp33">Borrar</button>
        </span>
        @endif
      </div><!--col-md-6-->

      <div class="col-md-3 col-xs-12">
        <div class="input-group">
          <input id="audio_3_file" tabindex="{{ ++$tabindex }}" type="file" class="fileinput" title="Seleccionar MP3 3:" name="aaudio3"  accept="audio/*">
        </div><!--input-group-->
      </div><!--col-md-6-->
    </div><!--form-group-->
    @endif


    <div class="form-group">
      <label for="noticia" class="col-md-2 col-xs-12 control-label">
        Noticia:
        <code>*</code>
      </label>
      <div class="col-md-8 col-xs-12">
        <textarea id="noticia" tabindex="{{ ++$tabindex }}" rows="18" name="contenido" class="validate[required] form-control">@if(isset($noticia['contenido'])){{ $noticia['contenido'] }}@else{{ old('contenido') }}@endif</textarea>
      </div><!--col-md-6-->
    </div><!--form-group-->



    <div class="form-group">
      <label for="link_1" class="col-md-2 col-xs-12 control-label">
        Link 1:
      </label>
      <div class="col-md-8 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><span class="fa fa-link"></span></span>
          <input id="link_1" tabindex="{{ ++$tabindex }}" value="@if(isset($noticia['links']['1'])){{ $noticia['links']['1'] }}@else{{ old('link1') }}@endif" name="link1" maxlength="255" type="text" class="validate[custom[url],maxSize[255]] form-control">
        </div><!--input-group-->
        @if(isset($noticia['links']['1']))
        <span class="help-block">

        </span>
        @endif
      </div><!--col-md-6-->
    </div><!--form-group-->

    <div class="form-group">
      <label for="link_2" class="col-md-2 col-xs-12 control-label">
        Link 2:
      </label>
      <div class="col-md-8 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><span class="fa fa-link"></span></span>
          <input id="link_2" tabindex="{{ ++$tabindex }}" value="@if(isset($noticia['links']['2'])){{ $noticia['links']['2'] }}@else{{ old('link2') }}@endif" name="link2" maxlength="255" type="text" class="validate[custom[url],maxSize[255]] form-control">
        </div><!--input-group-->
        @if(isset($noticia['links']['2']))
        <span class="help-block">

        </span>
        @endif
      </div><!--col-md-6-->
    </div><!--form-group-->

    <div class="form-group">
      <label for="link_3" class="col-md-2 col-xs-12 control-label">
        Link 3:
      </label>
      <div class="col-md-8 col-xs-12">
        <div class="input-group">
          <span class="input-group-addon"><span class="fa fa-link"></span></span>
          <input id="link_3" tabindex="{{ ++$tabindex }}" value="@if(isset($noticia['links']['3'])){{ $noticia['links']['3'] }}@else{{ old('link3') }}@endif" name="link3" maxlength="255" type="text" class="validate[custom[url],maxSize[255]] form-control">
        </div><!--input-group-->
        @if(isset($noticia['links']['3']))
        <span class="help-block">

        </span>
        @endif
      </div><!--col-md-6-->
    </div><!--form-group-->





    <div class="form-group">
      <label class="col-md-2 col-xs-12 control-label">
        Archivo descargable:
      </label>
      <div class="col-md-3 col-xs-12">
        <div class="input-group">
          <input id="fil_1" tabindex="{{ ++$tabindex }}" type="file" class="fileinput" title="Foto 1:" name="file1" accept="image/*">
        </div><!--input-group-->
        @if(isset($noticia->file1))
        <span class="help-block text-center" style="max-width:250px">
          <img src="{{ asset($ruta->ruta_img().$noticia->img2) }}" width="150" alt="" class="img-thumbnail">
          <br>
          <button type="button" class="btn btn-danger btn-default btn-condensed btn-sm mb-control" style="margin 5px 100px 0px 100px !important" data-box="#mb-img2">Borrar</button>
        </span>
        @endif
      </div><!--col-md-6-->
      <div class="col-md-3 col-xs-12">
        <div class="input-group">
          <input id="imagen_3" tabindex="{{ ++$tabindex }}" type="file" class="fileinput" title="Foto 2:" name="img3" accept="image/*">
        </div><!--input-group-->
        @if(isset($noticia->img3))
        <span class="help-block text-center" style="max-width:250px">
          <img src="{{ asset($ruta->ruta_img().$noticia->img3) }}" width="150" alt="" class="img-thumbnail">
          <br>
          <button type="button" class="btn btn-danger btn-default btn-condensed btn-sm mb-control" style="margin 5px 100px 0px 100px !important" data-box="#mb-img3">Borrar</button>
        </span>
        @endif
      </div><!--col-md-6-->
      <div class="col-md-3 col-xs-12">
        <div class="input-group">
          <input id="imagen_4" tabindex="{{ ++$tabindex }}" type="file" class="fileinput" title="Foto 3:" name="img4" accept="image/*">
        </div><!--input-group-->
        @if(isset($noticia->img4))
        <span class="help-block text-center" style="max-width:250px">
          <img src="{{ asset($ruta->ruta_img().$noticia->img4) }}" width="150" alt="" class="img-thumbnail">
          <br>
          <button type="button" class="btn btn-danger btn-default btn-condensed btn-sm mb-control" style="margin 5px 100px 0px 100px !important" data-box="#mb-img4">Borrar</button>
        </span>
        @endif
      </div><!--col-md-6-->
    </div><!--form-group-->


    <div class="form-group">
      <label class="col-md-2 col-xs-12 control-label">
        Imagenes Secundarias:
      </label>
      <div class="col-md-3 col-xs-12">
        <div class="input-group">
          <input id="imagen_2" tabindex="{{ ++$tabindex }}" type="file" class="fileinput" title="Foto 1:" name="img2" accept="image/*">
        </div><!--input-group-->
        @if(isset($noticia['imagenes']['2']))
        <span class="help-block text-center" style="max-width:250px">
          <img src="{{ asset('noticias/'.$noticia['imagenes']['2']) }}" width="150" alt="" class="img-thumbnail">
          <br>
          <button type="button" class="btn btn-danger btn-default btn-condensed btn-sm mb-control" style="margin 5px 100px 0px 100px !important" data-box="#mb-img2">Borrar</button>
        </span>
        @endif
      </div><!--col-md-6-->
      <div class="col-md-3 col-xs-12">
        <div class="input-group">
          <input id="imagen_3" tabindex="{{ ++$tabindex }}" type="file" class="fileinput" title="Foto 2:" name="img3" accept="image/*">
        </div><!--input-group-->
        @if(isset($noticia['imagenes']['3']))
        <span class="help-block text-center" style="max-width:250px">
          <img src="{{ asset('noticias/'.$noticia['imagenes']['3']) }}" width="150" alt="" class="img-thumbnail">
          <br>
          <button type="button" class="btn btn-danger btn-default btn-condensed btn-sm mb-control" style="margin 5px 100px 0px 100px !important" data-box="#mb-img3">Borrar</button>
        </span>
        @endif
      </div><!--col-md-6-->
      <div class="col-md-3 col-xs-12">
        <div class="input-group">
          <input id="imagen_4" tabindex="{{ ++$tabindex }}" type="file" class="fileinput" title="Foto 3:" name="img4" accept="image/*">
        </div><!--input-group-->
        @if(isset($noticia['imagenes']['4']))
        <span class="help-block text-center" style="max-width:250px">
          <img src="{{ asset('noticias/'.$noticia['imagenes']['4']) }}" width="150" alt="" class="img-thumbnail">
          <br>
          <button type="button" class="btn btn-danger btn-default btn-condensed btn-sm mb-control" style="margin 5px 100px 0px 100px !important" data-box="#mb-img4">Borrar</button>
        </span>
        @endif
      </div><!--col-md-6-->
    </div><!--form-group-->


    <div class="form-group">
      <label class="col-md-2 col-xs-12 control-label">
      </label>
      <div class="col-md-3 col-xs-12">
        <div class="input-group">
          <input id="imagen_5" tabindex="{{ ++$tabindex }}" type="file" class="fileinput" title="Foto 4:" name="img5" accept="image/*">
        </div><!--input-group-->
        @if(isset($noticia['imagenes']['5']))
        <span class="help-block text-center" style="max-width:250px">
          <img src="{{ asset('noticias/'.$noticia['imagenes']['5']) }}" width="150" alt="" class="img-thumbnail">
          <br>
          <button type="button" class="btn btn-danger btn-default btn-condensed btn-sm mb-control" style="margin 5px 100px 0px 100px !important" data-box="#mb-img5">Borrar</button>
        </span>
        @endif
      </div><!--col-md-6-->
      <div class="col-md-3 col-xs-12">
        <div class="input-group">
          <input id="imagen_6" tabindex="{{ ++$tabindex }}" type="file" class="fileinput" title="Foto 5:" name="img6" accept="image/*">
        </div><!--input-group-->
        @if(isset($noticia['imagenes']['6']))
        <span class="help-block text-center" style="max-width:250px">
          <img src="{{ asset('noticias/'.$noticia['imagenes']['6']) }}" alt="" width="150" class="img-thumbnail">
          <br>
          <button type="button" class="btn btn-danger btn-default btn-condensed btn-sm mb-control" style="margin 5px 100px 0px 100px !important" data-box="#mb-img6">Borrar</button>
        </span>
        @endif
      </div><!--col-md-6-->
      <div class="col-md-3 col-xs-12">
        <div class="input-group">
          <input id="imagen_7" tabindex="{{ ++$tabindex }}" type="file" class="fileinput" title="Foto 6:" name="img7" accept="image/*">
        </div><!--input-group-->
        @if(isset($noticia['imagenes']['7']))
        <span class="help-block text-center" style="max-width:250px">
          <img src="{{ asset('noticias/'.$noticia['imagenes']['7']) }}" alt="" width="150" class="img-thumbnail">
          <br>
          <button type="button" class="btn btn-danger btn-default btn-condensed btn-sm mb-control" style="margin 5px 100px 0px 100px !important" data-box="#mb-img7">Borrar</button>
        </span>
        @endif
      </div><!--col-md-6-->
    </div><!--form-group-->

  </form><!--form-->
</div><!--panel body-->

@if(isset($noticia['imagenes']['1']))
<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-img1">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa fa-times"></span>¿ Borrar <strong>Imagen</strong> ?</div>
      <div class="mb-content">
        <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar la imagen.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <form action="{{ url('cms/prensa/'.$noticia['_id'].'/img/1') }}" method="POST">
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
@endif


@if(isset($noticia['imagenes']['2']))
<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-img2">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa fa-times"></span>¿ Borrar <strong>Imagen</strong> ?</div>
      <div class="mb-content">
        <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar la imagen.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <form action="{{ url('cms/prensa/'.$noticia['_id'].'/img/2') }}" method="POST">
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
@endif


@if(isset($noticia['imagenes']['3']))
<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-img3">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa fa-times"></span>¿ Borrar <strong>Imagen</strong> ?</div>
      <div class="mb-content">
        <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar la imagen.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <form action="{{ url('cms/prensa/'.$noticia['_id'].'/img/3') }}" method="POST">
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
@endif


@if(isset($noticia['imagenes']['4']))
<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-img4">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa fa-times"></span>¿ Borrar <strong>Imagen</strong> ?</div>
      <div class="mb-content">
        <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar la imagen.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <form action="{{ url('cms/prensa/'.$noticia['_id'].'/img/4') }}" method="POST">
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
@endif


@if(isset($noticia['imagenes']['5']))
<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-img5">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa fa-times"></span>¿ Borrar <strong>Imagen</strong> ?</div>
      <div class="mb-content">
        <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar la imagen.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <form action="{{ url('cms/prensa/'.$noticia['_id'].'/img/5') }}" method="POST">
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
@endif


@if(isset($noticia['imagenes']['6']))
<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-img6">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa fa-times"></span>¿ Borrar <strong>Imagen</strong> ?</div>
      <div class="mb-content">
        <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar la imagen.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <form action="{{ url('cms/prensa/'.$noticia['_id'].'/img/6') }}" method="POST">
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
@endif


@if(isset($noticia['imagenes']['7']))
<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-img7">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa fa-times"></span>¿ Borrar <strong>Imagen</strong> ?</div>
      <div class="mb-content">
        <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar la imagen.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <form action="{{ url('cms/prensa/'.$noticia['_id'].'/img/7') }}" method="POST">
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
@endif


@if(isset($noticia['audios']['1']['mp3']))
<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-mp31">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa fa-times"></span>¿ Borrar <strong>Audio</strong> ?</div>
      <div class="mb-content">
        <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar el audio.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <form action="{{ url('cms/prensa/'.$noticia['_id'].'/mp3/1') }}" method="POST">
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
@endif


@if(isset($noticia['audios']['2']['mp3']))
<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-mp32">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa fa-times"></span>¿ Borrar <strong>Audio</strong> ?</div>
      <div class="mb-content">
        <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar el audio.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <form action="{{ url('cms/prensa/'.$noticia['_id'].'/mp3/2') }}" method="POST">
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
@endif


@if(isset($noticia['audios']['3']['mp3']))
<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-mp33">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa fa-times"></span>¿ Borrar <strong>Audio</strong> ?</div>
      <div class="mb-content">
        <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar el audio.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <form action="{{ url('cms/prensa/'.$noticia['_id'].'/mp3/3') }}" method="POST">
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
@endif
@endsection




@section('panel-footer')
  <button class="btn btn-info pull-right" tabindex="{{ ++$tabindex }}" type="submit" form="validate">Siguiente</button>
  <a href="{{ url('cms/prensa') }}" class="btn btn-default pull-left">Anterior</a>
@endsection
