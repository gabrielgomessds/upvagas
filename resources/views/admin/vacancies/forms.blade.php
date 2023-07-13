@extends('admin.layout')

@section('content')

<div class="layout-page">
  <div class="container-xxl flex-grow-1 container-p-y">

    @if(!$formEdit)
    <h4 class="fw-bold py-3 mb-4">
      <i class="menu-icon bg-primary text-white p-2 rounded-3 tf-icons bx bx-layer"></i>
      Adicionar Vaga
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
            <label class="form-label fs-5 text-primary fw-bold" for="basic-default-fullname">Empresa: {{$company->name}}</label>
            <form action="{{ url('/admin/vagas/cadastro') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <input type="hidden" name="company_id" value="{{$company->id}}" id="">
                <label class="form-label" for="basic-default-fullname">Titulo:</label>
                <input type="text" name="title" class="form-control" id="basic-default-fullname" placeholder="Informe o titulo da vaga" />
                <input type="hidden" name="action" value="create">
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Categoria: </label>
                <select class="form-control" name="category_id" id="basic-default-company">
                  <option disabled selected>Escolha uma opção</option>
                 @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                 @endforeach
                  
                </select>
              </div>
              
              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Salário Inicial: </label>
                <input type="text" name="salary_intro" class="form-control" id="basic-default-company" placeholder="Salario inicial" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Salário Final: </label>
                <input type="text" name="salary_final" class="form-control" id="basic-default-company" placeholder="Salario Final" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Quantidade: </label>
                <input type="text" name="quantity" class="form-control" id="basic-default-company" placeholder="Quantidade de vagas disponiveis" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Localização: </label>
                <input type="text" name="localization" class="form-control" id="basic-default-company" placeholder="Localização onde a será a vaga" value="{{$company->localization}}" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Modelo: </label>
                <select class="form-control" name="model" id="basic-default-company">
                  <option disabled selected>Escolha uma opção</option>
                  <option value="presencial">Presencial</option>
                  <option value="hibrido">Hibirdo</option>
                  <option value="home_office">Home Office</option>
                  
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Tempo: </label>
                <select class="form-control" name="time" id="basic-default-company">
                  <option disabled selected>Escolha uma opção</option>
                  <option value="temporario">Temporario</option>
                  <option value="full_time">Full Time</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Tipo de contratação: </label>
                <select class="form-control" name="hiring_type" id="basic-default-company">
                  <option disabled selected>Escolha uma opção</option>
                  <option value="pj">PJ</option>
                  <option value="clt">CLT</option>
                  
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Nível: </label>
                <input type="text" name="level" class="form-control" id="basic-default-company" placeholder="Digite uma senha" />
              </div>
              

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Descrição: </label>
                <textarea name="description" class="form-control" id="basic-default-message" placeholder="Insira aqui a resposta a mensagem" cols="30" rows="10"></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Qualificações: </label>
                <textarea id="basic-default-message" name="qualifications" class="form-control" placeholder="Informe certificados que você fez e que te qualificam" cols="30" rows="10"></textarea>
              </div>

              <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @else
    <h4 class="fw-bold py-3 mb-4">
      <i class="menu-icon bg-primary text-white p-2 rounded-3 tf-icons bx bx-layer"></i>
      Atualizar {{$formEdit->title}} - {{$formEdit->company->name}}
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
            <form action="{{ url('/admin/vaga/'.$formEdit->id.'/editar') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <input type="hidden" name="company_id" value="{{$formEdit->company->id}}" id="">
                <label class="form-label" for="basic-default-fullname">Titulo:</label>
                <input type="text" name="title" value="{{ $formEdit->title }}" class="form-control" id="basic-default-fullname" placeholder="Informe o titulo da vaga" />
                <input type="hidden" name="action" value="update">
              </div>

           

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Categoria: </label>
                <select class="form-control" name="category_id" id="basic-default-company">
                  <option disabled selected>Escolha uma opção</option>
                 @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == $formEdit->category_id ? 'selected' : '' }} >{{$category->title}}</option>
                 @endforeach
                  
                </select>
              </div>
              
              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Salário Inicial: </label>
                <input type="text" name="salary_intro" value="{{$formEdit->salary_intro}}"  class="form-control" id="basic-default-company" placeholder="Salario inicial" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Salário Final: </label>
                <input type="text" name="salary_final" value="{{$formEdit->salary_final}}" class="form-control" id="basic-default-company" placeholder="Salario Final" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Quantidade: </label>
                <input type="text" name="quantity" value="{{$formEdit->quantity}}" class="form-control" id="basic-default-company" placeholder="Quantidade de vagas disponiveis" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Localização: </label>
                <input type="text" name="localization" value="{{$formEdit->localization}}" class="form-control" id="basic-default-company" placeholder="Localização onde a será a vaga"  />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Modelo: </label>
                <select class="form-control" name="model" id="basic-default-company">
                  <option disabled selected>Escolha uma opção</option>
                  <option value="presencial" {{$formEdit->model == 'presencial' ? 'selected' : '' }}>Presencial</option>
                  <option value="hibrido" {{$formEdit->model == 'hibrido' ? 'selected' : '' }}>Hibirdo</option>
                  <option value="home_office" {{$formEdit->model == 'home_office' ? 'selected' : '' }}>Home Office</option>
                  
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Tempo: </label>
                <select class="form-control" name="time" id="basic-default-company">
                  <option disabled selected>Escolha uma opção</option>
                  <option value="temporario" {{$formEdit->time == 'temporario' ? 'selected' : '' }}>Temporario</option>
                  <option value="full_time" {{$formEdit->time == 'full_time' ? 'selected' : '' }}>Full Time</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Tipo de contratação: </label>
                <select class="form-control" name="hiring_type" id="basic-default-company">
                  <option disabled selected>Escolha uma opção</option>
                  <option value="pj" {{$formEdit->hiring_type == 'pj' ? 'selected' : '' }}>PJ</option>
                  <option value="clt" {{$formEdit->hiring_type == 'clt' ? 'selected' : '' }}>CLT</option>
                  
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Nível: </label>
                <input type="text" name="level" value="{{$formEdit->level}}" class="form-control" id="basic-default-company" placeholder="Digite uma senha" />
              </div>
              

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Descrição: </label>
                <textarea name="description"  class="form-control" id="basic-default-message" placeholder="Insira aqui a resposta a mensagem" cols="30" rows="10">{{$formEdit->description}}</textarea>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Qualificações: </label>
                <textarea  name="qualifications" class="form-control" id="basic-default-message" placeholder="Informe certificados que você fez e que te qualificam" cols="30" rows="10">{{$formEdit->qualifications}}</textarea>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Situação: </label>
                <select class="form-control" name="situation" id="basic-default-company">
                  <option disabled selected>Escolha uma opção</option>
                 <option value="open" {{$formEdit->situation == 'open' ? 'selected' : '' }}>Aberta</option>
                 <option value="close" {{$formEdit->situation == 'close' ? 'selected' : '' }}>Fechada</option>
                  
                </select>
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