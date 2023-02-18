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
    { dd($request->input('img1'));
      $datos = [
                "titulo"   => $request->input('titulo'),
                "img1"     => Upload::imagen($request->input('img1'), 'noticia', 'l'),
                "extracto" => $request->input('extracto'),
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
