@extends('cms.menu')




@section('h2')
<h2><span class="far fa-edit"></span> Editar Diseño Web</h2>
@stop




@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default tabs">
      <ul class="nav nav-tabs nav-justified" role="tablist">
        <li @if($pestana == "Plantillas") class="active" @endif ><a href="{{ url('cms/diseno/Plantillas') }}"><strong>Plantillas</strong></a></li>
        <li @if($pestana == "head")       class="active" @endif ><a href="{{ url('cms/diseno/head') }}"><strong>Head</strong></a></li>
        <li @if($pestana == "Portada")    class="active" @endif ><a href="{{ url('cms/diseno/Portada') }}"><strong>Portada</strong></a></li>
        <li @if($pestana == "Header")     class="active" @endif ><a href="{{ url('cms/diseno/Header') }}"><strong>Header</strong></a></li>
        <li @if($pestana == "body")       class="active" @endif ><a href="{{ url('cms/diseno/body') }}"><strong>Body</strong></a></li>
        <li @if($pestana == "Footer")     class="active" @endif ><a href="{{ url('cms/diseno/Footer') }}"><strong>Footer</strong></a></li>
        <li @if($pestana == "Imagenes")   class="active" @endif ><a href="{{ url('cms/diseno/Imagenes') }}"><strong>Imagenes</strong></a></li>
      </ul>


      <div class="panel-body tab-content">
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <!--///////////////////////////////////////////////// INICIA TAB 1 ///////////////////////////////////////////////////////-->
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <div class="tab-pane @if($pestana == "Plantillas") active @endif" id="tab-first">
          <div class="alert alert-default">
            A partir de que todos los municipios usen esta nueva plataforma, agregaremos un diseño nuevo cada fin de mes.
          </div>

          <p>&nbsp;</p>

          <div class="col-md-3 text-center">
            <img src="{{ asset('app/img/templates/themes.jpg') }}" alt="Buscar Plantillas" class="img-thumbnail" />
            <p>
              <a href="https://themeforest.net/category/site-templates" class="btn btn-default btn-default" target="_blank">
                <i class="far fa-search"></i> Buscar
              </a>
            </p>
          </div>

          @for($i = 0; $i <= $no_temas; $i++)
            <div class="col-md-3 text-center">
              <img src="{{ asset('app/img/templates/theme_'.$i.'.jpg') }}" alt="Tema {{ $i }}" class="img-thumbnail" />
              <br>
              <div class="btn-group">
                @if($config['tema'] != $i)
                <a href="{{ url('cms/config/tema/'.$i) }}" class="btn btn-default">
                  <i class="far fa-check"></i> Usar
                </a>
                @else
                <button type="submit" class="btn btn-warning mb-control" data-box="#reset">
                  <i class="far fa-circle-notch"></i> Reset
                </button>
                @endif
                @if($i != 0 and $config['tema'] == $i)
                  <a href="#" class="btn @if($config['tema'] != $i) btn-default @else btn-info @endif" data-target="#colores" data-toggle="modal">
                    <i class="far fa-palette"></i> Color
                  </a>
                @endif
                <a href="{{ url('cms/config/pretema/'.$i) }}" class="btn @if($config['tema'] != $i) btn-default @else btn-info @endif" target="_blank">
                  <i class="far fa-eye"></i> Ver
                </a>
              </div>
              <br><br>
            </div>
          @endfor

          <div class="col-md-3">
          </div>

          <div class="col-md-3">
          </div>
        </div><!--tab1-->





        <div class="modal animated fade" id="colores" tabindex="-1" role="dialog" aria-labelledby="smallModalconfigcolores" aria-hidden="true">
          <div class="modal-dialog modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title" id="smallModalconfigcolores"><i class="far fa-palette"></i> Seleccionar <strong>Color</strong></h4>
              </div>
              <div class="modal-body">
                <p>Cambia el color de la plantilla seleccionada actualmente.</p>
              </div>
              <form id="precolorform" method="post" action="{{ url('cms/config/color') }}" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PATCH">

                <div class="modal-body form-horizontal form-group-separated">

                  <div class="form-group">
                    <label for="color" class="col-md-3 control-label">Color:</label>
                    <div class="col-md-8 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><span class="far fa-fill-drip"></span></span>
                        <select id="color" class="validate[required] form-control" name="color">
                          <option value="0">Seleccionar Color:</option>
                          @foreach($partidos as $partido)
                          <option value="{{ $partido}}" @if($config->partido == $partido) selected @endif>{{ $partido }}</option>
                          @endforeach
                        </select>
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
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <!--///////////////////////////////////////////////// TERMINA TAB 1 //////////////////////////////////////////////////////-->
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->





        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <!--///////////////////////////////////////////////// INICIA TAB 2 ///////////////////////////////////////////////////////-->
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <div class="tab-pane @if($pestana == "head") active @endif" id="tab-second">
          <div class="col-md-12">

            <div class="btn-group btn-group-lg pull-right">
              <a href="{{ url('cms/config/css') }}" class="btn btn-default" accesskey="c"><span class="fas fa-plus"></span> CSS</a>
              <a href="{{ url('cms/config/js') }}" class="btn btn-default" accesskey="j"><span class="fas fa-plus"></span> JS</a>
            </div>

            <h2>Editar  &lt;head&gt;</h2>

              <div class="panel-body">
                <p>Los campos marcados con <code>*</code> son obligatorios.</p>
              </div>

              <div class="panel-body">


                <form name="validate" class="form-horizontal" autocomplete="off" action="{{ url('cms/config/body') }}" method="POST">

                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="PATCH">

                  <div class="form-group">
                    <label for="meta-titulo" class="col-md-2 col-xs-12 control-label">
                      Título:
                      <code>*</code>
                    </label>
                    <div class="col-md-8 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon"><span class="far fa-font"></span></span>
                        <input id="meta-titulo" tabindex="{{ ++$tabindex }}" maxlength="55" type="text" class="validate[required,maxSize[55]] form-control" value="{{ $config['titulo'] }}" autofocus="autofocus" name="titulo">
                      </div><!--input-group-->
                    </div><!--col-md-6-->
                  </div><!--form-group-->


                  <div class="form-group">
                    <label for="descripcion" class="col-md-2 col-xs-12 control-label">
                      Descripción:
                      <code>*</code>
                    </label>
                    <div class="col-md-8 col-xs-12">
                      <textarea id="descripcion" tabindex="{{ ++$tabindex }}" maxlength="255" rows="3" name="descripcion" class="validate[required,maxSize[255]] form-control">{{ $config['descripcion'] }}</textarea>
                      <span class="help-block">Agrega la descripción de tu sitio que aparecerá en los buscadores.</span>
                    </div><!--col-md-6-->
                  </div><!--form-group-->

                  <button class="btn btn-info btn-center" tabindex="{{ ++$tabindex }}"><span class="far fa-hdd"></span> &nbsp; Guardar</button>

                </form><!--form-->

                <p>&nbsp;</p>
                <p>&nbsp;</p>

                <form name="validate" class="form-horizontal" autocomplete="off" action="{{ url('cms/config/meta') }}" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="tema" value="{{ $config['tema'] }}">

                  <div class="form-group">
                    <label class="col-md-1 control-label"></label>
                    <div class="col-md-10 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon">&lt;meta</span>
                        <input id="atributos_meta" type="text" maxlength="255" tabindex="{{ ++$tabindex }}" class="validate[required,maxSize[255]] form-control" name="atributos" value="" placeholder="Agrega tus atributos" />
                        <span class="input-group-addon">&gt;</span>
                        <span class="input-group-btn">
                          <button class="btn btn-info btn-condensed" tabindex="{{ ++$tabindex }}"><i class="far fa-plus"></i> Agregar</button>
                        </span>
                      </div>
                    </div>
                    <label class="col-md-1 control-label"></label>
                  </div>

                  @foreach($maqueta['metas'] as $key => $meta)
                    <div class="form-group">
                      <label class="col-md-1 control-label"></label>
                      <div class="col-md-10 col-xs-12">
                        <div class="input-group">
                          <span class="input-group-addon">&lt;meta</span>
                          <input id="meta{{ $key }}" type="text" class="form-control" value="{{ $meta }}" readonly />
                          <span class="input-group-addon">&gt;</span>
                          <span class="input-group-btn">
                            <a class="btn btn-danger btn-condensed mb-control" tabindex="{{ $tabindex }}" data-box="#meta-{{ $key }}"><i class="far fa-times"></i> Borrar</a>
                          </span>
                        </div>
                      </div>
                      <label class="col-md-1 control-label"></label>
                    </div>
                  @endforeach

                  <p>&nbsp;</p>

                  @foreach($csss as $key => $css)
                    <div class="form-group">
                      <label class="col-md-1 control-label"></label>
                      <div class="col-md-10 col-xs-12">
                        <div class="input-group">
                          <span class="input-group-addon">&lt;link</span>
                          <input type="text" class="form-control" value="{{ $css['atributos'] }}" readonly />
                          <span class="input-group-addon add-on"> href=&quot; </span>
                          <input type="text" class="form-control" value="{{ $css['archivo'] }}" readonly />
                          <span class="input-group-addon">&quot;&gt;</span>
                          <span class="input-group-btn">
                            <a class="btn btn-success btn-condensed" tabindex="{{ $tabindex }}" href="{{ url('contenido/css/'.$css['archivo']) }}" download="{{ $css['archivo'] }}" ><i class="far fa-download"></i> Descargar</a>
                            <a class="btn btn-warning btn-condensed" tabindex="{{ $tabindex }}" href="{{ url('cms/config/css/'.$key) }}"><i class="far fa-pencil-alt"></i> Editar</a>
                            <a class="btn btn-danger btn-condensed mb-control" tabindex="{{ $tabindex }}" data-box="#css-{{ $key }}"><i class="far fa-times"></i> Borrar</a>
                          </span>
                        </div>
                      </div>
                      <label class="col-md-1 control-label"></label>
                    </div>
                  @endforeach

                  <p>&nbsp;</p>

                </form>


                <form name="validate" class="form-horizontal" autocomplete="off" action="{{ url('cms/config/link') }}" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group">
                    <label class="col-md-1 control-label"></label>
                    <div class="col-md-10 col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon">&lt;link</span>
                        <input id="atributos_link" type="text" tabindex="{{ ++$tabindex }}" class="validate[required,maxSize[255]] form-control" maxlength="255" name="atributos" value="" placeholder="Agrega tus atributos" />
                        <span class="input-group-btn">
                          <input id="favicon" tabindex="{{ ++$tabindex }}" type="file" class="fileinput" name="imagen" title='Favicon:'>
                        </span>
                        <span class="input-group-addon">&gt;</span>
                        <span class="input-group-btn">
                          <button class="btn btn-info btn-condensed" tabindex="{{ ++$tabindex }}"><i class="far fa-plus"></i> Agregar</button>
                        </span>
                      </div>
                    </div>
                    <label class="col-md-1 control-label"></label>
                  </div>

                  @foreach($maqueta['links'] as $key => $link)
                    <div class="form-group">
                      <label class="col-md-1 control-label"></label>
                      <div class="col-md-10 col-xs-12">
                        <div class="input-group">
                          <span class="input-group-addon">&lt;link</span>
                          <input id="link{{ $key }}" type="text" class="form-control" value="{{ $link['atributos'] }}" readonly />
                          <span class="input-group-addon add-on"> href=&quot; </span>
                          <input id="favicon{{ $key }}" type="text" class="form-control" value="{{ $link['icon'] }}" readonly />
                          <span class="input-group-addon">&gt;</span>
                          <span class="input-group-btn">
                            <a class="btn btn-success btn-condensed" tabindex="{{ $tabindex }}" href="{{ url('/imagenes/'.$link['icon']) }}" download="{{ $link['icon'] }}" ><i class="far fa-download"></i> Descargar</a>
                            <a class="btn btn-danger btn-condensed mb-control" tabindex="{{ $tabindex }}" data-box="#link-{{ $key }}"><i class="far fa-times"></i> Borrar</a>
                          </span>
                        </div>
                      </div>
                      <label class="col-md-1 control-label"></label>
                    </div>
                  @endforeach

                  <p>&nbsp;</p>

                  @foreach($jss as $key => $js)
                    <div class="form-group">
                      <label class="col-md-1 control-label"></label>
                      <div class="col-md-10 col-xs-12">
                        <div class="input-group">
                          <span class="input-group-addon">&lt;script&gt;</span>
                          <input id="js{{ $key }}" type="text" class="form-control" value="{{ $js['atributos'] }}" readonly />
                          <span class="input-group-addon add-on"> href=&quot; </span>
                          <input id="js{{ $key }}href" type="text" class="form-control" value="{{ $js['archivo'] }}" readonly />
                          <span class="input-group-addon">&quot; &lt;/script&gt;</span>
                          <span class="input-group-btn">
                            <a class="btn btn-success btn-condensed" tabindex="{{ $tabindex }}" href="{{ url('contenido/js/'.$js['archivo']) }}" download="{{ $js['archivo'] }}" ><i class="far fa-download"></i> Descargar</a>
                            <a class="btn btn-warning btn-condensed" tabindex="{{ $tabindex }}" href="{{ url('cms/config/js/'.$key) }}"><i class="far fa-pencil-alt"></i> Editar</a>
                            <a class="btn btn-danger btn-condensed mb-control" tabindex="{{ $tabindex }}" data-box="#js-{{ $key }}"><i class="far fa-times"></i> Borrar</a>
                          </span>
                        </div>
                      </div>
                      <label class="col-md-1 control-label"></label>
                    </div>
                  @endforeach

                  <p>&nbsp;</p>
                </form>
              </div><!--panel-body-->
            <h2>Editar  &lt;/head&gt;</h2>
          </div><!-- col-md-12-->
        </div><!--tab 2-->
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <!--///////////////////////////////////////////////// TERMINA TAB 2 //////////////////////////////////////////////////////-->
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->





        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <!--///////////////////////////////////////////////// INICIA TAB 3 ///////////////////////////////////////////////////////-->
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <div class="tab-pane @if($pestana == "Portada") active @endif" id="tab-third">
          <div class="col-md-12">
            @if($config['tema'] == 0)
              <div class="pull-right">
                <a href="#" class="btn btn-default" data-toggle="modal" data-target="#modal_Portada"><span class="fas fa-plus"></span>
                  AGREGAR MÓDULO EN PORTADA
                </a>
              </div>
            @endif
            <h2>Editar Header del Index (Portada)</h2>
          </div>

          <div class="col-md-12">

            @foreach($modulos as $modulo)
              @if($modulo['columna'] == "Portada")

                @include('ayudig.cms.etcetera.Modulo_foreach')

              @endif
            @endforeach

          </div>
        </div><!--tab 3-->
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <!--///////////////////////////////////////////////// TERMINA TAB 3 //////////////////////////////////////////////////////-->
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->





        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <!--///////////////////////////////////////////////// INICIA TAB 4 ///////////////////////////////////////////////////////-->
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <div class="tab-pane @if($pestana == "Header") active @endif" id="tab-fourth">
          <div class="col-md-12">
            @if($config['tema'] == 0)
              <div class="pull-right">
                <a href="#" class="btn btn-default" data-toggle="modal" data-target="#modal_Header"><span class="fa fa-plus"></span>
                  AGREGAR MÓDULO EN HEADER
                </a>
              </div>
            @endif
            <h2>Editar Header de toda la página</h2>
          </div>

          <div class="col-md-12">

            @foreach($modulos as $modulo)
              @if($modulo['columna'] == "Header")

                @include('ayudig.cms.etcetera.Modulo_foreach')

              @endif
            @endforeach

          </div>
        </div><!--tab 5-->
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <!--///////////////////////////////////////////////// TERMINA TAB 4 //////////////////////////////////////////////////////-->
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->





        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <!--///////////////////////////////////////////////// INICIA TAB 5 ///////////////////////////////////////////////////////-->
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <div class="tab-pane @if($pestana == "body") active @endif" id="tab-fifth">
          <div class="col-md-12">
            <h2>Editar Body de toda la página</h2>
          </div>

          <div class="col-md-12">
            <div class="panel-body">

              Los atributos que uses en <code>BODY</code>, en esta sección se aplicarán a todas las páginas.
              <p>&nbsp;</p>

              <form id="form" name="validate" class="form-horizontal" action="{{ url('cms/config/body') }}" method="POST" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PATCH">

                <div class="form-group">
                  <div class="col-md-12 col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon">&lt;body</span>
                      <input id="bodyattributes" type="text" class="validate[maxSize[255]] form-control" autofocus maxlength="255" placeholder="Agrega tus atributos" name="bodyattributes" value="{{ $config['bodyattributes'] }}" tabindex="{{ ++$tabindex }}">
                      <span class="input-group-addon">&gt;</span>
                    </div>
                  </div>
                </div><!--form-group-->

                <div class="form-group">
                  <div class="col-md-12 col-xs-12">
                    <p>
                      <textarea rows="4" name="bodyafter" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['bodyafter'] }}</textarea>
                    </p>
                    <span class="help-block"><code>El código que agregues aquí será el que aparece después del <code>&lt;BODY></code></code></span>
                  </div>
                </div>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p><code>&lt;header&gt;</code></p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <div class="form-group">
                  <div class="col-md-12 col-xs-12">
                    <p>
                      <textarea rows="4" name="columnasbefore" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['columnasbefore'] }}</textarea>
                    </p>
                    <span class="help-block"><code>El código que agregues aquí será el que envolverá a las columnas (inicia conteiner)</code></span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12 no-padding-top col-xs-12">
                    <div class="row">
                      <div class="col-md-4 text-center">
                        <label class="check">
                          <a href="#" data-toggle="modal" data-target="#modal_layout9">
                            <img src="{{ asset('app/img/templates/9.png') }}" alt="Layout 9" class="img-thumbnail" />
                          </a>
                        </label>
                      </div>
                      <div class="col-md-4 text-center">
                        <label class="check">
                          <a href="#" data-toggle="modal" data-target="#modal_layout8">
                            <img src="{{ asset('app/img/templates/8.png') }}" alt="Layout 8" class="img-thumbnail" />
                          </a>
                        </label>
                      </div>
                      <div class="col-md-4 text-center">
                        <label class="check">
                          <a href="#" data-toggle="modal" data-target="#modal_layout3">
                            <img src="{{ asset('app/img/templates/3.png') }}" alt="Layout 3" class="img-thumbnail" />
                          </a>
                        </label>
                      </div>
                    </div>
                  </div><!--col-md-6-->
                </div>

                <div class="form-group">
                  <div class="col-md-12 col-xs-12">
                    <p>
                      <textarea rows="4" name="columnasafter" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['columnasafter'] }}</textarea>
                    </p>
                    <span class="help-block"><code>El código que agregues aquí será el que envolverá a las columnas (finaliza conteiner)</code></span>
                  </div>
                </div>

                <button class="btn btn-info btn-center" tabindex="{{ ++$tabindex }}"><span class="far fa-hdd"></span> &nbsp; Guardar</button>

                <div class="form-group">
                  <div class="col-md-8 col-xs-12">
                    <div class="input-group">
                      <code>&lt;/body&gt;</code>
                    </div>
                  </div>
                </div>

              </form><!--form-->

              <div class="modal animated fade" id="modal_layout9" tabindex="-1" role="dialog" aria-labelledby="smallModalHeadlayout9" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                      <h4 class="modal-title" id="smallModalHeadlayout9">
                        <span class="far fa-object-group"></span>
                        Editar Layout
                      </h4>
                    </div>
                    <form id="layout9" method="post" action="{{ url('cms/config/layout') }}" autocomplete="off">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="layout" value="9">

                      <div class="modal-body form-horizontal">
                        <br>
                        <div class="col-md-8">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Columna <strong>Izquierda</strong></h3>
                            </div>
                            <div class="panel-body">
                              <div class="form-group">
                                <div class="col-md-12 col-xs-12">
                                  <p>
                                    <textarea rows="4" name="izquierdabeforeg" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['izquierdabeforeg'] }}</textarea>
                                  </p>
                                  <div class="input-group">
                                    <code>&lt;contenido&gt;</code>
                                  </div>
                                  <br>
                                  <p>
                                    <textarea rows="4" name="izquierdaafterg" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['izquierdaafterg'] }}</textarea>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Columna <strong>Derecha</strong></h3>
                            </div>
                            <div class="panel-body">
                              <div class="form-group">
                                <div class="col-md-12 col-xs-12">
                                  <p>
                                    <textarea rows="4" name="derechabefores" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['derechabefores'] }}</textarea>
                                  </p>
                                  <div class="input-group">
                                    <code>&lt;contenido&gt;</code>
                                  </div>
                                  <br>
                                  <p>
                                    <textarea rows="4" name="derechaafters" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['derechaafters'] }}</textarea>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!--modal-body-->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Enviar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      </div>
                    </form>
                  </div><!--modal-content-->
                </div><!--modal-dialog-->
              </div><!--modal animated-->

              <div class="modal animated fade" id="modal_layout8" tabindex="-1" role="dialog" aria-labelledby="smallModalHeadlayout8" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                      <h4 class="modal-title" id="smallModalHeadlayout8">
                        <span class="far fa-object-group"></span>
                        Editar Layout
                      </h4>
                    </div>
                    <form id="layout8" method="post" action="{{ url('cms/config/layout') }}" autocomplete="off">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="layout" value="8">

                      <div class="modal-body form-horizontal">
                        <br>
                        <div class="col-md-4">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Columna <strong>Izquierda</strong></h3>
                            </div>
                            <div class="panel-body">

                              <div class="form-group">
                                <div class="col-md-12 col-xs-12">
                                  <p>
                                    <textarea rows="2" name="izquierdabefores" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['izquierdabefores'] }}</textarea>
                                  </p>
                                  <div class="input-group">
                                    <code>&lt;contenido&gt;</code>
                                  </div>
                                  <p>
                                    <textarea rows="2" name="izquierdaafters" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['izquierdabefores'] }}</textarea>
                                  </p>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>

                        <div class="col-md-8">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Columna <strong>Derecha</strong></h3>
                            </div>
                            <div class="panel-body">

                              <div class="form-group">
                                <div class="col-md-12 col-xs-12">
                                  <p>
                                    <textarea rows="2" name="derechabeforeg" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['derechabeforeg'] }}</textarea>
                                  </p>
                                  <div class="input-group">
                                    <code>&lt;contenido&gt;</code>
                                  </div>
                                  <p>
                                    <textarea rows="2" name="derechaafterg" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['derechaafterg'] }}</textarea>
                                  </p>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div><!--modal-body-->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Enviar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      </div>
                    </form>
                  </div><!--modal-content-->
                </div><!--modal-dialog-->
              </div><!--modal animated-->

              <div class="modal animated fade" id="modal_layout3" tabindex="-1" role="dialog" aria-labelledby="smallModalHeadlayout3" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                      <h4 class="modal-title" id="smallModalHeadlayout3">
                        <span class="far fa-object-group"></span>
                        Editar Layout
                      </h4>
                    </div>
                    <form id="layout3" method="post" action="{{ url('cms/config/layout') }}" autocomplete="off">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="layout" value="3">

                      <div class="modal-body form-horizontal">
                        <div class="col-md-12">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Columna <strong>Superior</strong></h3>
                            </div>
                            <div class="panel-body">
                              <div class="form-group">
                                <div class="col-md-12 col-xs-12">
                                  <p>
                                    <textarea rows="1" name="superiorbefore" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['superiorbefore'] }}</textarea>
                                  </p>
                                  <div class="input-group">
                                    <code>&lt;contenido&gt;</code>
                                  </div>
                                  <p>
                                    <textarea rows="1" name="superiorafter" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['superiorafter'] }}</textarea>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Columna <strong>Izquierda</strong></h3>
                            </div>
                            <div class="panel-body">

                              <div class="form-group">
                                <div class="col-md-12 col-xs-12">
                                  <p>
                                    <textarea rows="1" name="izquierdabefore3" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['izquierdabefore3'] }}</textarea>
                                  </p>
                                  <div class="input-group">
                                    <code>&lt;contenido&gt;</code>
                                  </div>
                                  <p>
                                    <textarea rows="1" name="izquierdaafter3" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['izquierdaafter3'] }}</textarea>
                                  </p>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Columna <strong>Central</strong></h3>
                            </div>
                            <div class="panel-body">

                              <div class="form-group">
                                <div class="col-md-12 col-xs-12">
                                  <p>
                                    <textarea rows="1" name="centrobefore3" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['centrobefore3'] }}</textarea>
                                  </p>
                                  <div class="input-group">
                                    <code>&lt;contenido&gt;</code>
                                  </div>
                                  <p>
                                    <textarea rows="1" name="centroafter3" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['centroafter3'] }}</textarea>
                                  </p>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Columna <strong>Derecha</strong></h3>
                            </div>
                            <div class="panel-body">

                              <div class="form-group">
                                <div class="col-md-12 col-xs-12">
                                  <p>
                                    <textarea rows="1" name="derechabefore3" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['derechabefore3'] }}</textarea>
                                  </p>
                                  <div class="input-group">
                                    <code>&lt;contenido&gt;</code>
                                  </div>
                                  <p>
                                    <textarea rows="1" name="derechaafter3" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['derechaafter3'] }}</textarea>
                                  </p>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Columna <strong>Inferior</strong></h3>
                            </div>
                            <div class="panel-body">
                              <div class="form-group">
                                <div class="col-md-12 col-xs-12">
                                  <p>
                                    <textarea rows="1" name="inferiorbefore" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['inferiorbefore'] }}</textarea>
                                  </p>
                                  <div class="input-group">
                                    <code>&lt;contenido&gt;</code>
                                  </div>
                                  <p>
                                    <textarea rows="1" name="inferiorafter" tabindex="{{ ++$tabindex }}" placeholder="Agrega tu código html" class="form-control">{{ $config['inferiorafter'] }}</textarea>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!--modal-body-->
                      <div class="modal-footer">
                        <button type="submit" tabindex="{{ ++$tabindex }}" class="btn btn-info">Enviar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      </div>
                    </form>
                  </div><!--modal-content-->
                </div><!--modal-dialog-->
              </div><!--modal animated-->

            </div><!--panel body-->
          </div><!--col-md-12-->
        </div><!--tab 4-->
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <!--///////////////////////////////////////////////// TERMINA TAB 5 //////////////////////////////////////////////////////-->
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->





        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <!--///////////////////////////////////////////////// INICIA TAB 6 ///////////////////////////////////////////////////////-->
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <div class="tab-pane @if($pestana == "Footer") active @endif" id="tab-sixth">
          <div class="col-md-12">
            @if($config['tema'] == 0)
              <div class="pull-right">
                <a href="#" class="btn btn-default" data-toggle="modal" data-target="#modal_Footer"><span class="fa fa-plus"></span>
                  AGREGAR MÓDULO EN FOOTER
                </a>
              </div>
            @endif
            <h2>Editar Footer de toda la página</h2>
          </div>

          <div class="col-md-12">

            @foreach($modulos as $modulo)
              @if($modulo['columna'] == "Footer")

                @include('ayudig.cms.etcetera.Modulo_foreach')

              @endif
            @endforeach

          </div>
        </div>
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <!--///////////////////////////////////////////////// TERMINA TAB 5 //////////////////////////////////////////////////////-->
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <!--///////////////////////////////////////////////// INICIA TAB 6 ///////////////////////////////////////////////////////-->
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <div class="tab-pane @if($pestana == "Imagenes") active @endif" id="tab-seventh">
          <div class="col-md-12">
            <h2>
              Galería de Imágenes para el diseño Web
            </h2>
            <div class="pull-right">
              <form id="validate" action="{{ url('cms/design/Imagenes') }}" name="validate" class="form-horizontal" autocomplete="off"  method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                  <div class="input-group">
                    <input id="fondo" tabindex="{{ ++$tabindex }}" type="file" class="fileinput" name="fondo" title='Seleccionar Imagen:' accept="image/*">
                    <button class="btn btn-info pull-right" tabindex="{{ ++$tabindex}}" type="submit">Guardar</button>
                  </div><!--input-group-->
                </div>

                <div class="form-group">
                  <div class="col-md-12 col-xs-12">
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="col-md-12">
            <div class="gallery text-center">
              <p>&nbsp;</p>
              @foreach($fondos as $fondo)
              <div class="gallery-item">
                <a href="{{ url(CONTENIDOS.'img/'.$fondo->fondo) }}" data-gallery>
                  <div class="image">
                    <img alt="{{ $fondo->fondo }}" src="{{ asset(CONTENIDOS.'img/'.$fondo->fondo) }}" >
                  </div>
                  <br>
                </a>

                <div class="btn-group">
                  <button class="btn btn-info btn-condensed" data-toggle="modal" data-target="#modal_fondo{{ $fondo->id }}">
                    <span class="far fa-code"></span> Url
                  </button>

                  <button class="btn btn-danger btn-condensed mb-control" data-box="#mb-fondo{{ $fondo->id }}">
                    <i class="far fa-times"></i> Borrar
                  </button>
                </div>
              </div>
              @endforeach
            </div>
          </div>

          <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
          </div>

        </div><!--tab 6-->

      </div>
    </div>
  </div>
</div><!--row-->

<!--////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////// MODALS //////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////-->



<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="reset">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="far fa-circle-notch"></span> ¿ Reiniciar <strong>Plantilla</strong> ?</div>
      <div class="mb-content">
        <p>Los cambios que hayas hecho a esta plantilla serán eliminados y cambiados por los que vienen por defecto.</p>
        <p>&nbsp;</p>
        <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para reiniciar.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <form action="{{ url('cms/config/tema/'.$config['tema']) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="reset" value="1">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <button class="btn btn-success btn-lg" type="submit">Sí</button>
            <button class="btn btn-danger btn-lg mb-control-close">No</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



@foreach($maqueta['metas'] as $key => $meta)
<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="meta-{{ $key }}">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa-times"></span>¿ Borrar <strong>META</strong> ?</div>
      <div class="mb-content">
        <p>Una vez borrado este elemento no podra ser recuperado.</p>
        <p>&nbsp;</p>
        <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar la etiqueta META.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <form action="{{ url('cms/config/meta/'.$key) }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <button class="btn btn-success btn-lg" type="submit">Sí</button>
            <button class="btn btn-danger btn-lg mb-control-close">No</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach



@foreach($maqueta['css'] as $key => $css)
<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="css-{{ $key }}">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa-times"></span>¿ Borrar archivo <strong>CSS</strong> ?</div>
      <div class="mb-content">
        <p>Una vez borrado este elemento no podra ser recuperado.</p>
        <p>&nbsp;</p>
        <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar el archivo CSS.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <form action="{{ url('cms/config/css/'.$key) }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <button class="btn btn-success btn-lg" type="submit">Sí</button>
            <button class="btn btn-danger btn-lg mb-control-close">No</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach



