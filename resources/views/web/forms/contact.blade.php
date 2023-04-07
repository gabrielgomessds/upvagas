@extends('.base')

@section('title', 'Contato')

@section('content')

<div class="py-5" style="margin-bottom: 100px;">
    <div class="container ">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Entrar em contato</h1>
        <div class="row g-4">
            @if(session('message'))
            <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
            @endif
            <div class="col-md-12 mb-4 d-flex justify-content-center align-items-center">
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                    <form action="{{ url('/contato') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Digite seu nome">
                                    <label for="name">Seu Nome</label>
                                    @error('name') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu e-mail">
                                    <label for="email">Seu Email</label>
                                    @error('email') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto da mensagem">
                                    <label for="subject">Assunto</label>
                                    @error('subject') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="message" placeholder="Escreva sua mensagem aqui" id="message" style="height: 150px"></textarea>
                                    <label for="message">Mensagem</label>
                                    @error('message') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Enviar mensagem</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection