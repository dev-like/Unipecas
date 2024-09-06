<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                  <a href="{{ route('empresa.index') }}">
                    <i class="fa fa-users"></i> <span> Empresa </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('banners.index') }}">
                    <i class="dripicons-photo-group"></i> <span> Banners </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('parceiros.index') }}">
                    <i class="fa fa-handshake-o"></i> <span> Parceiros </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('noticias.index') }}">
                    <i class="fa fa-newspaper-o"></i> <span> Notícias </span>
                  </a>

                </li>
                @if(Auth::User()->nivel == 1)
                  <li>
                    <a href="{{ route('clientes.index') }}">
                      <i class="fa fa-users"></i> <span> Clientes </span>
                    </a>
                  </li>
                  <li>
                      <a href="{{ route('historico.index') }}">
                          <i class="dripicons-document"></i> <span> Histórico de Atividades </span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('usuario.index') }}">
                          <i class="fa fa-user"></i> <span> Usuários </span>
                      </a>
                  </li>
                @endif
            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
