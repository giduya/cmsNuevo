<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;

class LandingController extends Controller
{

  public function landing(Request $request)
  {
    $maqueta = json_decode(file_get_contents(storage_path() . "/app/public/maqueta.json"), true);

    $config = Config::config();

    return view('landing')->with('maqueta',$maqueta)->with('config',$config);
  }

}
