<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;


    public static function mongo($sq,$doc,$accion)
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


      switch($sq)
      {
        case 'config':
            if($accion == "U")
            {
                $q = [  "collection" => 'config',
                        "filter"     => ['_id' => [ "\$oid" => Config::config()['_id'] ]],
                        "update"     => ["\$set" => $doc],
                     ];
            }
            elseif($accion == "O")
            {
                $q = ["collection" => 'config',];
            }
            elseif($accion == "I")
            {
                $q = ["collection" => 'config',
                      "document"   => $doc,];
            }
        break;
        case 'maqueta':
            if($accion == "U")
            {
                $q = [  "collection" => 'maqueta',
                        "filter"     => ['_id' => [ "\$oid" => self::maqueta()['_id'] ]],
                        "update"     => ["\$set" => $doc],
                    ];
            }
            elseif($accion == "O")
            {
                $q = [  "collection" => 'maqueta',
                        "filter"     => ['tema' => self::config()['tema']]
                    ];
            }
            elseif($accion == "I")
            {
                $q = ["collection" => 'maqueta',
                      "document"   => $doc,];
            }
          break;
      }



      $bd = ["dataSource" => "Cluster0",
             "database"   => "bd_",];

      $bd = array_merge($bd,$q);

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
      $config = self::mongo('config','doc','O')['document'];

      return $config;
    }



    public static function maqueta()
    {
      $maqueta = self::mongo('maqueta','doc','O')['document'];

      return $maqueta;
    }



    public static function consulta($q,$doc)
    {
        switch($q)
        {
          case 'head':
            $q = [  "collection" => 'config',
                    "filter"     => ['_id' => [ "\$oid" => Config::config()['_id'] ]],
                    "update"     => ["\$set" => $doc],
                 ];
            break;
          case 'maqueta':
            $i = 'find';
            break;
        }
    }
}
