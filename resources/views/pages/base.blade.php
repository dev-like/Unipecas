<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158132559-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-158132559-1');
    </script>
    <script>
    window.omnichatConfig = {
    retailerId: "WyqXkojwuj"
    };
    </script>

    <!-- Meta Tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('metatags')
    <meta property="og:image" content="{{ asset('theme/images/icon.png') }}">
    <meta property="og:url" content="http://www.unipecas.com.br">
    <meta name="author" content="Like Publicidade">

    <!-- Title Page-->
    <title>{{$empresa->nomefantasia}}</title>
    <link rel="shortcut icon" href="{{ asset('theme/images/icon.png') }}">
    <meta name="_token" content="{{csrf_token()}}" />

    <!-- Fonts e Animations -->
    <link rel="stylesheet" href="{{ asset('theme/css/lib/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/lib/animates.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/fonts/fonts.css') }}">

    <!-- Styles Sheets -->
    <link rel="stylesheet" href="{{ asset('theme/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/uninews.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/owl.theme.default.min.css') }}">
    @yield('stylesheet')

    <!-- JS Library's -->
    <script src="{{ asset('theme/js/jquery.js') }}" charset="utf-8"></script>
    <script src="{{ asset('theme/js/slick.js') }}" charset="utf-8"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    @yield('jslibrary')
<head>
<body>


    @yield('body')

    @yield('script')

</body>
</html>
