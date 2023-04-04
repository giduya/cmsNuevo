<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;


    public static function mongo($query,$accion)
    {
      switch($accion)
      {
        case 'I':
          $i = 'insertOne';
          break;
        case 'F':
          $i = 'find';
          break;
        case 'O':
          $i = 'findOne';
          break;
        case 'D':
          $i = 'deleteOne';
          break;
        case 'U':
          $i = 'updateOne';
          break;
      }

      $bd = ["dataSource" => "Cluster0",
             "database"   => "bd_",];

      $bd = array_merge($bd,$query);

      $api = 'Fwn0XMexvkq7vOpND6pPxFdSuIkr02nSiW181nmeYjh9EddV6YzrCCVU0tqQn05m';
      $url = 'https://data.mongodb-api.com/app/data-iesxm/endpoint/data/v1/action/'.$i;

      $response = \Http::withHeaders([
                                      'Content-Type' => 'application/json',
                                      'Access-Control-Request-Headers' => '*',
                                      'api-key' => $api,
                                    ])->post($url,$bd)->json();

      return $response;
    }



    public static function config()
    {
      $q = ["collection" => 'config',];

      $config = self::mongo($q,'O')['document'];

      return $config;
    }



    public static function maqueta()
    {
      $q = ["collection" => 'maqueta',
            "filter"     => ['tema' => self::config()['tema']]];

      $maqueta = self::mongo($q,'O')['document'];

      return $maqueta;
    }

}
