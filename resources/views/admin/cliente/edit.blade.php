@extends('admin.main')

@section('page-title')
Editar Parceiro
@endsection

@section('page-caminho')
Parceiros
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
    {{ Form::model($cliente, ['route' => ['clientes.update', $cliente->id], 'method' => 'PUT', 'files' => true]) }}

          <div class="row">
            <div class="form-group col-md-6">
              {{ Form::label('nome', 'Nome do Cliente') }}
              {{ Form::text('nome', null, array('class' => 'form-control', 'autofocus','maxlength' => '255')) }}
            </div>
            <div class="form-group col-md-6">
              {{ Form::label('cpf', 'CPF / CNPJ') }}
              {{ Form::text('cpf', null, array('class' => 'form-control', 'autofocus','maxlength' => '30')) }}
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              {{ Form::label('link', 'Link para download') }}
              {{ Form::text('link', null, array('class' => 'form-control', 'autofocus','maxlength' => '255')) }}
            </div>
            <div class="form-group col-md-4">
              {{ Form::label('datavenda', 'Data de Venda') }}
              {{ Form::text('datavenda', null, array('class' => 'form-control', 'autofocus','maxlength' => '12')) }}
            </div>
            <div class="form-group col-md-3">
                {{ Form::label('status', 'Status') }}
                <br>
                {{ Form::label('status', 'Pago') }}
                {{ Form::radio('status', '1' , true) }}
                {{ Form::label('status', 'Não Pago') }}
                {{ Form::radio('status', '0' , false) }}
            </div>
          </div>

          <div class="row" style="margin-top: 20px">
            <div class="form-group col-12">
              <div class="text-center">
                <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Atualizar</button>
                <a href="{{ route('clientes.index') }}" class="btn btn-danger"><i class="fa fa-window-close m-r-5"></i> Cancelar</a>
              </div>
            </div>
          </div>
    {{ Form::close() }}
  </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('template/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('template/js/autosize.js') }}" type="text/javascript"></script>
<script>
	autosize(document.querySelectorAll('textarea'));
  $('#datavenda').mask('99/99/9999');

</script>
@endsection
