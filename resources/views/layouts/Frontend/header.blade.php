<!-- Topbar Start -->
<?php
$segments = \Request::segments();
?>
<div class="container-fluid bg-dark px-5 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>Yaoundé, CMR</small>
                <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+237 693 93 10 10</small>
                <small class="text-light"><i class="fa fa-envelope-open me-2"></i>zeukengestelle@gmail.com</small>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://twitter.com/EssyTelle"><i class="fab fa-twitter fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.linkedin.com/in/estelle-zeukeng-9b2391b8/"><i class="fab fa-linkedin-in fw-normal"></i></a>
                {{--<a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>--}}
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->
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
                <a href="{{route('welcome')}}" class="nav-item nav-link @if(count($segments) == 0) active @endif">Accueil</a>
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
                    <a href="{{route('books')}}" class="nav-link @if(isset ($segments[0]) && ($segments[0] === 'books-list' || $segments[0] === 'books')) active @endif">Livres</a>
                </div>
                {{-- <a href="#" class="nav-item nav-link">Contact</a>--}}
            </div>
            {{--<button type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>--}}

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                    style="margin-left: 13px; border-radius: 21px">
                Faire un don
            </button>
        </div>
    </nav>


    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{asset('frontend/assets/img/carousel-12.jpg')}}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Apprentissage - Pratique - Partage</h5>
                        <h1 class="text-white mb-md-4 animated zoomIn">Découvrez mon parcours d'apprentissage, apprenons ensemble</h1>
                        {{--<a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contactez-moi</a>--}}
                    </div>
                </div>
            </div>
        </div>
        {{-- <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                 data-bs-slide="prev">
             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
             <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                 data-bs-slide="next">
             <span class="carousel-control-next-icon" aria-hidden="true"></span>
             <span class="visually-hidden">Next</span>
         </button>--}}
    </div>
</div>
<!-- Navbar & Carousel End -->

<!-- Full Screen Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
            <div class="modal-header border-0">
                <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <div class="input-group" style="max-width: 600px;">
                    <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                    <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Full Screen Search End -->

<!-- Modal donate -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Faire un don</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="donate-form" action="{{route("donate")}}">
                    @csrf
                    <div class="row text-justify p-2">
                        <h6><i class="bi bi-exclamation-triangle" style="color: orange;"></i> Les dons se font en <strong>XAF</strong> via le paiement mobile Orange Money (OM) ou Mobile Money (MoMo)</h6>
                    </div>
                    <div class="col-md-12">
                        <label for="donator-name" class="form-label">Nom(s) et prénom(s) <span class="red-text">*</span></label>
                        <input type="text" class="form-control" id="donator-name" name="donator_name" placeholder="Ex: Estelle Zeukeng" required>
                    </div>
                    <div class="col-md-12">
                        <label for="donator-phone" class="form-label">Numéro de téléphone <span class="red-text">*</span></label>
                        <input type="number" class="form-control" id="donator-phone" name="donator_phone" placeholder="Ex: 699999999" required>
                    </div>
                    <div class="col-md-12">
                        <label for="donator-mail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="donator-mail" name="donator_mail" placeholder="Ex: example@gmail.com">
                    </div>
                    <div class="col-md-12">
                        <label for="donation-amount" class="form-label">Montant<span class="red-text">*</span></label>
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="Ex: 5000" name="donation_amount" id="donation-amount"
                                   aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                            <span class="input-group-text" id="basic-addon2">Frs CFA</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="donation-reason" class="form-label">Motif du don</label>
                        <textarea type="text" class="form-control" name="donation_reason" id="donation-reason" placeholder="Ex: Plus d'articles"></textarea>
                    </div>
                    <input type="hidden" id="checkStatus" data-url = "{{ route('check-donate-status') }}">
                    <div class="col-12 text-center">
                        <button type="button" id="donate" class="btn btn-primary">Payer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



