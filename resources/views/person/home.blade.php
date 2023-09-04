@extends('person.layout')

@section('title', 'Dashboard Usuário')

@section('content')
      <div class="layout-page">
         <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
           
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Buscar Vagas..."
                  aria-label="Search..." />
              </div>
            </div>

          </div>
        </nav>

        <div class="content-wrapper">

          <div class="container-xxl flex-grow-1 container-p-y">
         
            <div class="row">

               <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                      <h5 class="m-0 me-2">Vagas que você se candidatou</h5>
                      <small class="text-muted"></small>
                    </div>
                   
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      
                    </div>
                    <ul class="p-0 m-0">
                    @foreach($userApplications as $app)
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="avatar-initial rounded bg-label-primary">
                            <img src="{{ $app->vacancies->company->logo }}" width="40px" class="rounded-2" alt="{{$app->vacancies->title}}">
                          </span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">{{ mb_strimwidth($app->vacancies->title,0,20,'...') }}</h6>
                            <small class="text-muted">{{ $app->vacancies->company->name }}</small>
                          </div>
                          <div class="user-progress">
                            <small class="fw-semibold"><a class="{{ $app->vacancies->situation == 'open' ? 'text-primary' : 'text-danger' }}" href="#">Ver mais</a></small>
                          </div>
                        </div>
                      </li>
                     @endforeach
                      
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                      <h5 class="m-0 me-2 mb-3">Vagas que você se candidatou</h5>
                      <small class="text-muted"></small>
                    </div>
                   
                  </div>
                  <div class="card-body">
                    
                    <ul class="p-0 m-0">
                    @if(empty($recommended))
                      <span>Você não possui vagas recomendadas no momento</span>
                    @else
                    @foreach($recommended as $app)
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="avatar-initial rounded bg-label-primary">
                            <img src="{{ $app->company->logo == NULL ? asset('img/company_default.png') : $app->company->logo }}" width="40px" class="rounded-2" alt="{{$app->title}}">
                          </span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">{{ mb_strimwidth($app->title,0,20,'...') }}</h6>
                            <small class="text-muted">{{ $app->company->name }}</small>
                          </div>
                          <div class="user-progress">
                            <small class="fw-semibold"><a class="{{ $app->situation == 'open' ? 'text-primary' : 'text-danger' }}" href="#">Ver mais</a></small>
                          </div>
                        </div>
                      </li>
                     @endforeach
                     @endif
                      
                    </ul>
                  </div>
                </div>
              </div>

            </div>
          </div>
        
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                © Gomess Produções +
                <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
              </div>
        
            </div>
          </footer>

          <div class="content-backdrop fade"></div>
        </div>
      </div>

      @endsection