@extends('.base')

@section('title', 'Sobre')

@section('content')

<div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row g-0 about-bg rounded overflow-hidden">
                            <div class="col-6 text-start">
                                <img class="img-fluid w-100" src="img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid" src="img/about-2.jpg" style="width: 85%; margin-top: 15%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid" src="img/about-3.jpg" style="width: 85%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid w-100" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">Ajudamos sua empresa a conseguir os melhores talentos</h1>
                        <p class="mb-4">Temos um banco de talentos repleto de pessoas com grandes habilidade. Ajudamos essas pessoas a encontrarem sua empresa</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Os melhores talentos para sua empresa</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Pessoas que ajudam seu negócio</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Busque freelancer também</p>
                        <div id="tab-1" class="tab-pane fade show p-0 active">                           
                            <a class="btn btn-primary py-3 px-5" href="{{ url('cadastro/empresa') }}">Buscar talentos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection