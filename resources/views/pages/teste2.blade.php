<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TESTE</title>

    <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
  </head>

  <body>


    <div class="row">
      <div class="col-md-12">

        {{ $cliente->['nome'] }}<br>
        {{ $cliente->['cpf'] }}

      </div>
    </div>

    <script src="{{ asset('template/plugins/sweet-alert/sweetalert2.min.js') }}" type="text/javascript"></script>
    <script>
      var msg = '{{Session::get('alert')}}';
      var exist = '{{Session::has('alert')}}';

      if (exist){
            swal(
          {
            title: 'E-mail enviado com Sucesso !',
            text: ' Entraremos em contato o mais rápido possível.',
            type: 'success',
            confirmButtonColor: '#4fa7f3'
          }
        )
      }
    </script>

  </body>
</html>
