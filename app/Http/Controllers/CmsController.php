<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Auxiliares\Upload;


class CmsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }



  public function index()
  {
    return view('cms.inicio');
  }



  public function prensa(Request $request)
  {

    $noticias = [];



    if($request->method() == "POST")
    {
      $datos = [
                "titulo"    => $request->input('titulo'),
                "fecha"     => $request->input('fecha'),
                "extracto"  => $request->input('extracto'),
                "contenido" => $request->input('contenido'),
                "imagenes"  => array('1' => Upload::imagen($request->file('img1'), 'noticia', 'l'),
                                     '2' => Upload::imagen($request->file('img2'), 'noticia', '2'),
                                     '3' => Upload::imagen($request->file('img3'), 'noticia', '3'),
                                     '4' => Upload::imagen($request->file('img4'), 'noticia', '4'),
                                     '5' => Upload::imagen($request->file('img5'), 'noticia', '5'),
                                     '6' => Upload::imagen($request->file('img6'), 'noticia', '6'),
                                     '7' => Upload::imagen($request->file('img7'), 'noticia', '7'),
                                    ),
              ];

      $this->mongo($datos);
    }//POST

    return view('cms.prensa_index')->with('noticias',$noticias);
  }



  public function prensaCrear(Request $request)
  {
    $tipo = $request->input('tipo');

    return view('cms.prensa_crear')->with('tipo', $tipo);
  }


}
