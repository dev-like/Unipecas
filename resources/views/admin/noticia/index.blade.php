@extends('admin.main')

@section('page-title')
Notícias Cadastradas
@endsection

@section('page-caminho')
Notícias
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Sweet Alert css -->
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
    <table id="datatable" class="table table-bordered">
        <thead>
        <tr>
          <th>Titulo</th>
          <th>Descrição</th>
          <th>Data</th>
          <th>Ações</th>
        </tr>
        </thead>
        <tbody>
          @foreach($noticias as $noticia)
            <tr>
              <td>{{ substr(strip_tags($noticia->titulo), 0, 35) }}{{ (strlen(strip_tags($noticia->titulo)) > 35 ? "..." : "") }} </td>
              <td>{{ substr(strip_tags($noticia->descricao), 0, 50) }}{{ (strlen(strip_tags($noticia->descricao)) > 50 ? "..." : "") }} </td>
              <td>{{ date('d/m/y', strtotime($noticia->datapublicacao)) }}</td>
              <td width="15%">
                  <span class="hint--top" aria-label="Editar Notícia"><a href="{{ route('noticias.edit', $noticia->id) }}" style="border-radius: 50%" class="btn btn-warning waves-effect"> <i class="fa fa-pencil m-r-5"></i></a></span>
                  <span class="hint--top" aria-label="Visualizar Notícia"><a href="{{ route('noticias.show', $noticia->slug) }}" style="border-radius: 50%" class="btn btn-info waves-effect hint--bottom" aria-label="Thank you!" > <i class="fa fa-eye"></i></a></span>
                  <span class="hint--top" aria-label="Deletar Notícia"><button type="button" onclick="goswet({{$noticia->id}}, '{{$noticia->autor}}')" style="border-radius: 50%" class="btn btn-danger waves-effect"> <i class="fa fa-trash m-r-5"></i></button></span>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>

<script>
$(document).ready( function () {
    $('datatable').DataTable();

    var table = $('#datatable').DataTable({
      "dom": "<'row'<'col-sm-12 col-md-10'f> <'col-sm-12 col-md-2'B> >" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
             lengthChange: false,
              "language": {
                "info": "Listando _END_ de _MAX_ registros",
                "emptytable": "",
                "infoEmpty":      "",
                "lengthMenu":     "Mostrar _MENU_ Registros",
                "search":         "Pesquisa:",
                "zeroRecords":    "Nenhum registro encontrado.",
                "processing":     "Processando...",
                "loadingRecords": "Carregado...",
                "infoFiltered":   "(filtrado de _MAX_ registros)",
                "paginate": {
               "first":      "Primeiro",
               "last":       "Último",
               "next":       "Próximo",
               "previous":   "Anterior"
           }
      },
      "order": [[ 2, "desc" ]],
      buttons: {
        buttons:[
           {
          text: "Adicionar",
          action: function ( e, dt, button, config ) {
            //dt.ajax.reload();
            window.location = "{{ route('noticias.create') }}"
          },
          className: "btn btn-dark waves-effect waves-light pull-right"
        }]
      }
    });
} );

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  function goswet(id, nome){
    swal.setDefaults({
      reverseButtons: true
    })
    swal({
        title: "Deseja excluir "+nome+"?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Deletar"
    }).then(
      function(){
        $.ajax({
          type: "DELETE",
          url: "{{ url('admin/noticias') }}/"+id,
          data: {'id': id},
          success: function(data){
            swal({
             title: "Notícia deletada!",
             type: "success",
             timer: 2000,
             showConfirmButton: false
           }).then(
             function () {
             },
             function(){
               window.location = "{{ route('noticias.index') }}";
             }
           );
          },
          error: function(xhr,status, data) {
            swal("Não foi possível deletar item");
          }

        });
      }
    );
  }
</script>

@endsection
