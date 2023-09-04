@extends('.base')

@section('title', 'Vaga de '.$vacancy->title)

@section('content')
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <img class="flex-shrink-0 img-fluid border rounded" src="{{ $vacancy->company->logo }}" alt="" style="width: 120px; height: 120px;">
                            <div class="text-start ps-4">
                                 <div class="mb-3">
                                        <h3>{{$vacancy->title}}</h3>
                                        <p>{{$vacancy->company->name}}</p>
                                    </div>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $vacancy->localization }}</span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ ucfirst($vacancy->time) }}</span>
                                <span class="text-truncate me-3"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $vacancy->salary_intro }} - {{ $vacancy->salary_final }}</span>
                                <span class="text-truncate me-0"><b class="{{ $vacancy->situation == 'open' ? 'text-primary' : 'text-danger' }} fs-5 fst-italic">( {{ $vacancy->situation == 'open' ? 'Aberta' : 'Fechada' }} )</b></span>

                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Descrição da Vaga</h4>
                            <p>{{ $vacancy->description }}</p>
                          
                            <h4 class="mb-3">Qualificações</h4>
                        
                            <ul class="list-unstyled">
                                @php
                                    $list = explode(';', $vacancy->qualifications);
                                @endphp
                                @foreach($list as $item)
                                    <li>
                                        <i class="fa fa-angle-right text-primary me-2"></i>
                                        {{ $item }}
                                   </li>
                                @endforeach
                            </ul>
                        </div>

                        @if($vacancy->situation == 'open')
                           
                            @if(!$application->isEmpty())
                                <h3 class="text-primary">Você já se candidatou para essa vaga</h3>
                            @elseif($application->isEmpty() && !empty(auth()->user()) && auth()->user()->type !== 'person')
                                <h3 class="text-primary">Sua conta não permite fazer candidaturas</h3>
                            @else
                            <div class="">
                                <form action="{{ url('/aplicar-vaga/'.base64_encode($vacancy->id)) }}" method="POST">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-8">
                                            <button class="btn btn-primary w-100 py-3 fs-4" type="submit">Aplicar Agora</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endif
                        @else
                            <div>
                                <h3 class="text-danger fst-italic">
                                    Essa vaga está fechada
                                </h3>
                            </div>
                        @endif
                        
                    </div>
        
                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Sumario</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Publicada em: {{ date('d/m/Y', strtotime($vacancy->created_at)) }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Quant. Vagas: {{ $vacancy->quantity}}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Nivel: {{ $vacancy->level}}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Aplicações: {{$vacancy->applications()->count()}} Pessoas</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Tempo: {{ ucfirst($vacancy->time) }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Sálario: R$ {{ $vacancy->salary_intro }} - R$ {{ $vacancy->salary_final }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Localização: {{ $vacancy->localization }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Modelo: {{ $vacancy->model }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Regime: {{ strtoupper($vacancy->hiring_type) }}</p>
                        </div>
                        <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Detalhes da Empresa</h4>
                            <p class="m-0">
                                {{ $vacancy->company->about }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection