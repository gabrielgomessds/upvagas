@extends('.base')

@section('title', 'Categorias')

@section('content')

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

@endsection