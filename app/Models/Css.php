<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Auxiliares\Auxiliar;
use App\Auxiliares\Upload;


class Css extends Model
{
    use HasFactory;


    public static function csss()
    {
        $csss = Config::maqueta()['css'];
        $columnasCss = array_column($csss, 'lista');
        array_multisort($columnasCss, SORT_ASC, $csss);

        return $csss;
    }




    public static function crear($input)
    {
        $csss = self::csss();

        $nombre = Auxiliar::caracteres(trim($input['nombre']));

        $archivo = $nombre.".css";

        if (in_array($nombre, array_column($csss,'nombre')))
        {
            $r['danger'] = true;

            return $r;
        }
        else
        {
            $r = Upload::css($archivo,$input['css']);

            array_push($csss,['atributos' => $input['atributos'],'nombre' => $nombre, 'archivo' => $archivo,'lista' => intval($input['lista'])]);

            return self::actualizar($csss);
        }

    }




    public static function actualizar($csss)
    {
        $document = [ "css" => $csss,];

        $q = [  "collection" => 'maqueta',
                "filter"     => ['_id' => [ "\$oid" => Config::maqueta()['_id'] ]],
                "update"     => ["\$set" => $document],
            ];

        return Config::mongo($q,'U');
    }




    public static function borrar($idCss)
    {
        $csss = self::csss();

        @unlink('contenido/css/'.$csss[$idCss]['archivo']);

        unset($csss[$idCss]);

        return self::actualizar($csss);
    }

}
