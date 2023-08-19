@extends('.base')

@section('title', 'Cadastro de Usuário')

@section('content')
<div class="py-5" style="margin-bottom: 110px;margin-top: 50px;">
    <div class="container text-center">
        <div class="mb-5 wow fadeInUp " data-wow-delay="0.1s">
            <h1><i class="bi bi-people-fill primary_color"></i> Cadastro para conta pessoal</h1>
            <h5>Encontre as melhores vagas para seu perfil</h5>
        </div>

        <div class="row g-4">

            <div class="col-md-12 mb-4 ">
                <div class="wow fadeInUp " data-wow-delay="0.5s">
                    <form action="{{ url('/cadastro/pessoa') }}" method="POST">
                        @csrf
                        <div class="row g-3 d-flex justify-content-center align-items-center">
                            <div class="col-md-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome">
                                    <label for="name">Nome Completo: </label>
                                    <input type="hidden" value="person" name="type">
                                    @error('name') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu e-mail">
                                    <label for="email">E-mail: </label>
                                    @error('email') <small class="text-danger">{{$message}}</small> @enderror

                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Digite sua senha">
                                    <label for="password">Senha:</label>
                                    @error('password') <small class="text-danger">{{$message}}</small> @enderror

                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirmar sua senha">
                                    <label for="confirm_password">Confirmar senha:</label>
                                </div>
                            </div>

                            <div class="col-8">
                                <button class="btn btn-primary w-100 py-3" type="submit">Cadastro</button>
                            </div>

                            <p>Quer encontrar os melhores profissionais para sua empresa? <a href="{{ url('cadastro/corporativo') }}">Clique aqui</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection