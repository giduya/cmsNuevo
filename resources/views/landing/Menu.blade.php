{!! $modulo['html']['modulohtmlbefore'] !!}

<ul {!! $modulo['html']['ulattributes'] !!}>
    @foreach($config['menu'] as $menu)
        <li {!! $modulo['html']['liattributes_link'] !!}>
            {!! $modulo['html']['lihtmlafter_link'] !!}
                <a {!! $modulo['html']['aattributes_link'] !!}>{{ $menu['menu'] }}</a>
            {!! $modulo['html']['lihtmlbefore_link'] !!}
        </li>
    @endforeach
</ul>

{!! $modulo['html']['modulohtmlafter'] !!}
