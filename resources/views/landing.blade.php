<!DOCTYPE html>
<html lang="es">
<head>
  <title>{{ $config['titulo'] }}</title>
  @foreach($maqueta['metas'] as $meta)
    <meta {!! $meta !!} >
  @endforeach

  @foreach($maqueta['css'] as $css)
    <link href="contenido/css/{{ $css['archivo'] }}" href="{!! $css['atributos'] !!}">
  @endforeach
</head>
<body {!! $maqueta['html']['bodyattributes'] !!}>
  {!! $maqueta['html']['bodyafter'] !!}

  <ul>
    @foreach($config['menu'] as $menu)
      <li>{{ $menu['menu'] }}</li>
    @endforeach
  </ul>

  {!! $maqueta['html']['columnasafter'] !!}
  @foreach($maqueta['js'] as $js)
    <link href="contenido/js/{{ $js['archivo'] }}" href="{!! $js['atributos'] !!}">
  @endforeach
</body>
</html>
