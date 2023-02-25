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
    $doc = ["collection" => 'noticias',
            "filter"     => ['_id' => [ "\$oid" => $request->route()->noticiaId ]]];


    if($request->method() == "DELETE")
    {
      $req = $this->mongo($doc,'D');

      \Session::flash('success', 'La noticia se borró correctamente.');

      return \Redirect::to('cms/prensa');
    }




    if($request->method() == "GET")
    {
      if(is_null($request->route()->noticiaId))
      {
        $q = ["collection" => 'noticias',
              "sort"       => ['fecha' => -1]];

        $noticias = $this->mongo($q,'F');

        return view('cms.prensa_index')->with('noticias',$noticias['documents']);
      }
      else
      {
        $noticia = ($request->route()->noticiaId == "crear") ? array('document' => null) : $this->mongo($doc,'O');

        return view('cms.prensa_crear')->with('tipo',$request->input('tipo'))->with('noticia', $noticia['document']);
      }

    }




    if($request->method() == "POST" or $request->method() == "PATCH")
    {
      $accion = ($request->method() == "POST") ? "I" : "U";

      $document = [
                   "titulo"    => $request->input('titulo'),
                   "fecha"     => [ "\$date" => [ "\$numberLong" => "1638551310749" ] ],
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

       $this->mongo($q,$accion);

      \Session::flash('success', 'La noticia se creó correctamente.');
    }//POST

    return \Redirect::to('cms/prensa');
  }




  public function prensaBorrarImg(Request $request)
  {
    $query = ["collection" => 'noticias',
              "filter"       => ['_id' => [ "\$oid" => $request->route()->noticiaId ]],
             ];

    $noticia = $this->mongo($query,'O');

    @unlink('noticias/'.$noticia['document']['imagenes'][$request->route()->imagenNo]);

    $noticia['document']['imagenes'][$request->route()->imagenNo] = null;

    $query = ["collection" => 'noticias',
              "filter"     => ['_id' => [ "\$oid" => $request->route()->noticiaId ]],
              "update"     => ["\$set" => ["imagenes" => $noticia['document']['imagenes']]],
             ];

    $noticias = $this->mongo($query,'U');

    \Session::flash('success', 'La noticia se actualizó correctamente.');

    return \Redirect::to('cms/prensa/'.$request->route()->noticiaId);
  }


}
