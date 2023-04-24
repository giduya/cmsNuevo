<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }




  public function index()
  {
    return view('apps');
  }




  public function cmsIndex()
  {
    return view('cms.inicio');
  }




  public function cmsIndex()
  {
    return view('cms.inicio');
  }

}
