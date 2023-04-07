@extends('.base')

@section('title', 'Últimas vagas adicionadas')

@section('content')
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

                       
                        <div class="conteiner-pagination">
                            {{ $vacancies->links('vendor.pagination') }}
                        </div>

                    </div>
                </div>
            </div>
    </div>
@endsection
