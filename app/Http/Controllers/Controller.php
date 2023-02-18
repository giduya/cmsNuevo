<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function mongo($datos)
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
                                                    "collection" => "noticias",
                                                    "document"   => $datos,
                                                    ]);
    }

}
