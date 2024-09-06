@extends('admin.main')

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Sweet Alert css -->
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-caminho')
Empresa
@endsection

@section('page-title')
Cadastro
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
      @if(!isset($empresa->id))
        <p id="req-cad">
          As informações da empresa ainda não foram cadastradas,
          <a id="cad" class="text-success" href="#"> Cadastre agora.</a>
        </p>
        <div id="form-cad" class="col-sm-12 col-xs-12" style="display:none">
          {{ Form::open(['route' => 'empresa.store']) }}
      @else
          <div id="form-cad" class="col-sm-12 col-xs-12">
          {{ Form::model($empresa, ['route' => ['empresa.update', $empresa->id], 'method' => 'PUT']) }}
      @endif

      <div class="row">
        <div class="form-group col-md-3">
            {{ Form::label('nomefantasia', 'Nome Fantasia') }}
            {{ Form::text('nomefantasia', null, array('class' => 'form-control', 'autofocus','maxlength' => '100', 'required')) }}
        </div>
        <div class="form-group col-md-3">
            {{ Form::label('telefone', 'Telefone') }}
            {{ Form::text('telefone', null, array('class' => 'form-control','maxlength' => '30','placeholder' => '(99) 99999-9999')) }}
        </div>
        <div class="form-group col-md-3">
            {{ Form::label('celular', 'Celular') }}
            {{ Form::text('celular', null, array('class' => 'form-control','maxlength' => '30','placeholder' => '(99) 99999-9999')) }}
        </div>
        <div class="form-group col-md-3">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, array('class' => 'form-control','maxlength' => '30')) }}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
            {{ Form::label('rua', 'Rua') }}
            {{ Form::text('rua', null, array('class' => 'form-control','maxlength' => '150')) }}
        </div>
        <div class="form-group col-md-4">
            {{ Form::label('bairro', 'Bairro') }}
            {{ Form::text('bairro', null, array('class' => 'form-control','maxlength' => '150')) }}
        </div>
        <div class="form-group col-md-3">
            {{ Form::label('cidade', 'Cidade') }}
            {{ Form::text('cidade', null, array('class' => 'form-control','maxlength' => '150')) }}
        </div>
        <div class="form-group col-md-1">
            {{ Form::label('estado', 'UF') }}
            {{ Form::text('estado', null, array('class' => 'form-control','maxlength' => '2')) }}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-3">
            {{ Form::label('instagram', 'Instagram') }}
            {{ Form::url('instagram', null, array('class' => 'form-control','maxlength' => '250')) }}
        </div>
        <div class="form-group col-md-3">
            {{ Form::label('whatsapp', 'Whatsapp') }}
            {{ Form::url('whatsapp', null, array('class' => 'form-control','maxlength' => '250')) }}
        </div>
        <div class="form-group col-md-3">
            {{ Form::label('facebook', 'Facebook') }}
            {{ Form::url('facebook', null, array('class' => 'form-control','maxlength' => '250')) }}
        </div>
        <div class="form-group col-md-3">
            {{ Form::label('video', 'Video') }}
            {{ Form::text('video', null, array('class' => 'form-control','maxlength' => '50')) }}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          {{ Form::label('missao', 'Missão') }}
          {{ Form::textarea('missao', null, array('class' => 'form-control','maxlength' => '350')) }}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          {{ Form::label('visao', 'Visão') }}
          {{ Form::textarea('visao', null, array('class' => 'form-control','maxlength' => '350')) }}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          {{ Form::label('valores', 'Valores') }}
          {{ Form::textarea('valores', null, array('class' => 'form-control','maxlength' => '350')) }}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          {{ Form::label('tradicao', 'Tradição') }}
          {{ Form::textarea('tradicao', null, array('class' => 'form-control','maxlength' => '1500')) }}
        </div>
      </div>

      <div class="row" style="margin-top: 20px">
        <div class="col-12">
          <div class="text-center">
            <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Atualizar</button>
            <a href="{{ route('empresa.index') }}" class="btn btn-danger"><i class="dripicons-cross"></i> Cancelar</a>
          </div>
        </div>
      </div>
  </div>
</div>

{{ Form::close() }}
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('template/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/plugins/ckeditor5/ckeditor.js')}}"></script>
<script>
jQuery(function($){
  $("#telefone").mask("(99) 9999-9999");
  $("#celular").mask("(99) 99999-9999");
});

  $(document).ready(function () {
    $("#cad").click(function(event){
      event.preventDefault();
      $("#req-cad").slideUp();
      $("#form-cad").slideDown();
    });
});

ClassicEditor
  .create( document.querySelector('#tradicao'), {
  } )
  .then( editor => {
    window.editor = editor;
  } )
  .catch( err => {
    console.error( err.stack );
  } );
</script>

@endsection
