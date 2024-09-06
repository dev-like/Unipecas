@extends('pages.base')

@section('metatags')
    <meta name="description" content="{{$empresa->descricao}}">
    <meta name="keywords" content="{{$empresa->palavraschave}}">
    <meta property="og:title" content="{{$empresa->nomefantasia}}">
    <meta property="og:description" content="{{$empresa->descricao}}">
@endsection

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('theme/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/noticia.css') }}">
@endsection

@section('body')
  @include('pages.partials._menu')

  <section class="noticia">
    <img src="{{ asset('uploads/noticia/'.$noticia->imagem) }}" alt="Imagem Noticia">
    <h2>{{$noticia->titulo}}</h2>
    <p class="descricao">{{$noticia->descricao}}</p>


    <div class="conteudo">
      {!!$noticia->conteudo!!}
    </div>


  </section>


  @include('pages.partials._footer')
@endsection

@section('script')
<script src="{{ asset('theme/js/jquery.js') }}" charset="utf-8"></script>
<script src="{{ asset('theme/js/main.js') }}" charset="utf-8"></script>
@endsection
