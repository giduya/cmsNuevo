<!DOCTYPE html>
<html lang="en" class="body-full-height">
  <head>
    <title>Ayuntamiento Digital Apps</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon" />

    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('app/css/theme-default.css') }}"/>
    <link rel="stylesheet" type="text/css" id="fixer" href="{{ asset('app/css/fixer.css') }}"/>
  </head>
  <body>

    <div class="login-container">
      <div class="login-box animated fadeInDown">
        <div class="login-logo"></div>

        @include('panel.alert')

        <div class="login-body">
          <div class="login-title"><strong>Bienvenido</strong> a tu suite contable:</div>
          <form action="{{ url('login') }}" class="form-horizontal" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <div class="col-md-12">
                <input type="email" class="form-control" autocomplete="off" tabindex="1" placeholder="E-mail:" autofocus="autofocus" name="email">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <input type="password" class="form-control" placeholder="Contraseña:" tabindex="2" name="password" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6">
              </div>
              <div class="col-md-6">
                <button tabindex="3" class="btn btn-info btn-block">Entrar</button>
              </div>
              <div class="col-md-6">
              </div>
            </div>
          </form>
        </div>
        <div class="login-footer">
          <div class="pull-left">
            <small>&copy; 2019 Ayuntamiento Digital Apps</small>
          </div>
          <div class="pull-right">
            <a href="http://www.ayuntamiento.digital">Inicio</a>
            |
            <a href="{{ url('/#contacto') }}">Contácto</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
