@extends('admin.layout')

@section('title', 'Configurações')

@section('content')

<div class="layout-page">
  <div class="container-xxl flex-grow-1 container-p-y">

    @if($user)
    <h4 class="fw-bold py-3 mb-4">
      <i class="menu-icon bg-primary text-white p-2 rounded-3 tf-icons bx bx-cog"></i>
      Configurações
    </h4>

    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">

          <div class="card-body">
            @if(session('message'))
            <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
            @endif

            @if($errors->any())
            <div class="alert alert-warning">
              @foreach($errors->all() as $error)
              <div>{{ $error }}</div>
              @endforeach
            </div>
            @endif

             <form action="{{ url('/admin/perfil/atualizar') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Nome Completo:</label>
                <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="basic-default-fullname" placeholder="Digite seu nome completo" />
                <input type="hidden" name="action" value="update">
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">E-mail: </label>
                <input type="email" value="{{ $user->email }}" name="email" class="form-control" id="basic-default-company" placeholder="Digite seu e-mail" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Senha: </label>
                <input type="password" name="password" class="form-control" id="basic-default-company" placeholder="Digite uma senha" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Confirmar senha: </label>
                <input type="password" name="confirm_password" class="form-control" id="basic-default-company" placeholder="Digite uma senha" />
              </div>

              <div class="mb-3 image-container">
                @if($user->photo != NULL)
                <img src="{{ asset($user->photo) }}" width="200px" alt="{{ $user->name }}">
                <button type="button" class="close-button" id="button-modal" 
                data-title-modal="Tem certeza que deseja excluir esse imagem?" 
                data-url-modal="{{ url('/admin/usuario/'.$user->id.'/excluir/foto') }}"
                data-bs-toggle="modal" data-bs-target="#modalCenter">X</button>
                @endif
              </div>
              <div class="mb-3">

                <label for="formFile" class="form-label">Escolha uma foto: </label>
                <input class="form-control" name="photo" type="file" id="formFile" />
              </div>

              <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    @endif


  </div>
</div>
@endsection