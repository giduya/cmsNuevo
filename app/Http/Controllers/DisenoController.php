<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Auxiliares\Upload;
use App\Models\Noticia;

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
       ];

    $q = ["collection" => 'maqueta',
          "document"   => $maqueta,
        ];

    $res = $this->mongo($q,"I");
  }




  public function config()
  {
    $q = ["collection" => 'config'];

    $config = $this->mongo($q,'O')['document'];

    return $config;
  }




  public function maqueta()
  {
    $q = ["collection" => 'maqueta',
          "filter"     => ['tema' => $this->config()['tema']]];

    $maqueta = $this->mongo($q,'O')['document'];

    return $maqueta;
  }




  public function diseno($pestana)
  {
    $csss = [];
    $jss = [];
    $columnas_create = [];
    $duplicar_en_columnas = [];
    $no_temas = 0;
    $partidos = [];
    $tipos_modulo = [];
    $fondos= [];
    $body = [];

    return view('cms.diseno')->with('pestana',$pestana)
                             ->with('csss',$csss)
                             ->with('jss',$jss)
                             ->with('modulos',[])
                             ->with('columnas_create',$columnas_create)
                             ->with('duplicar_en_columnas',$duplicar_en_columnas)
                             ->with('no_temas',1)
                             ->with('partidos',$partidos)
                             ->with('tipos_modulo',$tipos_modulo)
                             ->with('fondos',$fondos)
                             ->with('body',$body)
                             ->with('maqueta',$this->maqueta())
                             ->with('config',$this->config());
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
    $config = $this->config();

    $array = $this->maqueta()['metas'];

    $document = [
                    "metas" => array_push($array,$request->input('atributos')),
                ];
                dd($this->maqueta()['_id']);
    $q = [  "collection" => 'maqueta',
            "filter"     => ['_id' => [ "\$oid" => $this->maqueta()['_id'] ]],
            "update"     => ["\$set" => $document],
        ];

    $r = $this->mongo($q,'U');
 dd($r); exit;
  }


}
