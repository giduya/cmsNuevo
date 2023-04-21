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
    $config = [
                "tema" => 1,
                "titulo" => "Municipio de ???",
                "descripcion" => "Sitio web oficial del Municipio ??? con toda la información general, turística, servicios y más que necesitas de tu gobierno municipal.",
            ];

    $html = [
                 "bodyattributes" => "bodyattributes",
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

    $maqueta = [
        "tema" => 1,
        "metas" => [],
        "links" => [],
        "css" => [],
        "js" => [],
        "html" => $html,
       ];

    $res = Config::mongo('config',$config,"I");

    $res = Config::mongo('maqueta',$maqueta,"I");
  }

















  public function diseno($pestana)
  {
    $maqueta = Config::maqueta();

    $columnas_create = [];
    $duplicar_en_columnas = [];
    $no_temas = 0;
    $partidos = [];
    $tipos_modulo = [];
    $fondos= [];

    return view('cms.diseno')->with('pestana',$pestana)
                             ->with('maqueta',$maqueta)
                             ->with('csss',Css::csss())
                             ->with('jss',Js::jss())
                             ->with('modulos',[])
                             ->with('columnas_create',$columnas_create)
                             ->with('duplicar_en_columnas',$duplicar_en_columnas)
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
    }

    return \Redirect::to('cms/diseno/head');
  }

}
