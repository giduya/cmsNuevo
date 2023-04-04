<?php namespace App\Auxiliares;


class Auxiliar {

  public static function dia($fecha)
  {
    return substr($fecha,8);
  }




  public static function mes($fecha)
  {
    $mes = substr($fecha,5,2);

    switch($mes)
    {
      case "01":
        return "Ene";
      break;
      case "02":
        return "Feb";
      break;
      case "03":
        return "Mar";
      break;
      case "04":
        return "Abr";
      break;
      case "05":
        return "May";
      break;
      case "06":
        return "Jun";
      break;
      case "07":
        return "Jul";
      break;
      case "08":
        return "Ago";
      break;
      case "09":
        return "Sep";
      break;
      case "10":
        return "Oct";
      break;
      case "11":
        return "Nov";
      break;
      case "12":
        return "Dic";
      break;
    }
  }




  public static function year($fecha)
  {
    return substr($fecha,0,4);
  }




  public static function clean($string)
  {
    return htmlspecialchars(strip_tags(trim($string),"\r\n<p><br>"));
  }




  public static function caracteres($string)
  {
    $string = strip_tags(trim($string));

    $string = str_replace(
                          array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
                          array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
                  $string);

    $string = str_replace(
                          array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
                          array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
                  $string);

    $string = str_replace(
                          array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
                          array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
                  $string);

    $string = str_replace(
                          array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
                          array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
                  $string);

    $string = str_replace(
                          array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
                          array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
                  $string);

    $string = str_replace(
                          array('ñ', 'Ñ', 'ç', 'Ç'),
                          array('n', 'N', 'c', 'C',),
                  $string);

    $string = str_replace(
                          array("\\", "¨", "º", "-", "~",
                                "#", "@", "|", "!", "\"",
                                "·", "$", "%", "&", "/",
                                "(", ")", "?", "'", "¡",
                                "¿", "[", "^", "<code>", "]",
                                "+", "}", "{", "¨", "´",
                                ">", "< ", ";", ",", ":",
                                ".", " ","-"),
                                '_',
                    $string
                          );

      return $string;
    }




    public static function lenght($string)
    {
      $string = trim($string);

      $string = substr($string, 0, 150);

      return $string;
    }
}
