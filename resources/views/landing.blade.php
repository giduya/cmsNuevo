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





@if(request()->route('seccion'))



@else

    @foreach($maqueta['header'] as $modulo)

        @include('landing.'.$modulo['tipo'])

    @endforeach

@endif




  {!! $maqueta['html']['columnasafter'] !!}
  @foreach($maqueta['js'] as $js)
    <link href="contenido/js/{{ $js['archivo'] }}" href="{!! $js['atributos'] !!}">
  @endforeach
</body>
</html>