@foreach($maqueta['links'] as $key => $link)
<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="link-{{ $key }}">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa fa-times"></span>¿ Borrar <strong>LINK</strong> ?</div>
      <div class="mb-content">
        <p>Una vez borrado este elemento no podra ser recuperado.</p>
        <p>&nbsp;</p>
        <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar la etiqueta LINK.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <form action="{{ url('cms/config/link/'.$key) }}" method="POST">

            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <button class="btn btn-success btn-lg" type="submit">Sí</button>
            <button class="btn btn-danger btn-lg mb-control-close">No</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach



@foreach($maqueta['js'] as $key => $js)
<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="js-{{ $key }}">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa fa-times"></span>¿ Borrar archivo <strong>JS</strong> ?</div>
      <div class="mb-content">
        <p>Una vez borrado este elemento no podra ser recuperado.</p>
        <p>&nbsp;</p>
        <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar la etiqueta JS.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <form action="{{ url('cms/config/js/'.$key) }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <button class="btn btn-success btn-lg" type="submit">Sí</button>
            <button class="btn btn-danger btn-lg mb-control-close">No</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach



@foreach($fondos as $fondo)
<div class="modal animated fade" id="modal_fondo{{ $fondo->id }}" tabindex="-1" role="dialog" aria-labelledby="modal_fondo{{ $fondo->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Cerrar</span>
        </button>
        <h4 class="modal-title" id="smallModalHead{{ $fondo->id }}">
          <span class="far fa-code"></span>
          Copia <strong>Url</strong>
        </h4>
      </div>

      <form name="validate" method="POST" autocomplete="off">

        <div class="modal-body form-horizontal">
          <p>Copia la <code>Url</code> para usarlo en algun elemento CSS.</p>
        </div>
        <div class="modal-body form-horizontal form-group-separated">

          <div class="form-group">
            <label for="fondo{{ $fondo->id }}" class="col-md-2 control-label">Url:</label>
            <div class="col-md-9 col-xs-12">
              <div class="input-group">
                <span class="input-group-addon"><span class="far fa-code"></span></span>
                <input id="fondo{{ $fondo->id }}" type="text" class="form-control" name="lista" value="url('../img/{{ $fondo->fondo }}')" />
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




<div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-fondo{{ $fondo->id }}">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa fa-times"></span>¿ Borrar <strong>Imagen</strong> ?</div>
      <div class="mb-content">
        <p>Presiona <span class="label label-danger label-form">NO</span> para cancelar la operación. Presiona <span class="label label-success label-form">SÍ</span> para eliminar la imagen.</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <form action="{{ url('cms/design/Imagenes/') }}" method="POST">
            <input name="_method" type="hidden" value="DELETE">
            <input name="_token"  type="hidden" value="{{ csrf_token() }}">
            <input name="fondo_id"  type="hidden" value="{{ $fondo->id }}">

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
