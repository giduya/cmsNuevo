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
    $document = [
                 "tema" => 1,
                 "titulo" => "Municipio de ???",
                 "descripcion" => "Sitio web oficial del Municipio ??? con toda la información general, turística, servicios y más que necesitas de tu gobierno municipal.",
                ];

    $q = ["collection" => 'config',
          "document"   => $document,
         ];

    $res = $this->mongo($q,"I");

    $maqueta = [
        "tema" => 1,
        "metas" => [],
        "links" => [],
        "css" => [],
        "js" => [],
       ];

    $q = ["collection" => 'maqueta',
          "document"   => $maqueta,
        ];

    $res = $this->mongo($q,"I");
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
    $body = [];

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
                             ->with('body',$body)
                             ->with('config',Config::config());
  }




  public function head(ConfigRequest $request)
  {
    $document = [
                 "titulo" => $request->input('titulo'),
                 "descripcion" => $request->input('descripcion'),
                ];

    $q = [  "collection" => 'config',
            "filter"     => ['_id' => [ "\$oid" => $this->config()['_id'] ]],
            "update"     => ["\$set" => $document],
         ];

    $r = $this->mongo($q,"U");

    if(isset($r['modifiedCount']))
    {
        \Session::flash('success', 'El título y descripción se actualizó correctamente.');
    }

    return \Redirect::to('cms/diseno/head');
  }



  public function meta(ConfigRequest $request)
  {

    $array = $this->maqueta()['metas'];

    if($request->method() == "POST")
    {
        array_push($array,$request->input('atributos'));
    }


    if($request->method() == "DELETE")
    {
        unset($array[$request->route()->id]);
    }

    $document = [ "metas" => $array,];

    $q = [  "collection" => 'maqueta',
            "filter"     => ['_id' => [ "\$oid" => $this->maqueta()['_id'] ]],
            "update"     => ["\$set" => $document],
         ];

    $r = $this->mongo($q,'U');

    if(isset($r['modifiedCount']))
    {
        \Session::flash('success', 'La etiqueta META se editó correctamente.');
    }

    return \Redirect::to('cms/diseno/head');
  }





  public function link(ConfigRequest $request)
  {
    $array = $this->maqueta()['links'];

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

    $document = [ "links" => $array,];

    $q = [  "collection" => 'maqueta',
            "filter"     => ['_id' => [ "\$oid" => $this->maqueta()['_id'] ]],
            "update"     => ["\$set" => $document],
         ];

    $r = $this->mongo($q,'U');

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
