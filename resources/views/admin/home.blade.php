@extends('admin.layout')

@section('title', 'Dashboard Admin')

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
              <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                  
                  <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                              <i class='bx bx-user rounded icon_card_conf'></i>
                          </div>
                          <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                              <a class="dropdown-item" href="javascript:void(0);">Ver mais</a>
                            </div>
                          </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Usuários</span>
                        <h3 class="card-title mb-2">Total: {{$count['users']}}</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <i class='bx bx-category-alt rounded icon_card_conf'></i>
                          </div>
                          <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                              <a class="dropdown-item" href="javascript:void(0);">Ver mais</a>
                            </div>
                          </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Categorias</span>
                        <h3 class="card-title mb-2">Total: {{$count['categories']}}</h3>
                      
                    </div>
                    </div>
                  </div>
                </div>
              </div>
             
              <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                <div class="row">
                  <div class="col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <i class="bx bx-layer icon_card_conf rounded"></i>
                          </div>
                          <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                              <a class="dropdown-item" href="javascript:void(0);">Ver mais</a>
                            </div>
                          </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Vagas</span>
                        <h3 class="card-title mb-2">Total: {{$count['vacancies']}}</h3>
                  

                      </div>


                    </div>
                  </div>
                  <div class="col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                              <i class="bx bxs-city icon_card_conf rounded"></i>
                          </div>
                          <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="cardOpt1">
                              <a class="dropdown-item" href="javascript:void(0);">Ver mais</a>
                            </div>
                          </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Empresas</span>
                        <h3 class="card-title mb-2">Total: {{$count['companys']}}</h3>
                      </div>
                    </div>
                  </div>
            
                </div>
              </div>

              
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                      <h5 class="m-0 me-2">Categorias</h5>
                      <small class="text-muted"></small>
                    </div>
                    
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      
                    </div>
                    <ul class="p-0 m-0">
                    @foreach($categories as $category)
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="avatar-initial rounded bg-label-primary">
                            <span class="avatar-initial rounded bg-label-success">
                              <i class="{{$category->icon}}" style="font-size:18px;"></i>
                            </span>
                          </span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">{{$category->title}}</h6>
                            <small class="text-muted">{{ mb_strimwidth($category->slug,0,20,'...') }}</small>
                          </div>
                          <div class="user-progress">
                            <small class="fw-semibold"><a href="#">Ver mais</a></small>
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
                      <h5 class="m-0 me-2">Empresas</h5>
                      <small class="text-muted"></small>
                    </div>
                    
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      
                    </div>
                    <ul class="p-0 m-0">

                    @foreach($companys as $company)
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="avatar-initial rounded bg-label-primary">
                            <img src="{{$company->logo}}" width="40px" class="rounded-2" alt="{{$company->name}}">
                          </span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">{{$company->name}}</h6>
                            <small class="text-muted">{{ mb_strimwidth($company->about,0,20,'...') }}</small>
                          </div>
                          <div class="user-progress">
                            <small class="fw-semibold"><a href="#">Ver mais</a></small>
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
                      <h5 class="m-0 me-2">Vagas</h5>
                      <small class="text-muted"></small>
                    </div>
                   
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      
                    </div>
                    <ul class="p-0 m-0">
                    @foreach($vacancies as $vacancy)
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="avatar-initial rounded bg-label-primary">
                            <img src="{{ $vacancy->company->logo }}" width="40px" class="rounded-2" alt="{{$vacancy->title}}">
                          </span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">{{ mb_strimwidth($vacancy->title,0,20,'...') }}</h6>
                            <small class="text-muted">{{ $vacancy->company->name }}</small>
                          </div>
                          <div class="user-progress">
                            <small class="fw-semibold"><a class="{{ $vacancy->situation == 'open' ? 'text-primary' : 'text-danger' }}" href="#">Ver mais</a></small>
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
                      <h5 class="m-0 me-2">Usuários</h5>
                      <small class="text-muted"></small>
                    </div>
                  
                  </div>
                  <div class="card-body mt-3">
                   
                    <ul class="p-0 m-0">
                    @foreach($users as $user)
                      <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="avatar-initial rounded bg-label-primary">
                            <img src="{{ $user->photo }}" width="40px" class="rounded-2" alt="{{$user->name}}">
                          </span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">{{ $user->name }}</h6>
                            <small class="text-muted">{{  $user->type }}</small>
                          </div>
                          <div class="user-progress">
                            <small class="fw-semibold"><a href="#">Ver mais</a></small>
                          </div>
                        </div>
                      </li>
                     @endforeach
                      
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