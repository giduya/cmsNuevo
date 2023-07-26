{!! $modulo['html']['modulohtmlbefore'] !!}

<ul {!! $modulo['html']['ulattributes'] !!}>
    @foreach($config['menu'] as $menu)

        @isset($menu['submenus'])

            <li {!! $modulo['html']['liattributes_drop'] !!}>
                {!! $modulo['html']['lihtmlafter_drop'] !!}
                    <a href="{{ $menu['url'] }}" {!! $modulo['html']['aattributes_drop'] !!}>
                        {!! $modulo['html']['ahtmlafter_drop'] !!}
                        {{ $menu['menu'] }}
                        {!! $modulo['html']['ahtmlbefore_drop'] !!}
                    </a>

                    {!! $modulo['html']['subulhtmlbefore'] !!}

                    <ul {!! $modulo['html']['subulattributes'] !!}>
                        @foreach ($menu['submenus'] as $submenu)
                            <li {!! $modulo['html']['subliattributes'] !!}>
                                {!! $modulo['html']['sublihtmlafter'] !!}
                                <a href="{{ $submenu['url'] }}" {!! $modulo['html']['subaattributes'] !!}>
                                    {!! $modulo['html']['subahtmlafter'] !!}
                                        {{ $submenu['menu'] }}
                                    {!! $modulo['html']['subahtmlbefore'] !!}
                                </a>
                                {!! $modulo['html']['sublihtmlbefore'] !!}
                            </li>
                        @endforeach
                    </ul>

                {!! $modulo['html']['lihtmlbefore_drop'] !!}
            </li>

        @else

            <li {!! $modulo['html']['liattributes_link'] !!}>
                {!! $modulo['html']['lihtmlafter_link'] !!}
                    <a href="{{ $menu['url'] }}" {!! $modulo['html']['aattributes_link'] !!}>
                        {!! $modulo['html']['ahtmlafter_link'] !!}
                        {{ $menu['menu'] }}
                        {!! $modulo['html']['ahtmlbefore_link'] !!}
                    </a>
                {!! $modulo['html']['lihtmlbefore_link'] !!}
            </li>

        @endif

    @endforeach
</ul>

{!! $modulo['html']['modulohtmlafter'] !!}
