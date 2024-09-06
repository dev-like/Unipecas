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
    <link rel="stylesheet" href="{{ asset('theme/css/lib/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/lib/slick-theme.css') }}">
    <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('body')

    @include('pages.partials._menu')

    @include('pages.partials._loader')


    <!-- Modal -->
    <div id="ex1" class="modal">
      <h1>Pré-cadastro</h1>
      <hr>
        <div class="col-12">
          <form class="" action="/postMail" method="post">
            {{ csrf_field() }}

            <div class="row">
              <div class="form-group col-12 campos">
                <label for="nome">Digite seu nome: </label>
                <input type="text" class="form-control" name="nome" required>
              </div>
              <div class="form-group col-sm-6 col-12 campos">
                <label for="tels">Telefone: </label>
                <input type="text" name="telefone" class="form-control" id="telefone" placeholder="(xx) xxxx-xxxx">
              </div>
              <div class="form-group col-sm-6 col-12 campos">
                <label for="tels">Whatsapp: </label>
                <input type="text" name="Whatsapp" class="form-control" required id="whatsapp" placeholder="(xx) xxxxx-xxxx">
              </div>
              <div class="form-group col-12 campos">
                <label for="email">Nome da Fazenda: </label>
                <input type="text" class="form-control" name="nfazenda" required>
              </div>
              <div class="form-group col-12 campos">
                <label for="email">Endereço da Fazenda: </label>
                <input type="text" class="form-control" name="efazenda" required>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-12 botao">
                <button class="formbutton"> Realizar cadastro </button>
              </div>
            </div>

          </form>
        </div>
    </div>

    <!-- Seção do Banner -->
    <header>
      @if(count($banners) > 0)
        <div class="carousel-banner" id="banner">
          @foreach($banners as $banner)
            <div class="item-carousel" style="background-image:url('uploads/banners/{{$banner->caminho}}');{{$loop->first?'opacity:1':''}}">
              <div class="container">
                <div class="box {{$banner->lado=='E'?'box-esquerda':'box-direita'}}">
                  <strong><h2>{{$banner->texto}}</h2></strong>
                  @if($banner->link!='')
                    <a href="{{$banner->link}}" class="button-carousel">{{$banner->textobotao}}</a>
                  @endif
                </div>
              </div>
            </div>
          @endforeach
          <span class="prev"><img src="theme/images/prev2.png" alt="<"></span>
          <span class="next"><img src="theme/images/next2.png" alt=">"></span>
        </div>
      @endif
    </header>

    <!-- Seção da Empresa -->
    <section id="tradicao">
        <div class="container">
            <div class="row mvv">
              @if(isset($empresa->missao))
                <div class="col-lg-4">
                  <div class="box">
                    <h3 class="bg">MISSÃO</h3>
                    <h3 class="up">MISSÃO</h3>
                    <p>{{$empresa->missao}}</p>
                  </div>
                </div>
              @endif
              @if(isset($empresa->visao))
                <div class="col-lg-4">
                  <div class="box">
                    <h3 class="bg">VISÃO</h3>
                    <h3 class="up">VISÃO</h3>
                    <p>{{$empresa->visao}}</p>
                  </div>
                </div>
              @endif
              @if(isset($empresa->valores))
                <div class="col-lg-4">
                  <div class="box">
                    <h3 class="bg">VALORES</h3>
                    <h3 class="up">VALORES</h3>
                    <p>{{$empresa->valores}}</p>
                  </div>
                </div>
              @endif
            </div>
          </div>

          @if(isset($empresa->video))
            <div class="video">
              <div class="container-video">
                <iframe width="960" height="650" src="https://www.youtube.com/embed/{{$empresa->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
          @endif

          <div class="container">
            <article>
                <div class="row">
                    <div class="col-lg-6">
                        <h2>TRADIÇÃO</h2>
                        @if(isset($empresa->tradicao))
                          {!!$empresa->tradicao!!}
                        @endif
                    </div>
                    <div class="col-lg-6 shadow">
                        <div class="change-photo">
                            <input id="cps1" type="radio" name="change-photo-sel" checked>
                            <div class="photo" style="background-image:url('{{ asset('theme/images/old.jpeg') }}')">
                                <label for="cps1">1991</label>
                            </div>
                            <input id="cps2" type="radio" name="change-photo-sel">
                            <div class="photo" style="background-image:url('{{ asset('theme/images/new.jpeg') }}')">
                                <label for="cps2">2019</label>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <div class="row setores">
                <div class="col-md-6 col-lg-3">
                    <img src="{{ asset('theme/images/setor_compras.png') }}" alt="team">
                    <h3>Setor de Compras</h3>
                </div>
                <div class="col-md-6 col-lg-3">
                    <img src="{{ asset('theme/images/setor_financeiro.png') }}" alt="team">
                    <h3>Setor Financeiro</h3>
                </div>
                <div class="col-md-6 col-lg-3">
                    <img src="{{ asset('theme/images/setor_estoque.png') }}" alt="team">
                    <h3>Setor de Estoque</h3>
                </div>
                <div class="col-md-6 col-lg-3">
                    <img src="{{ asset('theme/images/setor_vendas.png') }}" alt="team">
                    <h3>Setor de Vendas</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Parceiros -->
    <section id="parceiros" class="parceiros">
      <div class="container teste">
        @if(count($parceiros) > 0)
          <h2>PARCEIROS</h2>

          <div class="background">
            <div class="carousel-parceiros">
                @foreach($parceiros as $parceiro)
                  <div id="parc{{$parceiro->id}}" class="item" style="background-image:url('uploads/parceiro/{{$parceiro->imagem}}')">
                  </div>
                @endforeach
              </div>
            </div>

            <div class="carousel-produtos">
              <div class="row">
                <div class="col-lg-3 produto1" style="background-image:url('uploads/parceiro/{{$parceiros[0]->imgprod1}}');background-position: center;background-size: contain;"></div>
                <div class="col-lg-3 descricao1">
                  <p>
                    {{$parceiros[0]->textprod1}}
                  </p>
                </div>
                <div class="col-lg-3 produto2" style="background-image:url('uploads/parceiro/{{$parceiros[0]->imgprod2}}');background-position: center;background-size: contain;"></div>
                <div class="col-lg-3 descricao2">
                  <p>
                    {{$parceiros[0]->textprod2}}
                  </p>
                </div>
              </div>
            </div>
        @endif
      </div>
    </section>

    <!-- Seção de Notícias -->
    <section id="uninews">
      <div class="container">
          <h2>UNI<span>NEWS</span></h2>
          <small class="subtitulo">
              <strong>Informação nunca é demais</strong><br>
              Fique por dentro das notícias do mundo do Agronegócio
          </small>
        @if(count($noticias)>0)
          <div class="row">
            @foreach($noticias->take(3) as $noticia)
              <div class="col-sm-6 col-md-4 teste">
                <a href="{{ route('noticia.item', $noticia->slug)}}">
                  <div class="card">
                    <img class="uninewsimg" src="{{ asset('uploads/noticia/'.$noticia->imagem) }}">
                    <h3> {{$noticia->titulo}} </h3>
                    <p>
                      {{$noticia->descricao}}
                    </p>
                    <div class="info-date">
                      <span class="continue">
                        Cotinue Lendo...
                      </span>
                      <span>
                        <img src="{{ asset('theme/images/time.png') }}" alt="horário">
                        <?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($noticia->created_at))->diffForHumans() ?>
                      </span>
                    </div>
                  </div>
                </a>
              </div>
            @endforeach
          </div>
          @if(count($noticias)>3)
            <div class="center">
              <a href="#" class="vejamais">VEJA MAIS AQUI</a>
            </div>
          @endif
        </div>
      @else
        <p>Ops, nenhuma notícia cadastrada ainda.</p>
      @endif
    </section>

    <!-- Seção do Mapa -->
    <section id="localizacao">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.2974894921836!2d-47.47306068554043!3d-5.52280165647185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x92c55fa2343fe765%3A0x2ef4b00984bb0f85!2sUnipe%C3%A7as+Equipamentos+Agricolas!5e0!3m2!1spt-BR!2sbr!4v1560178022237!5m2!1spt-BR!2sbr" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>

    @include('pages.partials._footer')
@endsection

@section('script')
<script src="{{ asset('theme/js/jquery.js') }}" charset="utf-8"></script>
<script src="{{ asset('theme/js/jquery.mask.js') }}" charset="utf-8"></script>
<script src="{{ asset('theme/js/main.js') }}" charset="utf-8"></script>
<script src="{{ asset('theme/js/slick.js') }}" charset="utf-8"></script>
<script src="{{ asset('theme/js/banner.js') }}" charset="utf-8"></script>
<script src="{{ asset('template/plugins/sweet-alert/sweetalert2.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    !function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://static.omni.chat/web-chat/web-chat.min.js",t.onload=function(){OmniChatWebChat.init(window.omnichatConfig)};var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}();
</script>
<!-- OmniChat web-chat widget -->
<script>
    jQuery(function($){
      $("#telefone").mask("(99) 9999-9999");
      $("#whatsapp").mask("(99) 99999-9999");
    });

    $('.openmodal').on('click', function (e) {
      $('#modal-default').modal('show');
    });

    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if (exist){
      swal(
          {
            title: 'Pré-cadastro realizado !',
            type: 'success',
            confirmButtonColor: '#4fa7f3'
          }
      )
    }
    var msg = '{{Session::get('alert2')}}';
    var exist = '{{Session::has('alert2')}}';
    if (exist){
      swal(
          {
            title: 'ihhh, babou !',
            type: 'success',
            confirmButtonColor: '#4fa7f3'
          }
      )
    }

    var produtoparceiros = $('.parceiros div.carousel-parceiros').slick({
    centerMode: true,
    centerPadding: '60px',
    slidesToShow: 3,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 3
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: '10px',
          slidesToShow: 1
        }
      }
    ]
  });

    produtoparceiros.on('afterChange', function(event, slick, currentSlide){

    identify = $('.carousel-parceiros .item.slick-current').attr('id');

    $('.parceiros .carousel-produtos .descricao1').text(parceiros[identify].textprod1);
    $('.parceiros .carousel-produtos .descricao2').text(parceiros[identify].textprod2);
    $('.parceiros .carousel-produtos .produto1').css('background-image',"url('uploads/parceiro/"+parceiros[identify].imgprod1+"')");
    $('.parceiros .carousel-produtos .produto2').css('background-image',"url('uploads/parceiro/"+parceiros[identify].imgprod2+"')");

  });

    var pareceiros = [];
    @if(count($parceiros) > 0)
      @foreach($parceiros as $parceiro)
          parceiros["parc{{$parceiro->id}}"] = {
            'textprod1':'{{$parceiro->textprod1}}',
            'textprod2':'{{$parceiro->textprod2}}',
            'imgprod1' :'{{$parceiro->imgprod1}}',
            'imgprod2' :'{{$parceiro->imgprod2}}'
          };
      @endforeach
    @endif

    // Notícias
    var noticias = [];
      @if(count($noticias) > 0)
        @foreach($noticias as $noticia)
            noticias.push({
              'titulo':'{{$noticia->titulo}}',
              'descricao':'{{$noticia->descricao}}',
              'imagem':'{{$noticia->imagem}}',
              'created_at' :'<?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($noticia->created_at))->diffForHumans() ?>',
              'slug' :'{{$noticia->slug}}'
            });
        @endforeach
      @endif

    $('#uninews .vejamais').click(function(event){
        event.preventDefault();
        for (var i = 0; i < 3; i++) {
            if(noticias.length > $('#uninews div.card').length){
                if (typeof noticias[$('#uninews div.card').length] == "object")
                $('#uninews .col-sm-6.col-md-4.teste').last().after(
                    '<div class="col-sm-6 col-md-4 teste">'+
                    '<a href="/noticia/'+noticias[$('#uninews div.card').length].slug+'">'+
                      '<div class="card">'+
                        '<img class="uninewsimg" src="uploads/noticia/'+noticias[$('#uninews div.card').length].imagem+'">'+
                        '<h3>'+noticias[$('#uninews div.card').length].titulo+'</h3>'+
                        '<p>'+noticias[$('#uninews div.card').length].descricao+'</p>'+
                        '<div class="info-date">'+
                          '<span class="continue">'+
                            'Cotinue Lendo'+
                          '</span>'+
                          '<span>'+
                            '<img src="theme/images/time.png" alt="horário">'+noticias[$('#uninews div.card').length].created_at+
                          '</span>'+
                        '</div>'+
                     ' </div>'+
                     '</a>'+
                    '</div>'
                );
            }
            else
              $('#uninews .vejamais').text('TODAS AS NOTÍCIAS CARREGADAS').addClass('desabilitado');
        }
    });

  $(document).ready(function(){

    function mostrarBanner(indice){
      clearInterval(executar);
        // if(mouse) return;
        $('.carousel-banner .item-carousel').css({'opacity':'0','z-index':'0'});
        $('.carousel-banner .item-carousel').eq(banner).css({'opacity':'1','z-index':'1'});

        var pausar = false

          executar = setInterval(function() {
            if (pausar) return
            $('.carousel-banner .next').trigger('click');
          }, 7000);

          $('#banner').hover(function() {
            pausar = true
          }, function() {
            pausar = false
          });

    }
    var executar = setInterval(function(){ $('.carousel-banner .next').trigger('click'); }, 7000);
    var banner = 0;
    mostrarBanner(banner);

    $('.carousel-banner .prev').click(function(){
        mouse = false;
        banner = (banner == 0) ? $('.carousel-banner .item-carousel').length-1 : banner-1;
    mostrarBanner(banner);
    });

    $('.carousel-banner .next').click(function(){
        mouse = false;
        banner = ($('.carousel-banner .item-carousel').length-1 > banner) ? banner+1 : 0;
    mostrarBanner(banner);
    });
  });
</script>


@endsection
