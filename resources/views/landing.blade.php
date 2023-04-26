<!DOCTYPE html>
<html lang="en">
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
  <h1>LLegamos</h2>

  {!! $maqueta['html']['columnasafter'] !!}
  @foreach($maqueta['js'] as $js)
    <link href="contenido/js/{{ $js['archivo'] }}" href="{!! $js['atributos'] !!}">
  @endforeach
</body>
</html>
