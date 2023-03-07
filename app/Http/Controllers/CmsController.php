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



  public function prensa(PrensaRequest $request)
  {
    $doc = ["collection" => 'noticias',
            "filter"     => ['_id' => [ "\$oid" => $request->route()->noticiaId ]]];


    if($request->method() == "DELETE")
    {
      $noticia = $this->mongo($doc,"O");

      $req = $this->mongo($doc,'D');

      @unlink('noticias/'.$noticia['document']['imagenes']['1']);
      @unlink('noticias/'.$noticia['document']['imagenes']['2']);
      @unlink('noticias/'.$noticia['document']['imagenes']['3']);
      @unlink('noticias/'.$noticia['document']['imagenes']['4']);
      @unlink('noticias/'.$noticia['document']['imagenes']['5']);
      @unlink('noticias/'.$noticia['document']['imagenes']['6']);
      @unlink('noticias/'.$noticia['document']['imagenes']['7']);

      @unlink('noticias/'.$noticia['document']['audios'][1]['mp3']);
      @unlink('noticias/'.$noticia['document']['audios'][2]['mp3']);
      @unlink('noticias/'.$noticia['document']['audios'][3]['mp3']);

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
        $doc = ["collection" => 'noticias',
                "filter"     => ['_id' => [ "\$oid" => $request->route()->noticiaId ]]];

        $doc = $this->mongo($doc,"O");

        $fecha = strval(strtotime($request->input('fecha').' 00:00:00')*1000);

        $document = [
                        "titulo"    => $request->input('titulo'),
                        "fecha"     => [ "\$date" => [ "\$numberLong" => $fecha]],
                        "extracto"  => $request->input('extracto'),
                        "contenido" => $request->input('contenido'),
                        "tipo"      => (is_null($request->input('tipo'))) ? "Texto" : $request->input('tipo'),
                        "links"     => array(   '1' => $request->input('link1'),
                                                '2' => $request->input('link2'),
                                                '3' => $request->input('link3'),
                                            ),
                        "imagenes"  => array(   '1' => (is_null($request->file('img1'))) ? (isset($doc['document']['imagenes']['1'])) ? $doc['document']['imagenes']['1'] : null : Upload::imagen($request->file('img1'), 'noticia', 'l'),
                                                '2' => (is_null($request->file('img2'))) ? (isset($doc['document']['imagenes']['2'])) ? $doc['document']['imagenes']['2'] : null : Upload::imagen($request->file('img2'), 'noticia', 'l'),
                                                '3' => (is_null($request->file('img3'))) ? (isset($doc['document']['imagenes']['3'])) ? $doc['document']['imagenes']['3'] : null : Upload::imagen($request->file('img3'), 'noticia', 'l'),
                                                '4' => (is_null($request->file('img4'))) ? (isset($doc['document']['imagenes']['4'])) ? $doc['document']['imagenes']['4'] : null : Upload::imagen($request->file('img4'), 'noticia', 'l'),
                                                '5' => (is_null($request->file('img5'))) ? (isset($doc['document']['imagenes']['5'])) ? $doc['document']['imagenes']['5'] : null : Upload::imagen($request->file('img5'), 'noticia', 'l'),
                                                '6' => (is_null($request->file('img6'))) ? (isset($doc['document']['imagenes']['6'])) ? $doc['document']['imagenes']['6'] : null : Upload::imagen($request->file('img6'), 'noticia', 'l'),
                                                '7' => (is_null($request->file('img7'))) ? (isset($doc['document']['imagenes']['7'])) ? $doc['document']['imagenes']['7'] : null : Upload::imagen($request->file('img7'), 'noticia', 'l'),
                                            ),
                        "audios"    => array(   '1' => array('nombre' => $request->input('naudio1'), 'mp3' => (is_null($request->file('aaudio1'))) ? (isset($doc['document']['audios']['1'])) ? $doc['document']['audios']['1']['mp3'] : null : Upload::mp3($request->file('aaudio1'))),
                                                '2' => array('nombre' => $request->input('naudio2'), 'mp3' => (is_null($request->file('aaudio2'))) ? (isset($doc['document']['audios']['2'])) ? $doc['document']['audios']['2']['mp3'] : null : Upload::mp3($request->file('aaudio2'))),
                                                '3' => array('nombre' => $request->input('naudio3'), 'mp3' => (is_null($request->file('aaudio3'))) ? (isset($doc['document']['audios']['3'])) ? $doc['document']['audios']['3']['mp3'] : null : Upload::mp3($request->file('aaudio3'))),
                                            ),
                        "videos"     => array(  '1' => Upload::youtube($request->input('video1')),
                                                '2' => Upload::youtube($request->input('video2')),
                                                '3' => Upload::youtube($request->input('video3')),
                                            ),
                        "descargas" => array(   '1' => $request->input('file1'),
                                                '2' => $request->input('file2'),
                                                '3' => $request->input('file3'),
                                            ),
                    ];

        if($request->method() == "POST")
        {
            $accion = "I";

            $q = ["collection" => 'noticias',
                  "document"   => $document,
                 ];
        }
        else
        {
            (is_null($request->file('img1'))) ? : @unlink('noticias/'.$doc['document']['imagenes']['1']);
            (is_null($request->file('img2'))) ? : @unlink('noticias/'.$doc['document']['imagenes']['2']);
            (is_null($request->file('img3'))) ? : @unlink('noticias/'.$doc['document']['imagenes']['3']);
            (is_null($request->file('img4'))) ? : @unlink('noticias/'.$doc['document']['imagenes']['4']);
            (is_null($request->file('img5'))) ? : @unlink('noticias/'.$doc['document']['imagenes']['5']);
            (is_null($request->file('img6'))) ? : @unlink('noticias/'.$doc['document']['imagenes']['6']);
            (is_null($request->file('img7'))) ? : @unlink('noticias/'.$doc['document']['imagenes']['7']);

            $accion = "U";

            $q = [  "collection" => 'noticias',
                    "filter"     => ['_id' => [ "\$oid" => $request->route()->noticiaId ]],
                    "update"     => ["\$set" => $document],
                ];
        }

        $this->mongo($q,$accion);

        \Session::flash('success', 'La noticia se creó correctamente.');
    }

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




  public function prensaBorrarMp3(Request $request)
  {
    $query = ["collection" => 'noticias',
              "filter"       => ['_id' => [ "\$oid" => $request->route()->noticiaId ]],
             ];

    $noticia = $this->mongo($query,'O');

    @unlink('noticias/'.$noticia['document']['audios'][$request->route()->mp3No]['mp3']);

    $noticia['document']['audios'][$request->route()->imagenNo] = null;

    $query = ["collection" => 'noticias',
              "filter"     => ['_id' => [ "\$oid" => $request->route()->noticiaId ]],
              "update"     => ["\$set" => ["audios.".$request->route()->mp3No => ["nombre" => null, "mp3" => null] ]],
             ];

    $noticias = $this->mongo($query,'U');

    \Session::flash('success', 'La noticia se actualizó correctamente.');

    return \Redirect::to('cms/prensa/'.$request->route()->noticiaId.'?tipo=Audio');
  }

}
