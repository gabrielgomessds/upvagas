@extends('person.layout')

@section('title', 'Candidaturas feitas por você')

@section('content')

<div class="layout-page">

  <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
      </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

      <form action="{{ url('/corporativo/vagas/buscar') }}" method="POST">
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

        <h5 class="card-header">Todas as suas candidaturas</b>
        @if(isset($company))
        de <b class="text-primary">{{ $company->name }}</b>/
          <a href="{{ url('/corporativo/vagas/cadastro/'.base64_encode($company->id)) }}"><button class="btn btn-primary btn-sm">Adicionar</button> <a>
          @endif
        </h5>
        <div class="table-responsive text-nowrap">
          @if(session('message'))
          <div class="mx-3">
            <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
          </div>
          @endif
          @if(!$applications->isEmpty())
          <table class="table">
            <thead>
              <tr>
                <th>Empresa</th>
                <th>Titulo</th>
                <th>Ver</th>
                <th>Status</th>
                <th>Enviada</th>
                
                
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach($applications as $app)
              <tr>
                <td>{{ mb_strimwidth($app->vacancies->company->name,0,40,'...') }}</td>
                <td>{{ mb_strimwidth($app->vacancies->title,0,40,'...') }}</td>
                <td><a href="{{ '/usuario/vaga/'.base64_encode($app->vacancies->id) }}"><button class="btn btn-sm btn-primary">Ver <i class='bx bx-file'></i></button> </td>
                <td>{{ $app->situation == 'sent' ? 'Enviado' :  ($app->situation == 'accepted' ? 'Aceito' :  'Recusado') }}</td>
                <td> {{ \Carbon\Carbon::parse($app->created_at)->format('d/m/Y') }}</td>
                
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
    
    </div>

    @endsection