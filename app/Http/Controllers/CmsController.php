<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Auxiliares\Upload;
use App\Models\Noticia;


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
/*
    [
      "createdAt" => [ "\$date" => ["$numberLong" => "1661881925033" ]]
    ]
*/
    if($request->method() == "GET")
    {
      $query = ["collection" => 'noticias',
                "sort"       => ['fecha' => -1]];

      $noticias = $this->mongo($query,'F');

      return view('cms.prensa_index')->with('noticias',$noticias['documents']);
    }




    if($request->method() == "POST")
    {
      $datos = [
                "titulo"    => $request->input('titulo'),
                "fecha"     => [ "\$date" => [ "\$numberLong" => strtotime('2012-07-25 14:35:08') ] ],
                "extracto"  => $request->input('extracto'),
                "contenido" => $request->input('contenido'),
                "tipo"      => $request->input('tipo'),
                "links"     => array('1' => $request->input('link1'),
                                     '2' => $request->input('link2'),
                                     '3' => $request->input('link3'),
                                    ),
                "imagenes"  => array('1' => Upload::imagen($request->file('img1'), 'noticia', 'l'),
                                     '2' => Upload::imagen($request->file('img2'), 'noticia', '2'),
                                     '3' => Upload::imagen($request->file('img3'), 'noticia', '3'),
                                     '4' => Upload::imagen($request->file('img4'), 'noticia', '4'),
                                     '5' => Upload::imagen($request->file('img5'), 'noticia', '5'),
                                     '6' => Upload::imagen($request->file('img6'), 'noticia', '6'),
                                     '7' => Upload::imagen($request->file('img7'), 'noticia', '7'),
                                    ),
                "descargas" => array('1' => $request->input('file1'),
                                     '2' => $request->input('file2'),
                                     '3' => $request->input('file3'),
                                    ),
              ];

      $this->mongo($datos,'noticias','I');
    }//POST


  }



  public function prensaCrear(Request $request)
  {
    $tipo = $request->input('tipo');

    return view('cms.prensa_crear')->with('tipo', $tipo);
  }


}
