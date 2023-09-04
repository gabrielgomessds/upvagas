@extends('admin.layout')

@section('title', 'Currículos')

@section('content')

<div class="layout-page">

  <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
      </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

    <form action="{{ url('/admin/curriculos/buscar') }}" method="POST">
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
       
        <h5 class="card-header">Currículos Cadastrados </h5>
        <div class="table-responsive text-nowrap">
        @if(session('message'))
        <div class="mx-3">
          <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
        </div>
        @endif
        @if(!$resumes->isEmpty())
          <table class="table">
            <thead>
              <tr>
                <th>Usuário</th>
                <th>E-mail</th>
                <th>Fone</th>
                <th>Ver</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach($resumes as $resume)
              <tr>
                <td>{{ $resume->user->name }}</td>
                <td>{{ $resume->user->email }}</td>
                <td>{{ $resume->phone }}</td>
                <td><a href="{{ '/admin/curriculo/'.base64_encode($resume->id) }}"><button class="btn btn-sm btn-primary">Ver <i class='bx bx-file'></i></button> </td>
                <td><a href="{{ url('/admin/curriculo/'.$resume->id.'/editar') }}">
                    <i class='bx bxs-pencil'></i></a>
                  <a href="#" class="button-modal-list" data-title-modal="Tem certeza que deseja excluir esse currículo?" data-url-modal="{{ url('/admin/curriculo/'.$resume->id.'/excluir') }}" data-bs-toggle="modal" data-bs-target="#modalCenter"><i class='bx bxs-trash'></i></a>

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
        {{ $resumes->links('vendor.pagination') }}
      </div>
    </div>

    @endsection