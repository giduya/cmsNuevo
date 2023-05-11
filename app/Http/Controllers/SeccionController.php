<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Auxiliares\Upload;
use App\Models\Config;
use App\Models\Css;
use App\Models\Js;

use App\Http\Requests\ConfigRequest;
use App\Http\Requests\NoticiaRequest;


class SeccionController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }





  public function secciones(Request $request)
  {
    return view('cms.secciones');
  }




}
