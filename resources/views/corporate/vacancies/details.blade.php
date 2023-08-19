@extends('corporate.layout')

@section('title', 'Detalhes da Vaga')

@section('content')


<div class="layout-page">
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h3 class="card-header text-center text-primary fw-bold mb-3 mt-3">
                            Detalhes da Vaga
                        </h3>
                        <!-- Account -->
                        @foreach($vacancy as $vac)

                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-5">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bxs-city'></i> Nome da Empresa:</h5>
                                    <p class="fs-5"><?= $vac->company->name; ?></p>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-category'></i> Categoria:</h5>
                                    <p class="fs-5"><?= $vac->category->title; ?></p>
                                </div>

                                <div class="mb-3 col-md-3">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-error-circle'></i> Situação:</h5>
                                    <p class="fs-5"><?= $vac->situation; ?></p>
                                </div>


                                <div class="mb-3 col-md-5">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-money'></i> Salario Incial:</h5>
                                    <p class="fs-5"><?= $vac->salary_intro; ?></p>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-money'></i> Salario Final:</h5>
                                    <p class="fs-5"><?= $vac->salary_intro; ?></p>
                                </div>

                                <div class="mb-3 col-md-3">
                                    <h5 class="text-primary fw-bold d-flex"><i class='bx bx-map-pin' ></i> Localização:</h5>
                                    <p class="fs-5"><?= $vac->localization; ?></p>
                                </div>


                                <div class="mb-3 col-md-5">
                                    <h5 class="text-primary fw-bold d-flex"><i class='bx bxs-bar-chart-alt-2' ></i> Quantidade:</h5>
                                    <p class="fs-5"><?= $vac->quantity; ?></p>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-food-menu'></i> Modelo:</h5>
                                    <p class="fs-5"><?= $vac->model; ?></p>
                                </div>

                                <div class="mb-3 col-md-3">
                                    <h5 class="text-primary fw-bold d-flex"><i class='bx bx-alarm'></i> Tempo:</h5>
                                    <p class="fs-5"><?= $vac->time; ?></p>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <h5 class="text-primary fw-bold d-flex"><i class='bx bx-file'></i> Contrato:</h5>
                                    <p class="fs-5"><?= $vac->hiring_type; ?></p>
                                </div>

                                

                                <div class="mb-3 col-md-12">
                                    <h5 class="text-primary fw-bold d-flex"><i class='bx bx-detail'></i> Descrição:</h5>
                                    <p class="fs-5"><?= $vac->description; ?></p>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <h5 class="text-primary fw-bold d-flex"><i class='bx bx-list-ul'></i> Qualificação:</h5>
                                    <p class="fs-5"><?= $vac->qualifications; ?></p>
                                </div>

                            </div>

                            <div class="d-flex justify-content-center align-items-center">
                                <div class="mb-3 col-md-5">
                                    <a href="{{ $applicationsCount > 0 ? url('/corporativo/vaga/aplicacoes/'.base64_encode($vac->id)) : '#'  }}" aria-disabled="true"><button class="btn btn-primary fw-bold fs-4" {{ $applicationsCount > 0 ? '' : 'disabled'  }}> Ver aplicações <span class="bg-white text-primary p-1 rounded">{{ $applicationsCount }}</span></button></a>
                                </div>
                            </div>

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