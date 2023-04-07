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
                        <h4 class="card-header">Detalhes do Currículo</h4>
                        <!-- Account -->
                        @if(session('message'))
                        <div class="mx-3">
                            <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
                        </div>
                        @endif
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ $formEdit->user->photo == NULL ? url('admin/img/avatars/default.png') : asset($formEdit->user->photo) }}" alt="{{ $formEdit->user->name }}" class="d-block rounded" height="140" width="140" />

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-user'></i> Nome Completo:</h5>
                                    <p class="fs-5"><?= $formEdit->user->name; ?></p>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-envelope'></i> E-mail:</h5>
                                    <p class="fs-5"><?= $formEdit->user->email; ?></p>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-envelope'></i>Assunto:</h5>
                                    <p class="fs-5"><?= $formEdit->subject; ?></p>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-file'></i> Mensagem:</h5>
                                    <p class="fs-5"><?= $formEdit->message; ?></p>
                                </div>

                                <form action="{{ url('/admin/contato/'.$formEdit->id.'/editar') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 col-md-12">
                                        <h5 class="text-primary fw-bold d-flex"> <i class='bx bx-file'></i> Resposta:</h5>
                                        <textarea name="response" class="form-control" id="basic-default-message" placeholder="Insira aqui a resposta a mensagem" cols="30" rows="10"><?= $formEdit->response; ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                </form>
                            </div>

                        </div>

                        <!-- /Account -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection