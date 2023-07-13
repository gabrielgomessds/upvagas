<!DOCTYPE html>

<html lang="pt-br" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>UpVagas - @yield('title', 'Dashboard do Admin')</title>

  <meta name="description" content="" />

  <link href="{{ asset('img/favicon.png') }}" rel="icon">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('admin/vendor/fonts/boxicons.css')}}" />

  <link rel="stylesheet" href="{{ asset('admin/vendor/css/core.css') }}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('admin/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('admin/css/demo.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin/css/styles.css') }}" />

  <link rel="stylesheet" href="{{ asset('admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

  <link rel="stylesheet" href="{{ asset('admin/vendor/libs/apex-charts/apex-charts.css') }}" />

  <script src="{{ asset('admin/vendor/js/helpers.js') }}"></script>

  <script src="{{ asset('admin/js/config.js') }}"></script>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
            <img src="{{ asset('img/favicon.png') }}" width="40px" alt="">
            </span>
            <span class="fs-2 demo fw-bolder ms-2">UpVagas</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <div class="d-flex justify-content-center align-items-center flex-column mt-2">
          <img src="{{ auth()->user()->photo == NULL ? url('admin/img/avatars/default.png') : auth()->user()->photo }}" width="120px" class="mb-1 rounded-circle" />
          <p class="fs-4 fw-bold">{{ auth()->user()->name }}</p>
        </div>

        <ul class="menu-inner py-2">

          <li class="menu-item @if(request()->is('admin/home')) active @endif">
            <a href="{{ url('admin/home') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Home</div>
            </a>
          </li>

          <li class="menu-item @if( 
                               request()->is('admin/usuarios') 
                            || request()->is('admin/usuarios/cadastro') 
                            || request()->is('admin/usuario/*/editar') 
                            || request()->is('admin/usuarios/buscar/*')
                            ) active @endif">
            <a href="{{ url('admin/usuarios') }}" class="menu-link ">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div data-i18n="Analytics">Usuários</div>
            </a>
          </li>

          <li class="menu-item @if( 
                               request()->is('admin/curriculos') 
                            || request()->is('admin/curriculo/*') 
                            || request()->is('admin/curriculos/cadastro/*') 
                            || request()->is('admin/curriculos/*/editar') 
                            || request()->is('admin/curriculos/buscar/*')
                            ) active @endif">
            <a href="{{ url('admin/curriculos') }}" class="menu-link ">
              <i class="menu-icon tf-icons bx bx-file"></i>
              <div data-i18n="Analytics">Currículos</div>
            </a>
          </li>

          <li class="menu-item @if( 
                               request()->is('admin/empresas') 
                            || request()->is('admin/empresa/*') 
                            || request()->is('admin/empresas/cadastro/*') 
                            || request()->is('admin/empresas/*/editar') 
                            || request()->is('admin/empresas/buscar/*')
                            || request()->is('admin/usuario/*/empresas')
                            ) active @endif">
            <a href="{{ url('admin/empresas') }}" class="menu-link ">
              <i class="menu-icon tf-icons bx bxs-city"></i>
              <div data-i18n="Analytics">Empresas</div>
            </a>
          </li>


          <li class="menu-item @if( 
                               request()->is('admin/vagas') 
                            || request()->is('admin/vaga/*') 
                            || request()->is('admin/vagas/cadastro/*') 
                            || request()->is('admin/vagas/*/editar') 
                            || request()->is('admin/vagas/buscar/*')
                            || request()->is('admin/usuario/*/vagas')
                            || request()->is('admin/categorias/*/vagas')
                            ) active @endif">
            <a href="{{ url('admin/vagas') }}" class="menu-link ">
              <i class="menu-icon tf-icons bx bx-layer"></i>
              <div data-i18n="Analytics">Vagas</div>
            </a>
          </li>

          <li class="menu-item @if( 
                               request()->is('admin/categorias') 
                            || request()->is('admin/categoria/*') 
                            || request()->is('admin/categorias/cadastro/*') 
                            || request()->is('admin/categorias/*/editar') 
                            || request()->is('admin/categorias/buscar/*')
                            || request()->is('admin/usuario/*/categorias')
                            ) active @endif">
            <a href="{{ url('admin/categorias') }}" class="menu-link ">
              <i class="menu-icon tf-icons bx bx-category-alt"></i>
              <div data-i18n="Analytics">Categorias</div>
            </a>
          </li>

          <li class="menu-item @if( 
                               request()->is('admin/contatos') 
                            || request()->is('admin/contato/*') 
                            || request()->is('admin/contatos/cadastro/*') 
                            || request()->is('admin/contatos/*/editar') 
                            || request()->is('admin/contatos/buscar/*')
                            || request()->is('admin/usuario/*/contatos')
                            ) active @endif">
            <a href="{{ url('admin/contatos') }}" class="menu-link ">
              <i class="menu-icon tf-icons bx bxs-comment-detail"></i>
              <div data-i18n="Analytics">Mensagens </div>
            </a>
          </li>

          <li class="menu-item @if( 
                               request()->is('admin/configuracoes') 
                            ) active @endif">
            <a href="{{ url('admin/configuracoes') }}" class="menu-link ">
              <i class="menu-icon tf-icons bx bx-cog"></i>
              <div data-i18n="Analytics">Configurações</div>
            </a>
          </li>

          <li class="menu-item">
            <a href="{{url('')}}" class="menu-link">
            <i class='menu-icon tf-icons bx bx-log-out'></i>
              <div data-i18n="Analytics"> Voltar ao site</div>
            </a>
          </li>

          <li class="menu-item">
            <a href="{{url('admin/sair')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-power-off"></i>
              <div data-i18n="Analytics">Sair</div>
            </a>
          </li>
        </ul>
      </aside>


      @yield('content')


      <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="modalCenterTitle"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Fechar
              </button>

              <a href="#" class="url-button-modal">
                <button type="button" class="btn btn-primary">Continuar</button>
              </a>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="layout-overlay layout-menu-toggle"></div>
  </div>

  <script src="{{asset('admin/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{asset('admin/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{asset('admin/vendor/js/bootstrap.js')}}"></script>
  <script src="{{asset('admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

  <script src="{{asset('admin/vendor/js/menu.js')}}"></script>

  <script src="{{asset('admin/vendor/libs/apex-charts/apexcharts.js')}}"></script>

  <script src="{{asset('admin/js/main.js')}}"></script>
  <script src="{{asset('admin/js/scripts.js')}}"></script>

  <script src="{{asset('admin/js/dashboards-analytics.js')}}"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>