  @extends('admin.main')

@section('page-title')
Editar Banner
@endsection

@section('page-caminho')
Banners
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
        {{ Form::model($banners, ['route' => ['banners.update', $banners->id], 'method' => 'PUT', 'files' => true]) }}
              <div class="row">
                @if($banners->caminho)
                <div class="form-group col-md-3">
                <img src="{{ asset('uploads/banners/'. $banners->caminho) }}" class="form-control banner">
                </div>
                @endif
                <div class="form-group col-md-9">
                  {{ Form::label('caminho','Imagem') }}
                  <input type="file" name="caminho" class="filestyle" data-buttonText="Carregar" data-placeholder="{!! $banners->caminho !!}" data-btnClass="btn-light">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="form-group col-md-8">
                    {{ Form::label('texto', 'Texto') }}
                    {{ Form::text('texto', null, array('class' => 'form-control', 'autofocus','maxlength' => '255')) }}
                </div>
                <div class="form-group col-md-4">
                  {{ Form::label('link', 'Link') }}
                  {{ Form::text('link', null, array('class' => 'form-control', 'autofocus','maxlength' => '255')) }}
                </div>
              </div>
            @if(count($banners->link) === 0)
            <p id="req-cad">
              <a id="cad" class="text-success" href="#">Para adicionar um botão ao banner, clique aqui.</a>
            </p>
            <div id="form-cad" class="col-sm-12 col-xs-12" style="display:none">
              <div class="row">
                <div class="form-group col-md-4">
                    {{ Form::label('textobotao', 'Texto Botão') }}
                    {{ Form::text('textobotao', null, array('class' => 'form-control', 'autofocus','maxlength' => '30')) }}
                </div>
                <div class="form-group col-md-4">
                    {{ Form::label('corbotao', 'Cor Botão') }}
                    {{ Form::color('corbotao', '$banners->corbotao', array('class' => 'form-control', 'autofocus','maxlength' => '255')) }}
                </div>
                <div class="form-group col-md-4">
                    {{ Form::label('lado', 'Lado Botão') }}
                    <br>
                    {{ Form::label('lado', 'Esquerdo') }}
                    {{ Form::radio('lado', 'E' , true) }}
                    {{ Form::label('lado', 'Direito') }}
                    {{ Form::radio('lado', 'D' , false) }}
                </div>
              </div>
            </div>

      @else
        <div class="row">
          <div class="form-group col-md-4">
              {{ Form::label('textobotao', 'Texto Botão') }}
              {{ Form::text('textobotao', null, array('class' => 'form-control', 'autofocus','maxlength' => '30')) }}
          </div>
          <div class="form-group col-md-4">
              {{ Form::label('corbotao', 'Cor Botão') }}
              {{ Form::color('corbotao', '#be9f60', array('class' => 'form-control', 'autofocus','maxlength' => '255')) }}
          </div>
          <div class="form-group col-md-4">
              {{ Form::label('lado', 'Lado Botão') }}
              <br>
              {{ Form::label('lado', 'Esquerdo') }}
              {{ Form::radio('lado', 'E' , true) }}
              {{ Form::label('lado', 'Direito') }}
              {{ Form::radio('lado', 'D' , false) }}
          </div>
        </div>
      @endif
            <div class="row" style="margin-top: 20px">
            <div class="form-group col-12">
              <div class="text-center">
                <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Salvar</button>
                <a href="{{ route('banners.index') }}" class="btn btn-danger"><i class="fa fa-window-close m-r-5"></i> Cancelar</a>
              </div>
            </div>
          </div>
        {{ Form::close() }}
  </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('template/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
<script>

$(document).ready(function () {
    $("#cad").click(function(event){
      event.preventDefault();
      $("#req-cad").slideUp();
      $("#form-cad").slideDown();
    });
  });

</script>
@endsection
