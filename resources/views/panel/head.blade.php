<!DOCTYPE html>
<html lang="es">
<head>
  <!-- META SECTION -->
  <title>Ayuntamiento Digital - Sistema Operativo para Municipios</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="icon" href="{{ asset('ayudig/img/logos/favicon.png') }}">
  <!-- END META SECTION -->

  <!-- CSS INCLUDE -->
  <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('app/css/theme-default.css') }}"/>
  <link rel="stylesheet" type="text/css" id="lightbox" href="{{ asset('app/css/lightbox/lightbox.css') }}"/>
  <link rel="stylesheet" type="text/css" id="fixer" href="{{ asset('app/css/fixer.css') }}"/>
  @yield('css')
  <!-- EOF CSS INCLUDE -->


  <!-- START SCRIPTS -->
    <!-- START PLUGINS -->
    <script src="{{ asset('app/js/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('app/js/plugins/jquery/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('app/js/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <!-- END PLUGINS -->

    <!-- THIS PAGE PLUGINS -->
    @yield('scripts')
    <script src="{{ asset('app/js/plugins/summernote/summernote.js') }}"></script>
    <script src="{{ asset('app/js/plugins/bootstrap/bootstrap-select.js') }}"></script>
    <script src="{{ asset('app/js/plugins/bootstrap/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('app/js/plugins/bootstrap/bootstrap-file-input.js') }}"></script>

    <script src="{{ asset('app/js/plugins/tagsinput/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ asset('app/js/plugins/validationengine/languages/jquery.validationEngine-es.js') }}"></script>
    <script src="{{ asset('app/js/plugins/validationengine/jquery.validationEngine.js') }}"></script>
    <script src="{{ asset('app/js/plugins/blueimp/jquery.blueimp-gallery.min.js') }}"></script>

    <script src="{{ asset('app/js/plugins/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('app/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
    <script src="{{ asset('app/js/plugins/highlight/jquery.highlight-4.js') }}"></script>
    <script src="{{ asset('app/js/plugins/autonumeric/autoNumeric.js') }}"></script>
    <!-- END PAGE PLUGINS -->


    <!-- END TEMPLATE -->
   <!-- END SCRIPTS -->

</head>
