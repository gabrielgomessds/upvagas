@extends('admin.layout')

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
                        <h4 class="card-header">Detalhes da Empresa</h4>
                        <!-- Account -->
                        @foreach($company as $comp)
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ $comp->user->photo == NULL ? url('admin/img/avatars/default.png') : asset($comp->user->photo) }}" alt="{{ $comp->user->name }}" class="d-block rounded" height="140" width="140" />

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-user'></i> Nome Completo:</h5>
                                    <p class="fs-5"><?= $comp->user->name; ?></p>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-envelope'></i> E-mail:</h5>
                                    <p class="fs-5"><?= $comp->user->email; ?></p>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-buildings' ></i> Nome da Empresa:</h5>
                                    <p class="fs-5"><?= $comp->name; ?></p>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-detail'></i> Sobre:</h5>
                                    <p class="fs-5"><?= $comp->about; ?></p>
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