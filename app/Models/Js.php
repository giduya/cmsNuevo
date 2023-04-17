<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Auxiliares\Auxiliar;
use App\Auxiliares\Upload;


class Js extends Model
{
    use HasFactory;


    public static function jss()
    {
        $jss = Config::maqueta()['js'];
        $columnasJs = array_column($jss, 'lista');
        array_multisort($columnasJs, SORT_ASC, $jss);

        return $jss;
    }




    public static function crear($input)
    {
        $jss = self::jss();

        $nombre = Auxiliar::caracteres(trim($input['nombre']));

        $archivo = $nombre.".js";

        if (in_array($nombre, array_column($jss,'nombre')))
        {
            $r['danger'] = true;

            return $r;
        }
        else
        {
            $r = Upload::js($archivo,$input['js']);

            array_push($jss,['atributos' => $input['atributos'],'nombre' => $nombre, 'archivo' => $archivo,'lista' => intval($input['lista'])]);

            return self::actualizar($jss);
        }
    }




    public static function actualizar($jss)
    {
        return Config::mongo('maqueta',["js" => $jss,],'U');
    }




    public static function borrar($idJs)
    {
        $jss = self::jss();

        @unlink('contenido/js/'.$jss[$idJs]['archivo']);

        unset($jss[$idJs]);

        return self::actualizar($jss);
    }

}
