@if ($paginator->hasPages())
        <div class="py-2 " data-wow-delay="0.4s">
            
                <div class="container d-flex justify-content-center align-items-center">
                    <div class="tab-class text-center wow fadeInUp" >
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-lg">
                               
                                @if ($paginator->onFirstPage())
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                @endif
                                   
                               

                                @foreach ($elements as $element)
                                    @if (is_string($element))
                                        <li class="page-item disabled "><a class="page-link" href="#">{{ $element }}</a></li>
                                    @endif
                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            @if ($page == $paginator->currentPage())
                                                <li class="page-item active"><a class="page-link ">{{ $page }}</a></li>
                                            @else
                                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                               
                               
                                @if ($paginator->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                @endif

                            </ul>

                        </nav>
                    </div>
                </div>
            </div>
 @endif