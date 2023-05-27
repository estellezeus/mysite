@extends('layouts.Frontend.app')

@section('content')
    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="#" class="navbar-brand p-0">
                <h1 class="m-0">Estelle Zeukeng</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{route('welcome')}}" class="nav-item nav-link @if($segments === '') active @endif">Accueil</a>
                    {{--<a href="#" class="nav-item nav-link">A propos</a>
                    <a href="#" class="nav-item nav-link">Domaines d'apprentissage</a>--}}
                    {{--<div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
                        <div class="dropdown-menu m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="detail.html" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div>--}}
                    <div class="nav-item dropdown active">
                        <a href="{{route('books')}}" class="nav-link @if($segments === 'books-list' || $segments === 'books') active @endif">Livres</a>
                    </div>
                    {{-- <a href="#" class="nav-item nav-link">Contact</a>--}}
                </div>
                <button type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
            </div>
        </nav>
        <div class="container-fluid bg-primary py-5 bg-header__books" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Mes livres</h1>
                    <a href="{{route('welcome')}}" class="h5 text-white">Accueil</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="{{route('books')}}" class="h5 text-white">Mes livres lus</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="#" class="h5 breadcrumb-book-detail">{{$book->title}}</a>
                </div>
            </div>
        </div>

    </div>
    <!-- Navbar & Carousel End -->
    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5" src="{{ asset("storage/books/".$book->image) }}" alt="">
                        <h1 class="mb-4">{{$book->title}}</h1>
                        <p>{!! $book->summary !!}</p>
                    </div>
                    <!-- Blog Detail End -->

                    <!-- Comment List Start -->
                   {{-- <div class="mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">3 Comments</h3>
                        </div>
                        <div class="d-flex mb-4">
                            <img src="img/user.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                                <button class="btn btn-sm btn-light">Reply</button>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <img src="img/user.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                                <button class="btn btn-sm btn-light">Reply</button>
                            </div>
                        </div>
                        <div class="d-flex ms-5 mb-4">
                            <img src="img/user.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                                <button class="btn btn-sm btn-light">Reply</button>
                            </div>
                        </div>
                    </div>--}}
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    {{--<div class="bg-light rounded p-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Leave A Comment</h3>
                        </div>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-white border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-white border-0" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control bg-white border-0" placeholder="Website" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-white border-0" rows="5" placeholder="Comment"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Leave Your Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>--}}
                    <!-- Comment Form End -->
                </div>

                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Search Form Start -->
                   {{-- <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="input-group">
                            <input type="text" class="form-control p-3" placeholder="Keyword">
                            <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>--}}
                    <!-- Search Form End -->

                    <!-- Category Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Catégories</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            @forelse($categories as $category)
                            <a class="h5 fw-semi-bold bg-light rounded-25 py-2 px-3 mb-2" href="#">
                                <i class="bi bi-arrow-right me-2"></i>{{$category->name}} - <span class="badge-pill badge-primary">{{count($category->books)}}</span></a>
                                @empty
                                <h5>Aucune catégorie enregistrée</h5>
                            @endforelse
                        </div>
                    </div>
                    <!-- Category End -->

                    <!-- Recent Post Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">De la même catégorie</h3>
                        </div>
                        @forelse($books as $b)
                            @if($b->id !== $book->id)
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="{{ asset("public/storage/books/".$b->image) }}" style="width: auto; height: 100px; object-fit: cover;" alt="">
                            <a href="{{route('book-details', $b->id)}}" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0" style="width:100%">
                                {{$b->title}}
                            </a>
                        </div>
                            @endif
                        @empty
                            <h4>Aucun livre de la même catégorie</h4>
                            @endforelse
                    </div>
                    <!-- Recent Post End -->

                    <!-- Image Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <img src="img/blog-1.jpg" alt="" class="img-fluid rounded">
                    </div>
                    <!-- Image End -->

                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->

@endsection
