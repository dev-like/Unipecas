<!-- Rodapé -->
<footer>
    <div id="contato" class="container">
        <div class="row colunas">
            <div class="col-sm-6 col-md-3 logo">
                <img src="{{ asset('theme/images/logo_bottom.png') }}" alt="Unipeças">
            </div>

            <div class="col-sm-6 col-md-3 fake1">
              <h5>CONTATE-NOS</h5>
              @if(isset($empresa->email))
                {{$empresa->email}}<br>
              @endif
              @if(isset($empresa->telefone))
                <a href="tel:{{$empresa->telefone}}">{{$empresa->telefone}}</a> <br>
              @endif
              @if(isset($empresa->celular))
                {{$empresa->celular}}
              @endif
            </div>
            <div class="col-sm-6 col-md-3 coluna2">
              <h5>LOCALIZAÇÃO</h5>
              @if(isset($empresa->rua))
                {{$empresa->rua}}<br>
              @endif
              @if(isset($empresa->bairro))
                {{$empresa->bairro}}<br>
              @endif
              @if(isset($empresa->cidade))
                {{$empresa->cidade}}-{{$empresa->estado}}
              @endif
            </div>
            <div class="col-sm-6 col-md-3 coluna3">
              <h5>CONTATE-NOS</h5>
              @if(isset($empresa->email))
                {{$empresa->email}}<br>
              @endif
              @if(isset($empresa->telefone))
                <a href="tel:{{$empresa->telefone}}">{{$empresa->telefone}}</a><br>
              @endif
              @if(isset($empresa->celular))
                {{$empresa->celular}}
              @endif
            </div>
            <div class="col-sm-6 col-md-3 coluna4">
              <h5>SIGA A UNIPEÇAS</h5>
              @if($empresa->instagram != NULL)
              <a href="{{$empresa->instagram}}" class="redessociais">
                <img src="{{ asset('theme/images/instagram.png') }}" alt="instagram">
              </a>
              @endif
              &emsp;
              @if($empresa->facebook != NULL)
              <a href="{{$empresa->facebook}}" class="redessociais">
                <img src="{{ asset('theme/images/facebook.png') }}" alt="facebook">
              </a>
              @endif
              &emsp;
              @if($empresa->whatsapp != NULL)
              <a href="{{$empresa->whatsapp}}" class="redessociais">
                <img src="{{ asset('theme/images/whatsapp.png') }}" alt="whatsapp">
              </a>
              @endif
            </div>
            <div class="col-sm-6 col-md-3 fake2">
              <h5>LOCALIZAÇÃO</h5>
              @if(isset($empresa->rua))
                {{$empresa->rua}}<br>
              @endif
              @if(isset($empresa->bairro))
                {{$empresa->bairro}}<br>
              @endif
              @if(isset($empresa->cidade))
                {{$empresa->cidade}}-{{$empresa->estado}}
              @endif
            </div>
        </div>
    </div>
</footer>
