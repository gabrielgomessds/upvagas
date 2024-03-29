@extends('admin.layout')

@section('title', 'Contatos')

@section('content')

<div class="layout-page">

  <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
      </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

    <form action="{{ url('/admin/contatos/buscar') }}" method="POST">
    <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
          @csrf
          <button class="search-button"><i class="bx bx-search fs-4 lh-0"></i></button>
          <input type="text" name="search" class="form-control border-0 shadow-none" placeholder="Buscar mensagem..." aria-label="Search..." />
        </div>
      </div>
    </form>
    </div>
  </nav>

  <div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="card">
       
        <h5 class="card-header">Mensagens Recebidas </h5>
        <div class="table-responsive text-nowrap">
        @if(session('message'))
        <div class="mx-3">
          <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
        </div>
        @endif
        @if(!$contacts->isEmpty())
          <table class="table">
            <thead>
              <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Assunto</th>
                <th>Status</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach($contacts as $contact)
              <tr>
                <td>{{ $contact->user->name }}</td>
                <td>{{ $contact->user->email }}</td>
                <td>{{ mb_strimwidth($contact->subject,0,40,'...') }}</td>
                <td>{!! empty($contact->response) ? '<b class="text-danger">Não respondida</b>' : '<b class="text-primary">Respondida</b>' !!}</td>
                <td><a href="{{ url('/admin/contato/'.$contact->id.'/editar') }}">
                    <i class='bx bxs-pencil'></i></a>
                  <a href="#" class="button-modal-list" data-title-modal="Tem certeza que deseja excluir esse mensagem?" data-url-modal="{{ url('/admin/contato/'.$contact->id.'/excluir') }}" data-bs-toggle="modal" data-bs-target="#modalCenter"><i class='bx bxs-trash'></i></a>

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
        {{ $contacts->links('vendor.pagination') }}
      </div>
    </div>

    @endsection