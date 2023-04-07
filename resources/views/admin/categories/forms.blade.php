@extends('admin.layout')

@section('title', 'Adicionar Categoria')

@section('content')

<div class="layout-page">
  <div class="container-xxl flex-grow-1 container-p-y">

    @if(!$formEdit)
    <h4 class="fw-bold py-3 mb-4">
      <i class="menu-icon bg-primary text-white p-2 rounded-3 tf-icons bx bx-category-alt"></i>
      Adicionar Categoria
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
            <form action="{{ url('/admin/categorias/cadastro') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Titulo:</label>
                <input type="text" name="title" class="form-control" id="basic-default-fullname" placeholder="Informe seu titulo" />
                <input type="hidden" name="action" value="create">
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Icone: </label>
                <input type="text" name="icon" class="form-control" id="basic-default-company" placeholder="Informe o icon" />
              </div>      

              <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @else
    <h4 class="fw-bold py-3 mb-4">
      <i class="menu-icon bg-primary text-white p-2 rounded-3 tf-icons bx bx-category-alt"></i>
      Atualizar Categoria
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
            <form action="{{ url('/admin/categoria/'.$formEdit->id.'/editar') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Titulo:</label>
                <input type="text" name="title" value="{{ $formEdit->title }}" class="form-control" id="basic-default-fullname" placeholder="Informe o titulo da categoria" />
                <input type="hidden" name="action" value="update">
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Icone: </label>
                <input type="text" name="icon" value="{{ $formEdit->icon }}" class="form-control" id="basic-default-company" placeholder="Informe o icone da categoria" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">URL: </label>
                <input type="text" name="slug" value="{{ $formEdit->slug }}" class="form-control" id="basic-default-company" placeholder="Informe o icone da categoria" />
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