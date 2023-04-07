@extends('.base')

@section('title', 'Cadastro de Empresa')

@section('content')
        <div class="py-5" style="margin-bottom: 110px;margin-top: 50px;">
            <div class="container text-center">
                <div class="mb-5 wow fadeInUp " data-wow-delay="0.1s">
                    <h1><i class="bi bi-building primary_color"></i> Cadastro para conta corporativa</h1>
                    <h5>Encontre os melhores talentos para sua empresa</h5>
                </div>
                <div class="row g-4">
                    
                    <div class="col-md-12 mb-4 d-flex justify-content-center align-items-center">
                        <div class="wow fadeInUp" data-wow-delay="0.5s">
                            <form>
                                <div class="row g-3 d-flex justify-content-center align-items-center">
                                    <div class="col-md-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="Digite seu nome">
                                            <label for="name">Nome Completo: </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail">
                                            <label for="email">E-mail: </label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="password" placeholder="Digite sua senha">
                                            <label for="password">Senha:</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="confirm_password" placeholder="Confirmar sua senha">
                                            <label for="confirm_password">Confirmar senha:</label>
                                        </div>
                                    </div>
                                   
                                    <div class="col-8">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Cadastro</button>
                                    </div>

                                    <p>Quer encontrar as melhores vagas de emprego? <a href="{{ url('cadastro/pessoa') }}">Clique aqui</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection