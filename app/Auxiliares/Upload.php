<?php namespace App\Auxiliares;

class Upload {


  //////////////////////////////////////////////////////////////
  ////////////////IMAGEN
  //////////////////////////////////////////////////////////////
  public static function imagen($foto, $prefijo, $dimension = null){

    if($foto)
    {
      $ruta = self::ruta_img();

      $imagen = \Image::make($foto);

      $imagen->interlace(false);

      switch($dimension)
      {
        case "xs":
          $ancho = 250;
          break;
        case "s":
          $ancho = 400;
          break;
        case "m":
          $ancho = 600;
          break;
        case "l":
          $ancho = 800;
          break;
        case "xl":
          $ancho = 1100;
          break;
        default:
          $ancho = 1440;
          break;
      }

      if($imagen->width() > $ancho)
      {
        $imagen->resize($ancho, null, function ($constraint)
        {
          $constraint->aspectRatio();
        });
      }

      if($prefijo == "bg")
      {
        $quality = null;
        $extension = "png";
      }
      elseif($prefijo == "noticia")
      {
        $quality = 80;
        $extension = "jpg";
      }
      else
      {
        $quality = null;
        $extension = "jpg";
      }

      if($prefijo != "bg")
      {
        $imagen->save($ruta.$prefijo.'_'.date("Y")."_".date("n")."_".date("j")."_".microtime(true).'.'.$extension,$quality);
      }
      else
      {
        if(file_exists($ruta.$prefijo.'_'.$foto->getClientOriginalName()))
        {
          return false;
        }
        else
        {
          $imagen->save($ruta.$prefijo.'_'.$foto->getClientOriginalName(),$quality);
        }
      }

      return $imagen->basename;
    }
    else
    {
      return null;
    }
  }


}
