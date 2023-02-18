
@include('panel.head')

<body class="x-dashboard-dark">
  <div class="page-container">
    <div class="page-content" @yield('wall')>
      <div class="page-content-wrap">

        <div class="x-hnavigation">
          <div class="x-hnavigation-logo">
            <a>Ayuntamiento Digital</a>
          </div><!-- END PAGE x-hnavigation-logo -->
          <ul>
            <li class="active">
              <a>El Sistema Operativo con Apps Municipales</a>
            </li>
          </ul>
          <div class="x-features">
            <div class="x-features-nav-open">
              <span class="fa fa-bars"></span>
            </div>
            <div class="pull-right">
              <div class="x-features-profile">
                @if (Auth::user()->avatar)
                  <img src="{{ asset($ruta->ruta_img().Auth::user()->avatar) }}" alt="{{ Auth::user()->nombre }} {{ Auth::user()->apellido_paterno }}">
                @else
                  <img src="{{ asset('app/img/avatar.png') }}" alt="{{ Auth::user()->nombre }} {{ Auth::user()->apellido_paterno }}">
                @endif
                <ul class="xn-drop-left animated zoomIn">
                  <li><a href="{{ url('apps') }}"><span class="far fa-desktop"></span> Apps</a></li>
                  <li><a href="{{ url('profile') }}"><span class="far fa-user"></span> Mi Perfil</a></li>
                  <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="far fa-sign-out-alt"></span> Salir</a></li>
                </ul>
              </div><!-- END PAGE x-features-profile -->
            </div><!-- END PAGE pull-right -->
          </div><!-- END PAGE x-features -->
        </div><!-- END PAGE x-hnavigation -->

        <div class="x-content">

          @yield('content')

        </div><!--xcontent-->

      </div><!-- END PAGE CONTENT WRAPPER -->
    </div><!--page-content-->
  </div><!--page-container-->

  @yield('messagebox')

@include('panel.logout')
