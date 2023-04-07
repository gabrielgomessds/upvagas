@extends('admin.layout')

@section('content')

<div class="layout-page">
  <div class="container-xxl flex-grow-1 container-p-y">

    @if(!$formEdit)
    <h4 class="fw-bold py-3 mb-4">
      <i class="menu-icon bg-primary text-white p-2 rounded-3 tf-icons bx bx-file"></i>
      Adicionar Currículo
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
            <label class="form-label fs-5 text-primary fw-bold" for="basic-default-fullname">Usuário: {{$user->name}}</label>
            <form action="{{ url('/admin/curriculos/cadastro') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <input type="hidden" name="user_id" value="{{$user->id}}" id="">
                <label class="form-label" for="basic-default-fullname">Telefone:</label>
                <input type="text" name="phone" class="form-control" id="basic-default-fullname" placeholder="Informe seu nome completo" />
                <input type="hidden" name="action" value="create">
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Localização: </label>
                <input type="text" name="localization" class="form-control" id="basic-default-company" placeholder="Informe sua localização, EX: Fortaleza, CE" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Formações: </label>
                <textarea id="basic-default-message" name="formations" class="form-control" placeholder="Informe suas formações acadêmicas como curso tecnicos ou faculdades" cols="30" rows="10"></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Descrição: </label>
                <textarea id="basic-default-message" name="description" class="form-control" placeholder="Informe uma descrição sobre você" cols="30" rows="10"></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Qualificações: </label>
                <textarea id="basic-default-message" name="qualifications" class="form-control" placeholder="Informe certificados que você fez e que te qualificam" cols="30" rows="10"></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Habilidades: </label>
                <textarea id="basic-default-message" name="skills" class="form-control" placeholder="Informe algumas habilidades sua como hard e soft skills" cols="30" rows="10"></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Experiências: </label>
                <textarea id="basic-default-message" name="experience" class="form-control" placeholder="Informe certificados que você fez e que te qualificam" cols="30" rows="10"></textarea>
              </div>
              
              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Linguagens: </label>
                <textarea id="basic-default-message" name="languages" class="form-control" placeholder="Informe certificados que você fez e que te qualificam" cols="30" rows="10"></textarea>
              </div>

              <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @else
    <h4 class="fw-bold py-3 mb-4">
      <i class="menu-icon bg-primary text-white p-2 rounded-3 tf-icons bx bx-user"></i>
      Atualizar Currículo
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
            <label class="form-label fs-5 text-primary fw-bold" for="basic-default-fullname">Usuário: {{$formEdit->user->name}}</label>
            <form action="{{ url('/admin/curriculo/'.$formEdit->id.'/editar') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Telefone:</label>
                <input type="text" name="phone" value="{{ $formEdit->phone }}" class="form-control" id="basic-default-fullname" placeholder="Digite seu nome completo" />
                <input type="hidden" name="action" value="update">
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Localização: </label>
                <input type="text" name="localization" value="{{ $formEdit->localization }}" class="form-control" id="basic-default-company" placeholder="Digite seu e-mail" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Formações: </label>
                <textarea id="basic-default-message" name="formations" class="form-control" placeholder="Informe suas formações acadêmicas como curso tecnicos ou faculdades" cols="30" rows="10">{{ $formEdit->formations }}</textarea>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Descrição: </label>
                <textarea id="basic-default-message" name="description" class="form-control" placeholder="Informe uma descrição sobre você" cols="30" rows="10">{{ $formEdit->description }}</textarea>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Qualificações: </label>
                <textarea id="basic-default-message" name="qualifications" class="form-control" placeholder="Informe certificados que você fez e que te qualificam" cols="30" rows="10">{{ $formEdit->qualifications }}</textarea>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Habilidades: </label>
                <textarea id="basic-default-message" name="skills" class="form-control" placeholder="Informe algumas habilidades sua como hard e soft skills" cols="30" rows="10">{{ $formEdit->skills }}</textarea>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Experiências: </label>
                <textarea id="basic-default-message" name="experience" class="form-control" placeholder="Informe certificados que você fez e que te qualificam" cols="30" rows="10">{{ $formEdit->experience }}</textarea>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Linguagens: </label>
                <textarea id="basic-default-message" name="languages" class="form-control" placeholder="Informe certificados que você fez e que te qualificam" cols="30" rows="10">{{ $formEdit->languages }}</textarea>
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