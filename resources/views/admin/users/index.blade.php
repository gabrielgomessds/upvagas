@extends('admin.layout')

@section('title', 'Usuários')

@section('content')

<div class="layout-page">

  <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
      </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

      <form action="{{ url('/admin/usuario/buscar') }}" method="POST">
        <div class="navbar-nav align-items-center">
          <div class="nav-item d-flex align-items-center">
            @csrf
            <button class="search-button"><i class="bx bx-search fs-4 lh-0"></i></button>
            <input type="text" name="search" class="form-control border-0 shadow-none" placeholder="Buscar usuários..." aria-label="Search..." />
          </div>
        </div>
      </form>


    </div>
  </nav>

  <div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="card">

        <h5 class="card-header">Usuários Cadastrados / <a href="{{ url('admin/usuarios/cadastro') }}"><button class="btn btn-primary btn-sm">Adicionar</button></a></h5>
        <div class="table-responsive text-nowrap">
          @if(session('message'))
          <div class="mx-3">
            <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
          </div>
          @endif
          @if(!$users->isEmpty())
          <table class="table">
            <thead>
              <tr>
                <th>Foto</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Dados</th>
                <th>Tipo</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach($users as $user)
              <tr>
                <td><img src="{{ $user->photo == NULL ? url('admin/img/avatars/default.png') : asset($user->photo) }}" class="rounded-circle" width="40px" height="40px"></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  @if($user->type == 'person')
                  @if($user->resume == NULL)
                  <a href="{{ url('/admin/curriculos/cadastro/'.base64_encode($user->id)) }}"><button class="btn btn-sm btn-primary">Adicionar <i class='bx bx-plus'></i></button>
                    @else
                    <a href="{{ url('/admin/curriculo/'.base64_encode($user->resume->id)) }}"><button class="btn btn-sm btn-primary">Curriculo <i class='bx bx-file'></i></button>
                </td>
                @endif

                @elseif($user->type == 'corporation')
                @if(!$user->companys->isNotEmpty())
                <a href="{{ url('/admin/empresas/cadastro/'.base64_encode($user->id)) }}"><button class="btn btn-sm btn-primary">Adicionar <i class='bx bx-plus'></i></button> </td>
                  @else
                  <a href="{{ url('/admin/usuario/'.base64_encode($user->id).'/empresas' ) }}"><button class="btn btn-sm btn-primary">Empresas <i class='bx bxs-city'></i></button> </td>
                    @endif

                    @else
                    <a href="{{ url('/admin/empresas/cadastro/'.base64_encode($user->id)) }}"><button class="btn btn-sm btn-primary">Ver Dados <i class='bx bx-user-circle'></i></button> </td>
                      @endif

                      <td>{{ $user->type }}</td>
                      <td><a href="{{ url('/admin/usuario/'.$user->id.'/editar') }}">
                          <i class='bx bxs-pencil'></i></a>
                        <a href="#" class="button-modal-list" data-title-modal="Tem certeza que deseja excluir esse usuário?" data-url-modal="{{ url('/admin/usuario/'.$user->id.'/excluir') }}" data-bs-toggle="modal" data-bs-target="#modalCenter"><i class='bx bxs-trash'></i></a>

                      </td>
              </tr>
              @endforeach

            </tbody>
          </table>
          @else
          <div class="mx-3">
          <h5 class="alert alert-info mb-2 text-center">Nenhum registor encontrado</h5>
          </div>
          @endif

        </div>

      </div>
      <div class="conteiner-pagination mt-3">
        {{ $users->links('vendor.pagination') }}
      </div>
    </div>

    @endsection