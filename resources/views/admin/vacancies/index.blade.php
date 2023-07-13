@extends('admin.layout')

@section('title', 'Vagas')

@section('content')

<div class="layout-page">

  <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
      </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

      <form action="{{ url('/admin/vagas/buscar') }}" method="POST">
        <div class="navbar-nav align-items-center">
          <div class="nav-item d-flex align-items-center">
            @csrf
            <button class="search-button"><i class="bx bx-search fs-4 lh-0"></i></button>
            <input type="text" name="search" class="form-control border-0 shadow-none" placeholder="Buscar vagas..." aria-label="Search..." />
          </div>
        </div>
      </form>


    </div>
  </nav>

  <div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="card">

        <h5 class="card-header">Vagas Cadastradas - <b class="text-primary">{{ isset($category) ? $category->title : ""}}</b>
        @if(isset($company))
        de <b class="text-primary">{{ $company->name }}</b>/
          <a href="{{ url('/admin/vagas/cadastro/'.base64_encode($company->id)) }}"><button class="btn btn-primary btn-sm">Adicionar</button> <a>
          @endif
        </h5>
        <div class="table-responsive text-nowrap">
          @if(session('message'))
          <div class="mx-3">
            <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
          </div>
          @endif
          @if(!$vacancies->isEmpty())
          <table class="table">
            <thead>
              <tr>
                <th>Empresa</th>
                <th>Categoria</th>
                <th>Titulo</th>
                <th>Situção</th>
                <th>Dados</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach($vacancies as $vacancy)
              <tr>
                <td>{{ $vacancy->company->name }}</td>
                <td>{{ $vacancy->category->title }}</td>
                <td>{{ mb_strimwidth($vacancy->title,0,40,'...') }}</td>
                <td>{{ $vacancy->situation == 'open' ? 'Aberta' :  'Fechada' }}</td>
                <td><a href="{{ '/admin/vaga/'.base64_encode($vacancy->id) }}"><button class="btn btn-sm btn-primary">Ver <i class='bx bx-file'></i></button> </td>
                <td><a href="{{ url('/admin/vaga/'.$vacancy->id.'/editar') }}">
                    <i class='bx bxs-pencil'></i></a>
                  <a href="#" class="button-modal-list" data-title-modal="Tem certeza que deseja excluir essa vaga?" data-url-modal="{{ url('/admin/vaga/'.$vacancy->id.'/excluir') }}" data-bs-toggle="modal" data-bs-target="#modalCenter"><i class='bx bxs-trash'></i></a>

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
        {{ $vacancies->links('vendor.pagination') }}
      </div>
    </div>

    @endsection