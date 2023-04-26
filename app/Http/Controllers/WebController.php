<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }




  public function landing()
  {
    $maqueta = json_decode(file_get_contents(storage_path() . "/app/public/maqueta.json"), true);

    return view('landing')->with('maqueta',$maqueta);
  }




  public function index()
  {
    return view('apps');
  }




  public function cmsIndex()
  {
    return view('cms.inicio');
  }

}
