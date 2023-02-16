<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }



  public function index()
  {
    return view('home');
  }



  public function form(request $request)
  {
    $api = 'Fwn0XMexvkq7vOpND6pPxFdSuIkr02nSiW181nmeYjh9EddV6YzrCCVU0tqQn05m';
    $url = 'https://data.mongodb-api.com/app/data-iesxm/endpoint/data/v1/action/insertOne';

    $response = Http::withHeaders([
                                    'Content-Type' => 'application/json',
                                    'Access-Control-Request-Headers' => '*',
                                    'api-key' => $api,
                                  ])->post($url, [
                  "dataSource" => "Cluster0",
                  "database"   => "bd_",
                  "collection" => "maqueta",
                  "document"   => [ "text" => "Hello from the Data API!" ],
                ]);

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
