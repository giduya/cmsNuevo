<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Auxiliares\Upload;
use App\Models\Config;
use App\Models\Css;
use App\Models\Js;

use App\Http\Requests\ConfigRequest;
use App\Http\Requests\NoticiaRequest;


class DisenoController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }





  public function instalar()
  {
    ///////////////////////////////////////////////////////////////////////
    $menu_html = ['modulohtmlbefore' => 'modulohtmlbefore','modulohtmlafter' => 'modulohtmlafter', 'ulattributes' => 'ulattributes', 'liattributes_link' => 'liattributes_link', 'lihtmlafter_link' => 'lihtmlafter_link', 'aattributes_link' => 'aattributes_link', 'ahtmlafter_link' => 'ahtmlafter_link', 'lihtmlbefore_link' => 'lihtmlbefore_link', 'ahtmlbefore_link' =>'ahtmlbefore_link','lihtmlbefore_link' => 'lihtmlbefore_link','liattributes_drop' => 'liattributes_drop','lihtmlafter_drop' => 'lihtmlafter_drop','aattributes_drop' => 'aattributes_drop','ahtmlafter_drop' => 'ahtmlafter_drop','ahtmlbefore_drop' => 'ahtmlbefore_drop','subulhtmlbefore' => 'subulhtmlbefore','subulattributes' => 'subulattributes','sublihtmlafter' => 'sublihtmlafter','subliattributes' => 'subliattributes','lihtmlbefore_drop' => 'lihtmlbefore_drop','subaattributes' => 'subaattributes','subahtmlafter' => 'subahtmlafter','subahtmlbefore' => 'subahtmlbefore','sublihtmlbefore' => 'sublihtmlbefore'];

    $header  = [0 => ['nombre' => 'Menú Principal','tipo' => 'Menu','columna' => 'header', 'lista' => 0, 'html' => $menu_html]];
    $portada = [0 => ['nombre' => 'Menú Principal','tipo' => 'Menu','columna' => 'portada','lista' => 0, 'html' => ['modulohtmlbefore' => 'modulohtmlbefore','modulohtmlafter' => 'modulohtmlafter', 'ulattributes' => 'ulattributes', 'liattributes_link' => 'liattributes_link', 'lihtmlafter_link' => 'lihtmlafter_link', 'aattributes_link' => 'aattributes_link', 'ahtmlafter_link' => 'ahtmlafter_link', 'lihtmlbefore_link' => 'lihtmlbefore_link', 'ahtmlbefore_link' =>'ahtmlbefore_link','lihtmlbefore_link' => 'lihtmlbefore_link','liattributes_drop' => 'liattributes_drop','lihtmlafter_drop' => 'lihtmlafter_drop','aattributes_drop' => 'aattributes_drop','ahtmlafter_drop' => 'ahtmlafter_drop','ahtmlbefore_drop' => 'ahtmlbefore_drop','subulhtmlbefore' => 'subulhtmlbefore','subulattributes' => 'subulattributes','sublihtmlafter' => 'sublihtmlafter','subliattributes' => 'subliattributes','lihtmlbefore_drop' => 'lihtmlbefore_drop','subaattributes' => 'subaattributes','subahtmlafter' => 'subahtmlafter','subahtmlbefore' => 'subahtmlbefore','sublihtmlbefore' => 'sublihtmlbefore'] ]];

    $menu   = [0 => ['menu' => 'Inicio', 'url' => "inicio",],
               1 => ['menu' => 'Tu Municipio', 'url' => 'municipio'],
               2 => ['menu' => 'Tu Gobierno', 'url' => 'gobierno'],
               3 => ['menu' => 'Trámites y Servicios', 'url' => 'tramites'],
               4 => ['menu' => 'Obligaciones', 'url' => 'obligaciones'],
               5 => ['menu' => 'Contacto', 'url' => 'contacto'],];

    $config = [ "tema" => 1,
                "titulo" => "Municipio de ???",
                "descripcion" => "Sitio web oficial del Municipio ??? con toda la información general, turística, servicios y más que necesitas de tu gobierno municipal.",
                "menu" => $menu,
              ];

    $secciones = [];

    $html = [
                 "bodyattributes" => "",
                 "bodyafter" => "bodyafter",
                 "columnasafter" => "columnasafter",
                 "columnasbefore" => "columnasbefore",

                 "izquierdabeforeg" => "izquierdabeforeg",
                 "izquierdaafterg" => "izquierdaafterg",
                 "derechabefores" => "derechabefores",
                 "derechaafters" => "derechaafters",

                 "izquierdabefores" => "izquierdabefores",
                 "izquierdaafters" => "izquierdaafters",
                 "derechabeforeg" => "derechabeforeg",
                 "derechaafterg" => "derechaafterg",

                 "superiorbefore" => "superiorbefore",
                 "superiorafter" => "superiorafter",
                 "izquierdabefore3" => "izquierdabefore3",
                 "izquierdaafter3" => "izquierdaafter3",
                 "centrobefore3" => "centrobefore3",
                 "centroafter3" => "centroafter3",
                 "derechabefore3" => "derechabefore3",
                 "derechaafter3" => "derechaafter3",
                 "inferiorbefore" => "inferiorbefore",
                 "inferiorafter" => "inferiorafter",

                 "izquierdabefores" => "izquierdabefores",
                 "izquierdaafters" => "izquierdaafters",
                 "derechabeforeg" => "derechabeforeg",
                 "izquierdaafters" => "izquierdaafters",
                ];

    $metas = ['charset="utf-8"','http-equiv="X-UA-Compatible" content="IE=edge"','name="viewport" content="width=device-width, initial-scale=1"'];

    $links = [];

    $css = [
        ['atributos' => 'rel="stylesheet" type="text/css"', 'nombre' => 'custom',          'archivo' => 'custom.css',           'lista' => '1'],
        ['atributos' => 'rel="stylesheet" type="text/css"', 'nombre' => 'responsive',          'archivo' => 'responsive.css',           'lista' => '2'],
        ['atributos' => 'rel="stylesheet" type="text/css"', 'nombre' => 'color',               'archivo' => 'color.css',                'lista' => '3'],
        ['atributos' => 'rel="stylesheet" type="text/css"', 'nombre' => 'all',                 'archivo' => 'all.css',                  'lista' => '4'],
        ['atributos' => 'rel="stylesheet" type="text/css"', 'nombre' => 'owl_carousel_min',    'archivo' => 'owl_carousel_min.css',     'lista' => '5'],
        ['atributos' => 'rel="stylesheet" type="text/css"', 'nombre' => 'bootstrap_min',       'archivo' => 'bootstrap_min.css',        'lista' => '6'],
        ['atributos' => 'rel="stylesheet" type="text/css"', 'nombre' => 'prettyPhoto',         'archivo' => 'prettyPhoto.css',          'lista' => '7'],
        ['atributos' => 'rel="stylesheet" type="text/css"', 'nombre' => 'slick',               'archivo' => 'slick.css',                'lista' => '8'],
        ['atributos' => 'rel="stylesheet" type="text/css"', 'nombre' => 'rev_slider_settings', 'archivo' => 'rev_slider_settings.css',  'lista' => '9'],
        ['atributos' => 'rel="stylesheet" type="text/css"', 'nombre' => 'rev_slider_layers',   'archivo' => 'rev_slider_layers.css',    'lista' => '10'],
        ['atributos' => 'rel="stylesheet" type="text/css"', 'nombre' => 'navigation',          'archivo' => 'navigation.css',           'lista' => '11'],
    ];

    $js = [
        ['atributos' => null, 'nombre' => 'jquery_min',                             'archivo' => 'jquery_min.js',                           'lista' => '1'],
        ['atributos' => null, 'nombre' => 'bootstrap_min',                          'archivo' => 'bootstrap_min.js',                        'lista' => '2'],
        ['atributos' => null, 'nombre' => 'owl_carousel_min',                       'archivo' => 'owl_carousel_min.js',                     'lista' => '3'],
        ['atributos' => null, 'nombre' => 'jquery_prettyPhoto',                     'archivo' => 'jquery_prettyPhoto.js',                   'lista' => '4'],
        ['atributos' => null, 'nombre' => 'slick_min',                              'archivo' => 'slick_min.js',                            'lista' => '5'],
        ['atributos' => null, 'nombre' => 'custom',                                 'archivo' => 'custom.js',                               'lista' => '6'],
        ['atributos' => null, 'nombre' => 'jquery_themepunch_tools_min',            'archivo' => 'jquery_themepunch_tools_min.js',          'lista' => '7'],
        ['atributos' => null, 'nombre' => 'jquery_themepunch_revolution_min',       'archivo' => 'jquery_themepunch_revolution_min.js',     'lista' => '8'],
        ['atributos' => null, 'nombre' => 'rev_slider',                             'archivo' => 'rev_slider.js',                           'lista' => '9'],
        ['atributos' => null, 'nombre' => 'revolution_extension_actions_min',       'archivo' => 'revolution_extension_actions_min.js',     'lista' => '10'],
        ['atributos' => null, 'nombre' => 'revolution_extension_carousel_min',      'archivo' => 'revolution_extension_carousel_min.js',    'lista' => '11'],
        ['atributos' => null, 'nombre' => 'revolution_extension_kenburn_min',       'archivo' => 'revolution_extension_kenburn_min.js',     'lista' => '12'],
        ['atributos' => null, 'nombre' => 'revolution_extension_layeranimation',    'archivo' => 'revolution_extension_layeranimation.js',  'lista' => '13'],
        ['atributos' => null, 'nombre' => 'revolution_extension_migration_min',     'archivo' => 'revolution_extension_migration_min.js',   'lista' => '14'],
        ['atributos' => null, 'nombre' => 'revolution_extension_navigation_min',    'archivo' => 'revolution_extension_navigation_min.js',  'lista' => '15'],
        ['atributos' => null, 'nombre' => 'revolution_extension_parallax_min',      'archivo' => 'revolution_extension_parallax_min.js',    'lista' => '16'],
        ['atributos' => null, 'nombre' => 'revolution_extension_slideanims_min',    'archivo' => 'revolution_extension_slideanims_min.js',  'lista' => '17'],
        ['atributos' => null, 'nombre' => 'revolution_extension_video_min',         'archivo' => 'revolution_extension_video_min.js',       'lista' => '18'],
    ];

    $maqueta = [
        "tema" => 1,
        "metas" => $metas,
        "links" => $links,
        "css" => $css,
        "js" => $js,
        "html" => $html,
        "header" => $header,
        "portada" => $portada,
        "secciones" => $secciones,
       ];

    $res = Config::mongo('config',$config,"I");

    $res = Config::mongo('maqueta',$maqueta,"I");

    $this->json();
  }





  public function json()
  {
    $maqueta = Config::maqueta();

    $r = \Storage::disk('public')->put('maqueta.json', json_encode($maqueta));
  }





  public function modulo(Request $request)
  {
    $maqueta = Config::maqueta()[$request->route()->seccion][$request->route()->id];


    $config = Config::config();

    if($request->route()->html == "html")
    {
        if($request->method() == "PUT")
        {
            $html = ["modulohtmlbefore" => $request->input('modulohtmlbefore'),
                      "modulohtmlafter" => $request->input('modulohtmlafter'),
                      "ulattributes" => $request->input('ulattributes'),
                      "liattributes_link" => $request->input('liattributes_link'),
                      "lihtmlafter_link" => $request->input('lihtmlafter_link'),
                      "aattributes_link" => $request->input('aattributes_link'),
                      "ahtmlafter_link" => $request->input('ahtmlafter_link'),
                      "lihtmlbefore_link" => $request->input('lihtmlbefore_link'),
                      "ahtmlbefore_link" => $request->input('ahtmlbefore_link'),
                      "liattributes_drop" => $request->input('liattributes_drop'),
                      "lihtmlafter_drop" => $request->input('lihtmlafter_drop'),
                      "aattributes_drop" => $request->input('aattributes_drop'),
                      "ahtmlafter_drop" => $request->input('ahtmlafter_drop'),
                      "ahtmlbefore_drop" => $request->input('ahtmlbefore_drop'),
                      "subulhtmlbefore" => $request->input('subulhtmlbefore'),
                      "subulattributes" => $request->input('subulattributes'),
                      "sublihtmlafter" => $request->input('sublihtmlafter'),
                      "subaattributesall" => $request->input('subaattributesall'),
                      "subliattributes" => $request->input('subliattributes'),
                      "lihtmlbefore_drop" => $request->input('lihtmlbefore_drop'),
                      "subaattributes" => $request->input('subaattributes'),
                      "subahtmlafter" => $request->input('subahtmlafter'),
                      "subahtmlbefore" => $request->input('subahtmlbefore'),
                      "sublihtmlbefore" => $request->input('sublihtmlbefore'),
          ];

          $maqueta['html'] = $html;

          $r = Config::mongo('maqueta',['header.0' => $maqueta],"U");

          if(isset($r['modifiedCount']))
          {
              \Session::flash('success', 'El código HTML se actualizó correctamente y descripción se actualizaron correctamente.');

              $this->json();
          }

          return \Redirect::to('cms/modulo/'.$request->route()->id.'/'.$request->route()->seccion.'/html');
        }
        else
        {
            return view('cms.'.$maqueta['tipo'].'_html')->with('html',$maqueta['html']);
        }
    }
    else
    {
        return view('cms.'.$maqueta['tipo'])->with('config',$config);
    }

  }





  public function diseno($pestana)
  {
    $maqueta = Config::maqueta();

    $no_temas = 0;
    $partidos = [];
    $tipos_modulo = [];
    $fondos= [];

    return view('cms.diseno')->with('pestana',$pestana)
                             ->with('maqueta',$maqueta)
                             ->with('csss',Css::csss())
                             ->with('jss',Js::jss())
                             ->with('modulos',[])
                             ->with('no_temas',1)
                             ->with('partidos',$partidos)
                             ->with('tipos_modulo',$tipos_modulo)
                             ->with('fondos',$fondos)
                             ->with('config',Config::config());
  }





  public function titulo(ConfigRequest $request)
  {
        $array = ["titulo" => $request->input('titulo'),
                  "descripcion" => $request->input('descripcion'),];

        $r = Config::mongo('config',$array,"U");

        if(isset($r['modifiedCount']))
        {
            \Session::flash('success', 'El título y descripción se actualizaron correctamente.');

            $this->json();
        }

        return \Redirect::to('cms/diseno/head');
  }





  public function html(Request $request)
  {
    $array = ["bodyattributes" => $request->input('bodyattributes'),
              "bodyafter" => $request->input('bodyafter'),
              "columnasbefore" => $request->input('columnasbefore'),
              "columnasafter" => $request->input('columnasafter'),
              "izquierdabeforeg" => $request->input('izquierdabeforeg'),
              "izquierdaafterg" => $request->input('izquierdaafterg'),
              "derechabefores" => $request->input('derechabefores'),
              "derechaafters" => $request->input('derechaafters'),
              "izquierdabefores" => $request->input('izquierdabefores'),
              "izquierdaafters" => $request->input('izquierdaafters'),
              "derechabeforeg" => $request->input('derechabeforeg'),
              "derechaafterg" => $request->input('derechaafterg'),
              "superiorbefore" => $request->input('superiorbefore'),
              "superiorafter" => $request->input('superiorafter'),
              "izquierdabefore3" => $request->input('izquierdabefore3'),
              "izquierdaafter3" => $request->input('izquierdaafter3'),
              "centrobefore3" => $request->input('centrobefore3'),
              "centroafter3" => $request->input('centroafter3'),
              "derechabefore3" => $request->input('derechabefore3'),
              "derechaafter3" => $request->input('derechaafter3'),
              "inferiorbefore" => $request->input('inferiorbefore'),
              "inferiorafter" => $request->input('inferiorafter'),
            ];

    $r = Config::mongo('maqueta',['html' => $array],"U");

    if(isset($r['modifiedCount']))
    {
      \Session::flash('success', 'Los datos se actualizaron correctamente.');

      $this->json();
    }

    return \Redirect::to('cms/diseno/body');
  }





  public function meta(ConfigRequest $request)
  {

    $array = Config::maqueta()['metas'];

    if($request->method() == "POST")
    {
        array_push($array,$request->input('atributos'));
    }


    if($request->method() == "DELETE")
    {
        unset($array[$request->route()->id]);
    }

    $r = Config::mongo('maqueta',["metas" => $array,],'U');


    if(isset($r['modifiedCount']))
    {
        \Session::flash('success', 'La etiqueta META se editó correctamente.');

        $this->json();
    }

    return \Redirect::to('cms/diseno/head');
  }





  public function link(ConfigRequest $request)
  {
    $array = Config::maqueta()['links'];

    if($request->method() == "POST")
    {
        $favicon = $request->file('imagen');

        array_push($array,['atributos' => $request->input('atributos'), 'icon' => 'favicon.'.$favicon->extension()]);

        $favicon->move(public_path('imagenes'), 'favicon.'.$favicon->extension());
    }


    if($request->method() == "DELETE")
    {
        unset($array[$request->route()->id]);

        @unlink('imagenes/favicon.png');
    }


    $r = Config::mongo('maqueta',[ "links" => $array,],'U');

    if(isset($r['modifiedCount']))
    {
        \Session::flash('success', 'La etiqueta LINK se editó correctamente.');

        $this->json();
    }

    return \Redirect::to('cms/diseno/head');
  }





  public function css(Request $request)
  {

    if($request->method() == "GET")
    {
        $csss = Css::csss();

        if(!empty($csss[$request->route()->id]))
        {
            $css = $csss[$request->route()->id];

            $css['fOpen'] = \File::get(Upload::ruta_css().$css['archivo']);
        }
        else
        {
            $css = [];
        }

        return view('cms.css')->with('config',Config::config())->with('css',$css);
    }



    if($request->method() == "POST")
    {
        $r = Css::crear($request->input());

        if(isset($r['danger']))
        {
            $danger = 'Ya existe un archivo CSS con ese nombre.';
        }
        else
        {
            $success = 'El archivo CSS se creó correctamente.';
        }
    }



    if($request->method() == "PATCH")
    {
        Css::borrar($request->route()->id);

        $r = Css::crear($request->input());

        if(isset($r['danger']))
        {
            $danger = 'Ya existe un archivo con ese nombre.';
        }
        else
        {
            $success = 'El archivo CSS se actualizó correctamente.';
        }
    }



    if($request->method() == "DELETE")
    {
        $r = Css::borrar($request->route()->id);

        $success = 'El archivo CSS se borró correctamente.';
    }



    if(isset($r['modifiedCount']))
    {
        \Session::flash('success', $success);

        $this->json();
    }
    elseif(isset(($r['danger'])))
    {
        \Session::flash('danger', $danger);
    }

    return \Redirect::to('cms/diseno/head');
  }





  public function js(Request $request)
  {

    if($request->method() == "GET")
    {
        $jss = Js::jss();

        if(!empty($jss[$request->route()->id]))
        {
            $js = $jss[$request->route()->id];

            $js['fOpen'] = \File::get(Upload::ruta_js().$js['archivo']);
        }
        else
        {
            $js = [];
        }

        return view('cms.js')->with('config',Config::config())->with('js',$js);
    }



    if($request->method() == "POST")
    {
        $r = Js::crear($request->input());

        if(isset($r['danger']))
        {
            $danger = 'Ya existe un archivo JS con ese nombre.';
        }
        else
        {
            $success = 'El archivo JS se creó correctamente.';
        }
    }



    if($request->method() == "PATCH")
    {
        Js::borrar($request->route()->id);

        $r = Js::crear($request->input());

        $success = 'El archivo JS se actualizó correctamente.';
    }



    if($request->method() == "DELETE")
    {
        $r = Js::borrar($request->route()->id);

        $success = 'El archivo JS se borró correctamente.';
    }



    if(isset($r['modifiedCount']))
    {
        \Session::flash('success', $success);

        $this->json();
    }

    return \Redirect::to('cms/diseno/head');
  }

}
