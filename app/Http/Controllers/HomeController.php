<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }



  public function index()
  {
    return view('apps');
  }



  public function form(request $request)
  {


                if ($response->failed()) {
                   // return failure
                } else {
                   // return success
                }
echo "<pre>";
print_r($response);
echo "</pre>";
  }///////////

}
