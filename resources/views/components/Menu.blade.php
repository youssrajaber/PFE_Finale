<nav class="navbar navbar-expand-lg ">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img class="w-75" src="{{ asset('images/Logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler bg-toggel" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon white-color"></span>
        </button>

        <div class="collapse navbar-collapse collapse" id="navbarText" data-bs-toggle="collapse">

            <ul class="navbar-nav nv me-auto mb-2 mb-lg-0 mx-auto">
                <li class="nav-item ">
                    <a class="nav-link white-color fw-bold " href="/">HomePage</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link white-color fw-bold" href="#about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link white-color fw-bold" href="#service">Services</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class=" nav-link white-color fw-bold" href="{{ route('affichage') }}">Cart</a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link white-color fw-bold" href="#contact">Contact Us</a>
                </li>
            </ul>
            @guest
                <div class="d-flex nav-btn ">
                    <div class="me-2 btn ">
                        <a class="nav-link fw-bold" href="{{ route('login.show') }}">login</a>
                    </div>
                    <div class="ms-2  btn">
                        <a class="nav-link fw-bold" href="{{ route('login.create') }}">Sign up</a>
                    </div>
                </div>
            @endguest
            @auth
                <div class="d-flex align-items-center">
                    <!-- Scrollable modal -->
                    <!-- Button trigger modal -->

                    <div class="me-3 position-relative" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <a class="" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                            aria-controls="offcanvasExample">
                            <i class="fs-3 fa fa-shopping-basket gold-color" role="button"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">{{ $count }}</span>
                        </a>
                    </div>

                    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle gold-color" id="navbarDropdown" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="rounded-circle" style="width: 40px; height: 40px;"
                                    src="{{ asset('images/' . auth()->user()->image) }}" alt="">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end nv  bg-dark" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item white-color fw-bold"
                                        href="{{ route('details', [auth()->user()->email, auth()->user()->name]) }}">
                                        Profil
                                    </a>
                                </li>
                                @if (Auth::user())
                                    @if (Auth::user()->role === 'ADMIN')
                                        <li class="nav-item">
                                            <a class="dropdown-item white-color fw-bold"
                                                href="{{ route('ADM') }}">Dashboard</a>
                                        </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="dropdown-item white-color fw-bold"
                                            href="{{ route('affichage') }}">Cart</a>
                                    </li>
                                @endif

                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li><a class="dropdown-item white-color fw-bold" href="{{ route('logout') }}">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

    <div class="offcanvas-body">

        <div class="cart ">
            @if (isset($prod) && count($prod) > 0)

                <section class=" cart h-100 h-custom ">
                    <div class="container  h-100">
                        <div class=" py-4 row d-flex justify-content-center align-items-center h-100">
                            <div class="col-12">
                                <div class=" card-registration card-registration-2">
                                    <div class="card-body p-0">
                                        <div class="row g-0 ">
                                            <div class="col-lg-12">
                                                <div class="">
                                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                                        <h1 class="fw-bold mb-0 gold-color">Shopping Cart</h1>
                                                        <button type="button" class="btn-close text-reset"
                                                            data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                    </div>
                                                    <hr class="my-4 white-color">
                                                    @foreach ($prod as $prd)
                                                        <div
                                                            class="row mb-4 d-flex justify-content-between align-items-center">
                                                            <div class="col-4 ">
                                                                <img src="{{ asset('images/' . $prd->image) }}"
                                                                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                            </div>
                                                            <div class="col-4 ">

                                                                <h6 class="white-color mb-0">{{ $prd->nom }}
                                                                </h6>
                                                            </div>
                                                            <div class="col-4  ">
                                                                <h6 class="mb-0 white-color">{{ $prd->prix }}DH
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <hr class="my-4 white-color">
                                                    @endforeach
                                                    <div class="pt-5 ">
                                                        <h6 class="mb-0  fw-bold">
                                                            <a href="{{ route('affichage') }}" class="">
                                                                <i
                                                                    class="fas fa-long-arrow-alt-right  me-2  fw-bold"></i>
                                                                Go to cart
                                                            </a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @else
                <div class="alert alert-danger text-center">
                    There's no Product yet .
                </div>
            @endif
        </div>

    </div>
</div>
