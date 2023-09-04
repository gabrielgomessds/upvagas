@extends('person.layout')

@section('title', 'Vagas')

@section('content')

<div class="layout-page">


  <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="card">
        <h5 class="card-header">Vagas Aplicadas<a>
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
                <td><a href="{{ '/corporativo/vaga/'.base64_encode($vacancy->id) }}"><button class="btn btn-sm btn-primary">Ver <i class='bx bx-file'></i></button> </td>
                <td><a href="{{ url('/corporativo/vaga/'.$vacancy->id.'/editar') }}">
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
        @if(!$vacancies->isEmpty())
          {{ $vacancies->links('vendor.pagination') }}
        @endif
      </div>
    </div>

    @endsection