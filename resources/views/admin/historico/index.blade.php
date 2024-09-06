@extends('admin.main')

@section('page-title')
Histórico de Atividades
@endsection

@section('page-caminho')
Histórico
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
          <th width="200px">Usuário</th>
          <th>Descrição</th>
          <th width="140px">Data</th>
        </tr>
        </thead>
        <tbody>
          @foreach($historico as $historico)
            <tr>
              <td>{{ $historico->user }}</td>
              <td>{{ $historico->acoes }}</td>
              <td>{{ date('d/m/y g:ia', strtotime($historico->date)) }}</td>
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
      "dom": "<'row'<'col-sm-12 col-md-10'f> <'col-sm-12 col-md-2'> >" +
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
      "order": [[ 2, "asc" ]],
      buttons: {
        buttons:[
           {
          text: "Adicionar",
          action: function ( e, dt, button, config ) {
            //dt.ajax.reload();
            window.location = "{{ route('noticias.create') }}"
          },
          className: "btn btn-info waves-effect waves-light pull-right"
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
