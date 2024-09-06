@extends('pages.base')

@section('metatags')
    <meta name="description" content="{{$empresa->descricao}}">
    <meta name="keywords" content="{{$empresa->palavraschave}}">
    <meta property="og:title" content="{{$empresa->nomefantasia}}">
    <meta property="og:description" content="{{$empresa->descricao}}">
@endsection

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('theme/css/erro404.css') }}">
@endsection

@section('body')
  @include('pages.partials._menu')

  <section class="notfound">
    <img src="{{ asset('theme/images/404.jpg') }}" alt="erro404">
  </section>


  @include('pages.partials._footer')
@endsection

@section('script')
<script src="{{ asset('theme/js/jquery.js') }}" charset="utf-8"></script>
<script src="{{ asset('theme/js/main.js') }}" charset="utf-8"></script>
@endsection
