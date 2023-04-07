@extends('.base')

@section('title', 'Login')

@section('content')
<div class="py-5" style="margin-bottom: 150px;margin-top: 60px;">
    <div class="container ">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Faça Login</h1>

        <div class="row g-4">
            <div class="col-md-12 mb-4 d-flex justify-content-center align-items-center">
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                    @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                        @endforeach
                    </div>
                    @endif
                    <form action="{{ url('/login') }}" method="POST">
                        @csrf
                        <div class="row g-3">

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu e-mail">
                                    <label for="email">E-mail:</label>
                                    @error('email') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Digite sua senha">
                                    <label for="password">Senha: </label>
                                    @error('password') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Fazer Login</button>

                            </div>
                            <div class="col-12">
                                <h5 class="text-center">
                                    Não tem conta? <a href="{{ url('cadastro/pessoa') }}">Clique aqui</a>
                                </h5>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection