@extends('.base')

@section('content')

<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="img/carousel-1.jpg" class="d-block w-100" alt="..." style="filter: brightness(50%);">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                        style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-8 col-lg-8 ms-5">
                                    <h1 class="display-3 text-white animated slideInDown mb-4 ">Encontre o emprego perfeito que você merece</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Encontre o emprego dos seus sonhos em nosso site, com uma ampla variedade de vagas disponíveis em diversas áreas e níveis de experiência.</p>
                                    <a href="{{ url('cadastro/usuario') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Buscar Vagas</a>
                                    <a href="{{ url('cadastro/empresa') }}" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Encontrar talentos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="2000">
                    <img src="img/carousel-2.jpg" class="d-block w-100" alt="..." style="filter: brightness(50%);">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                        style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-8 col-lg-8 ms-5">
                                    <h1 class="display-3 text-white animated slideInDown mb-4 ">Encontramos os melhores talentos</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">
                                        Encontre os melhores talentos para sua empresa em nosso site, 
                                        com uma variedade de currículos qualificados e experientes, 
                                        prontos para impulsionar o sucesso de sua empresa.
                                        </p>
                                    <a href="{{ url('cadastro/usuario') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated">Buscar Vagas</a>
                                    <a href="{{ url('cadastro/empresa') }}" class="btn btn-secondary py-md-3 px-md-5 animated">Encontrar talentos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 45px;">
            <div class="container">
            <form action="{{ url('buscar/vagas') }}" method="POST">
            @csrf
                <div class="row g-2">
                    
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <input type="text" name="key_words" class="form-control border-0" placeholder="Palavras-chave. Ex: Cuidadora de Idosos" />
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="localization" class="form-control border-0" placeholder="Localização. Ex: Fortaleza, CE" />
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0" name="category">
                                    <option selected disabled>Esolha uma categoria</option>

                                    @foreach($categories as $category)
                                        <option value="{{$category->slug}}">{{$category->title}}</option>
                                    @endforeach

                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark border-0 w-100">Buscar</button>
                    </div>
                    
                </div>
                </form>
            </div>
        </div>

        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore Nossas Categorias</h1>
                <div class="row g-4">

                @foreach($categories as $category)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="{{ url('categoria/'.$category->slug.'/vagas') }}">
                            <i class="{{ $category->icon }} text-primary mb-4 icon_size_1"></i>
                            <h6 class="mb-3">{{ $category->title }}</h6>
                            <p class="mb-0">{{ $category->vacancies()->count() }} Vagas</p>
                        </a>
                    </div>
                @endforeach
                   
                </div>
            </div>
           
        </div>

        <div class="container-xxl py-2">
            <div class="container">
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">                           
                            <a class="btn btn-primary py-3 px-5" href="{{ url('categorias') }}">Ver mais categorias</a>
                        </div>
                        </div>
                    </div>
                </div>
        </div>
        
    
        <!-- Category End -->


        <!-- About Start -->
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
        <!-- About End -->


        <!-- Jobs Start -->
        <div class="container-xxl">
        <div class="py-5" style="margin-bottom: 110px;margin-top: 50px;">
    <div class="container">
                <h2 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Últimas vagas adicionadas</h2>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-popular" role="tabpanel"
                            aria-labelledby="nav-popular-tab">

                            @foreach($vacancies as $vacancy)

                            <div class="job-item p-4 mb-4 ">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="{{ $vacancy->company->logo }}"
                                            alt="" style="width: 110px; height: 100px;">
                                        <div class="text-start ps-4">

                                            <div class="mb-3">
                                                <h5>{{$vacancy->title}}</h5>
                                                    <small>{{$vacancy->company->name}}</small>
                                            </div>
                                           
                                            <span class="text-truncate me-3"><i
                                                    class="fa fa-map-marker-alt {{ $vacancy->situation == 'open' ? 'text-primary' : 'text-danger' }} me-2"></i>{{ $vacancy->localization }}</span>
                                            <span class="text-truncate me-3"><i
                                                    class="far fa-clock {{ $vacancy->situation == 'open' ? 'text-primary' : 'text-danger' }} me-2"></i>{{ ucfirst($vacancy->time) }}</span>
                                            <span class="text-truncate me-0"><i
                                                    class="far fa-money-bill-alt {{ $vacancy->situation == 'open' ? 'text-primary' : 'text-danger' }} me-2"></i>
                                                    {{ $vacancy->salary_intro }} - {{ $vacancy->salary_final }}</span>
                                        </div>
                                    </div>
                                    <div
                                        class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">

                                            <a class="btn {{ $vacancy->situation == 'open' ? 'btn-primary' : 'btn-danger' }}" href="{{ url('vaga/'.$vacancy->slug) }}">Aplicar Agora</a>
                                        </div>

                                        <small class="text-truncate d-flex ">
                                        <span class="text-truncate me-3"><i
                                                    class="far fa-clock {{ $vacancy->situation == 'open' ? 'text-primary' : 'text-danger' }} me-2"></i>{{ date('d/m/Y', strtotime($vacancy->created_at)) }}</span>
                                            <span class="text-truncate me-3"><i
                                                    class="bi bi-record-fill {{ $vacancy->situation == 'open' ? 'text-primary' : 'text-danger' }}  me-1"></i>
                                                    <b class="fs-6">{{ $vacancy->situation == 'open' ? 'Aberta' : 'Fechada' }}</b> 
                                                </span>
                                            
                                            
                                        </small>
                                        
                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div>

                       
                        <div class="container-xxl py-2">
                    <div class="container">
                        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane fade show p-0 active">                           
                                    <a class="btn btn-primary py-3 px-5" href="{{ url('vagas') }}">Ver mais vagas</a>
                                </div>
                                </div>
                            </div>
                        </div>
                </div>
                    </div>
                </div>
            </div>
    </div>
                
            </div>
        </div>
        <!-- Jobs End -->


        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <h1 class="text-center mb-5">O que nossos clientes dizem</h1>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                            diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                            diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                            diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                            diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-4.jpg"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

        @endsection