@extends('corporate.layout')

@section('content')

<div class="layout-page">
  <div class="container-xxl flex-grow-1 container-p-y">

    @if(!$formEdit)
    <h4 class="fw-bold py-3 mb-4">
      <i class="menu-icon bg-primary text-white p-2 rounded-3 tf-icons bx bxs-city"></i>
      Adicionar Empresa
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
            <form action="{{ url('/corporativo/empresas/cadastro') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
              <input type="hidden" name="user_id" value="{{Auth()->user()->id}}" id="">
                <label class="form-label" for="basic-default-fullname">Nome:</label>
                <input type="text" name="name" class="form-control" id="basic-default-fullname" placeholder="Nome da Empres" />
                <input type="hidden" name="action" value="create">
              </div>

              <div class="mb-3">

                <label for="formFile" class="form-label">Escolha uma logo: </label>
                <input class="form-control" name="logo" type="file" id="formFile" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Sobre: </label>
                <textarea id="basic-default-message" name="about" class="form-control" placeholder="Informações sobre a empresa como anos de mercado, funcionarios, especialidade"></textarea>
              </div>

              <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @else
    <h4 class="fw-bold py-3 mb-4">
      <i class="menu-icon bg-primary text-white p-2 rounded-3 tf-icons bx bxs-city"></i>
      Atualizar Empresa
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
            <form action="{{ url('/corporativo/empresa/'.$formEdit->id.'/editar') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <input type="hidden" name="user_id" value="{{$formEdit->user_id}}" id="">
                <label class="form-label" for="basic-default-fullname">Nome:</label>
                <input type="text" name="name" value="{{$formEdit->name}}" class="form-control" id="basic-default-fullname" placeholder="Nome da Empres" />
                <input type="hidden" name="action" value="update">
              </div>

              <div class="mb-3 image-container">
                @if($formEdit->logo != NULL)
                <img src="{{ asset($formEdit->logo) }}" width="200px" alt="{{ $formEdit->name }}">
                <button type="button" class="close-button" id="button-modal" 
                data-title-modal="Tem certeza que deseja excluir esse imagem?" 
                data-url-modal="{{ url('/admin/empresa/'.$formEdit->id.'/excluir/logo') }}"
                data-bs-toggle="modal" data-bs-target="#modalCenter">X</button>
                @endif
              </div>

              <div class="mb-3">

                <label for="formFile" class="form-label">Escolha uma logo: </label>
                <input class="form-control" name="logo" type="file" id="formFile" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Sobre: </label>
                <textarea id="basic-default-message" name="about" class="form-control" placeholder="Informações sobre a empresa como anos de mercado, funcionarios, especialidade">{{$formEdit->about}}</textarea>
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