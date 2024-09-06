@extends('pages.base')

@section('metatags')
    <meta name="description" content="{{$empresa->descricao}}">
    <meta name="keywords" content="{{$empresa->palavraschave}}">
    <meta property="og:title" content="{{$empresa->nomefantasia}}">
    <meta property="og:description" content="{{$empresa->descricao}}">
@endsection

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('theme/css/financeiro.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('body')
  @include('pages.partials._menu')

  <section class="financeiro">

    <h1>FINALIZE SEU PEDIDO</h1>

    <div class="container box busca">
     <div class="panel panel-default">
      <div class="panel-body">
       <div class="form-group">

         <div class="input-group">
           <input type="text" class="form-control" name="search" id="search" placeholder="Digite seu cpf ou cnpj">
             <span class="input-group-btn">
              <button class="btn btn-default" type="button" id="MyButton">Pesquisar</button>
             </span>
         </div>

       </div>
       <div class="table-responsive" id="tabela">
        <h3 align="center">Total de pedidos: <span id="total_records"></span></h3>
        <table class="table table-striped table-bordered">
         <thead>
          <tr>
           <th>Nome</th>
           <th>CPF/CNPJ</th>
           <th>Data da Venda</th>
           <th>Ir para pagamento</th>
          </tr>
         </thead>
         <tbody>

         </tbody>
        </table>
       </div>
      </div>
     </div>
    </div>

  </section>


  @include('pages.partials._footer')
@endsection

@section('script')
<script src="{{ asset('theme/js/jquery.js') }}" charset="utf-8"></script>
<script src="{{ asset('theme/js/main.js') }}" charset="utf-8"></script>
<script src="{{ asset('theme/js/jquery.mask.js') }}"></script>

<script>
$(document).ready(function(){

  var cpfMascara = function (val) {
   return val.replace(/\D/g, '').length > 11 ? '00.000.000/0000-00' : '000.000.000-009';
 },
 cpfOptions = {
   onKeyPress: function(val, e, field, options) {
      field.mask(cpfMascara.apply({}, arguments), options);
   }
 };

 $('#search').mask(cpfMascara, cpfOptions);

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
    url:"{{ route('live_search.action') }}",
    method:'GET',
    data:{query:query},
    dataType:'json',
    success:function(data)
    {
      $('thead').html(data.table_data);
      $('#total_records').text(data.total_data);
    }
  })
}
   $('#MyButton').click(function() {

     var query = $("#search").val();

     fetch_customer_data(query);

   });

   // $(document).on('keyup', '#search', function(){
   //  var query = $(this).val();
   //
   //  fetch_customer_data(query);
   // });

    //
    // $('#MyButton').click(function(){
    //   var query = $(this).val();
    //   fetch_customer_data(query);
    // });
    //

});
</script>

@endsection
