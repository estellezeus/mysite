@extends('layouts/Frontend/app')

@section('css')
    <style>
        .rounded-15{
            border-radius: 15px;
        }
        .rounded-19-end{
            border-top-right-radius: 18px;
            border-bottom-right-radius: 18px ;
        }
    </style>
    @endsection

@section('content')

    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded-15 mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Domaines d'apprentissage</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">3</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded-15 mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-check text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-primary mb-0">Projets réalisés</h5>
                            <h1 class="mb-0" data-toggle="counter-up">2</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded-15 mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-award text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Certifications</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">3</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts Start -->


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">A propos de moi</h5>
                        <h1 class="mb-0">Apprendre, apprendre, pratiquer</h1>
                    </div>
                    <p class="mb-4">
                        Je m'appelle Estelle. Je suis développeur web.
                        Je me suis découverte un intérêt pour l'analyse de données, domaine que j'explore de façon personnelle avec les ressources en ligne. Mon objectif est de devenir une experte dans ce domaine,
                        apportant de la plus-value aux entreprises grâce aux traitements de leurs données et l'intégration des nouvelles technologies.
                        Je travaille à développer mes connaissances dans les domaines ci-dessous:

                    </p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-3"></i>HTML 5, CSS 3, Bootstrap, Javascript, JQuery</h6>
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-3"></i>PHP, Laravel</h6>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-3"></i>SQL</h6>
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Power BI, Excel</h6>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Communication, Résolution des problèmes</h6>

                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Design thinking, Scrum</h6>
                        </div>
                    </div>
                </div>
                {{--<div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded-15 wow zoomIn" data-wow-delay="0.9s" src="{{asset('public/frontend/assets/img/about.jpg')}}" style="object-fit: cover;">
                    </div>
                </div>--}}
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Features Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Objectifs du site</h5>
                <h1 class="mb-0">Partager, apprendre</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                            <div class="bg-primary rounded-15 d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-cubes text-white"></i>
                            </div>
                            <h4>Apprendre</h4>
                            <p class="mb-0">
                                Apprendre des meilleurs à travers les ressources disponibles en ligne (livres, cours en ligne, vidéos,
                                séminaires, webinaire, etc.), à travers le partage d'expérience.
                            </p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.6s">
                            <div class="bg-primary rounded-15 d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-award text-white"></i>
                            </div>
                            <h4>Partager</h4>
                            <p class="mb-0">
                                Partager mes connaissances (articles sur mon blog, résumé des livres lus) pour en faire profiter le plus grand nombre et pour asseoir davantage
                                ces connaissances.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded-15 wow zoomIn" data-wow-delay="0.1s"
                             src="{{asset('frontend/assets/img/estelle_Learning.png')}}" style="object-fit: contain;">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.4s">
                            <div class="bg-primary rounded-15 d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-users-cog text-white"></i>
                            </div>
                            <h4>Exposer</h4>
                            <p class="mb-0">
                                Exposer mes différents projets pour recevoir des critiques constructives et pouvoir m'améliorer
                                au quotidien. Les projets seront relatifs aux trois domaines d'apprentissage listés plus haut.
                            </p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.8s">
                            <div class="bg-primary rounded-15 d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <h4>Discuter</h4>
                            <p class="mb-0">
                                Apporter ma contribution, mon aide, à qui la sollicitera. Je suis disponible pour répondre aux questions,
                                pour participer à des projets dans mes différents domaines d'apprentissage.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features Start -->


    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Domaines d'apprentissage</h5>
                <h1 class="mb-0">Mes domaines d'intérêt</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                    <div class="service-item bg-light rounded-15 d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-chart-pie text-white"></i>
                        </div>
                        <h4 class="mb-3">Analyse de données</h4>
                        <a class="btn btn-lg btn-primary rounded-15" href="#">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <div class="service-item bg-light rounded-15 d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-code text-white"></i>
                        </div>
                        <h4 class="mb-3">Développement web</h4>
                        <a class="btn btn-lg btn-primary rounded-15" href="#">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded-15 d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-shield-alt text-white"></i>
                        </div>
                        <h4 class="mb-3">Cyber Sécurité</h4>
                        <a class="btn btn-lg btn-primary rounded-15" href="#">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Quote Start -->
    {{--<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Request A Quote</h5>
                        <h1 class="mb-0">Need A Free Quote? Please Feel Free to Contact Us</h1>
                    </div>
                    <div class="row gx-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-4"><i class="fa fa-reply text-primary me-3"></i>Reply within 24 hours</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-4"><i class="fa fa-phone-alt text-primary me-3"></i>24 hrs telephone support</h5>
                        </div>
                    </div>
                    <p class="mb-4">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded-15" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="text-primary mb-0">+012 345 6789</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="bg-primary rounded-15 h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                        <form>
                            <div class="row g-3">
                                <div class="col-xl-12">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control bg-light border-0" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <select class="form-select bg-light border-0" style="height: 55px;">
                                        <option selected>Select A Service</option>
                                        <option value="1">Service 1</option>
                                        <option value="2">Service 2</option>
                                        <option value="3">Service 3</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-light border-0" rows="3" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Request A Quote</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <!-- Quote End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Livres</h5>
                <h1 class="mb-0">Les derniers livres lus</h1>
            </div>
            <div class="row g-5">
                @forelse($last3Books as $book)
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="blog-item rounded-15 overflow-hidden" style="background-color: #ab92bf2e;">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset("storage/app/public/books/".$book->image) }}" alt="">
                            <a class="position-absolute top-0 start-0 bg-primary text-white rounded-19-end mt-5 py-2 px-4" href="">{{$book->category->name}}</a>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ \Carbon\Carbon::parse($book->created_at)->format('d-m-Y')}}</small>
                                <small class="me-3">
                                    <i class="far fa-user text-primary me-2" style="margin-left: 4em"></i>
                                    <strong>{{$book->author}}</strong></small>
                            </div>
                            <h4 class="mb-3">{{$book->title}}</h4>
                            <a class="" href="{{route('book-details', $book->id)}}">
                                <strong>
                                    Lire le résumé <i class="bi bi-arrow-right"></i>
                                </strong>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                    <h4>Aucun livre lu ce mois</h4>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Blog Start -->


    <!-- Vendor Start - Different tools I am learning -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 mb-5">
            <div class="bg-white">
                <div class="owl-carousel vendor-carousel">
                    <a href="https://www.credly.com/badges/ea890d20-8fc3-4584-b33b-f00f76a3acda/public_url">
                        <img src="{{asset('frontend/assets/img/google-data-analytics-certificate.2.png')}}" alt="">
                    </a>
                    <a href="https://www.credly.com/badges/25c4193c-a619-48ad-a578-178520565402/public_url">
                        <img src="{{asset('frontend/assets/img/microsoft-certified-azure-data-fundamentals.png')}}" alt="estelle-data-badge">
                    </a>
                    <a href="https://www.credly.com/badges/5a5a3e91-4f0a-4ddc-b566-16b9e308400b/public_url">
                        <img src="{{asset('frontend/assets/img/microsoft-certified-azure-fundamentals.png')}}" alt="estelle-az900-badge">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
@endsection
