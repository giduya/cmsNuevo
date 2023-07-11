<ul>
    @foreach($config['menu'] as $menu)
        <li>{{ $menu['menu'] }}</li>
    @endforeach
</ul>
