@extends('panel.app')




@section('menu')
  <li class="">
    <a href="{{ URL::to('cms') }}">
      <span class="far fa-desktop"></span> &nbsp;
      <span class="xn-text"> Panel de Inicio</span>
    </a>
  </li>

  <li class="xn-title">
    <span class="fa fa-caret-right"></span>
    EDITAR SECCIONES DE LA PÁGINA:
  </li>
@endsection
