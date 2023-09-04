@extends('corporate.layout')

@section('title', 'Curriculo')

@section('content')


<div class="layout-page">
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        @if($application->situation != 'sent')
                        <div class="mx-3 mt-3">
                            <h5 class="alert alert-success mb-2 text-center">Esse candidato foi <b class="fs-5"><u>{{ $application->situation == 'accepted' ? 'aceito' : 'recusado'  }}</u></b> nessa vaga</h5>
                        </div>
                        @endif
                        <!-- Account -->
                        @foreach($resume as $res)
                        <h4 class="card-header">Detalhes do Currículo / Vaga de <b class="text-primary">{{$vacancy->title}}</b> na <b class="text-primary">{{$vacancy->company->name}}</b></h4>
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ $res->user->photo == NULL ? url('admin/img/avatars/default.png') : asset($res->user->photo) }}" alt="{{ $res->user->name }}" class="d-block rounded" height="140" width="140" />

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-user'></i> Nome Completo:</h5>
                                    <p class="fs-5"><?= $res->user->name; ?></p>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-envelope'></i> E-mail:</h5>
                                    <p class="fs-5"><?= $res->user->email; ?></p>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-phone'></i> Telefone:</h5>
                                    <p class="fs-5"><?= $res->phone; ?></p>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-map-pin'></i> Localização:</h5>
                                    <p class="fs-5"><?= $res->localization; ?></p>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bxs-graduation'></i> Formações:</h5>
                                    <p class="fs-5"><?= $res->description; ?></p>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-file'></i> Descrição:</h5>
                                    <p class="fs-5"><?= $res->description; ?></p>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-detail'></i> Qualificações:</h5>
                                    <p class="fs-5"><?= $res->qualifications; ?></p>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-list-ul'></i> Habilidades:</h5>
                                    <p class="fs-5"><?= $res->skills; ?></p>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bxs-city'></i> Experiências:</h5>
                                    <p class="fs-5"><?= $res->experience; ?></p>
                                </div>

                            </div>

                            @if($application->situation == 'sent')
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="mb-3 col-md-5">
                                        <a href="{{ '/corporativo/vaga/aplicacoes/curriculo/'.base64_encode($application->id).'/aceitar' }}"><button class="btn btn-primary fw-bold fs-4"> Aceitar </button></a>
                                        <a href="{{ '/corporativo/vaga/aplicacoes/curriculo/'.base64_encode($application->id).'/recusar' }}"><button class="btn btn-danger fw-bold fs-4"> Recusar </button></a>
                                    </div>
                                </div>
                            @endif

                        </div>
                        @endforeach
                        <!-- /Account -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection