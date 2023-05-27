@extends('layouts.Frontend.app')

@section('css')
    <style>

    </style>
    @endsection
@section('content')
    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="{{route('welcome')}}" class="navbar-brand p-0">
                <h1 class="m-0" style="color: var(--primary);">Estelle Zeukeng</h1>
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
                    <div class="nav-item dropdown">
                        <a href="{{route('books')}}" class="nav-link @if($segments === 'books-list') active @endif" style="color: var(--primary);">Livres</a>
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
                    <a href="#" class="h5 text-white">Mes livres lus</a>
                </div>
            </div>
        </div>

    </div>
    <!-- Navbar & Carousel End -->

    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-8">
                    <div class="row g-5">
                        @forelse($books as $book)
                        <div class="col-md-6 wow slideInUp" data-wow-delay="0.1s">
                            <div class="blog-item bg-light rounded-15 overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="{{ asset("storage/books/".$book->image) }}" alt="">
                                    <a class="position-absolute top-0 start-0 bg-primary text-white rounded-19-end mt-5 py-2 px-4" href="">{{$book->category->name}}</a>
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small style="margin-right: 30px;">
                                            <i class="far fa-calendar-alt text-primary me-2" style="margin-right: 10px;">
                                            </i>
                                            {{ \Carbon\Carbon::parse($book->created_at)->format('d-m-Y')}}
                                        </small>
                                        <small class="me-3"><i class="far fa-user text-primary me-2"></i>{{$book->author}}</small>
                                    </div>
                                    <h4 class="mb-3">{{$book->title}}</h4>
                                    <a href="{{route('book-details', $book->id)}}">Lire le résumé <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                            @empty
                            <h6>Aucun livre enregistré</h6>
                        @endforelse
                    </div>
                </div>
                <!-- Blog list End -->

                <!-- Sidebar Start -->
                <div class="col-lg-4">

                    <!-- Category Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Categories</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            @forelse($categories as $category)
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#">
                                <i class="bi bi-arrow-right me-2"></i>
                                {{$category-> name}} - {{count($category->books)}}
                            </a>
                                @empty
                                <h6>Aucune catégorie enregistrée pour l'instant</h6>
                            @endforelse
                        </div>
                    </div>
                    <!-- Category End -->


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
