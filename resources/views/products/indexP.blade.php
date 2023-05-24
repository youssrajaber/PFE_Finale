<x-master>
    {{-- Start Nav --}}
    {{-- <x-Menu khsna Nduwzo products d cart hnaaya !!!!! /> --}}
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img class="w-75" src="{{ asset('images/Logo.png') }}" alt="">
            </a>
            <button class="navbar-toggler bg-toggel" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon white-color"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav nv me-auto mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item ">
                        <a class="nav-link white-color fw-bold " href="{{ route('products') }}">HomePage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link white-color fw-bold" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link white-color fw-bold" href="#service">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link white-color fw-bold" href="{{ route('affichage') }}">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link white-color fw-bold" href="{{ route('contact') }}">Contact Us</a>
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
                            <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                                aria-controls="offcanvasExample">
                                <i class="fs-3 fa fa-shopping-basket gold-color" role="button"></i>
                            </a>
                            <i class="fs-3 fa fa-shopping-basket gold-color" role="button"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">9</span>
                        </div>
                        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle gold-color" id="navbarDropdown" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                    <li><a class="dropdown-item white-color fw-bold"
                                            href="{{ route('logout') }}">Logout</a>
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
            {{-- content --}}
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
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-5">
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
                                                                        class="img-fluid rounded-3"
                                                                        alt="Cotton T-shirt">
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
    {{-- End Nav --}}
    <section class="section1 container">
        <div class="row d-flex align-items-center justify-content-between">
            <div class="col-6">
                <div class="content">
                    <h1 class="titl"><span class="gold-color">E</span>lectro<span class="gold-color">C</span>ity
                    </h1>
                    <p class="white-color paragraphe">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Illo autem quasi minima officiis nulla natus perferendis inventore magnam ratione.
                        Asperiores sunt omnis temporibus dicta ad voluptates, perferendis dignissimos eum placeat?</p>
                </div>
            </div>
            <div class="col-6">
                <div class="image">
                    <img class="img-fluid w-100" src="{{ asset('images/background.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <x-AboutUs />
    <x-Services />

    <section class="Category container  ">
        <div class="row ">
            <div class="col">
                <h1 class="text-center gold-color mb-5">Our Category </h1>
            </div>
        </div>
        <div class="row  mt-3 w-100">
            @foreach ($categories as $categorie)
                <div class="col-12 col-md-6 col-lg-4 my-2">
                    <div class="card">
                        <div class="card-h2">
                            <a href="{{ route('showCategory', $categorie->id) }}">{{ $categorie->nom }}</a>
                            {{-- <img class="img-fluid " src="{{ asset('images/POSTER.png') }}" alt=""> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="Ourproducts container mt-5">
        <div class="row">

            <h1 class="gold-color text-center mb-5">Top Products</h1>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide  ">
                        <img src="{{ asset('images/Image-11_720x.png') }}" />
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/Image-13_370x.webp') }}" />
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/Image-1_720x.png') }}" />
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/Image-2_370x.webp') }}" />
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/1684618191_Image-27_370x.webp') }}" />
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/social.png') }}" />
                    </div>
                    {{-- <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                </div> --}}
                </div>
                <div class="swiper-pagination "></div>
            </div>
        </div>
    </section>
    <section>
        <div class="container d-flex justify-content-center   ">
            <div class="row w-100">
                @foreach ($productss as $prd)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-2">
                        <x-productcard :prd="$prd" />
                    </div>
                @endforeach
            </div>
            <div> {{ $productss->links() }}</div>
        </div>
        </div>
    </section>
    <x-contactus />
    <section id="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5203.2976838710165!2d-5.84413645981466!3d35.74202749841785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0b87176ec99ceb%3A0xbfbabe6c696d4884!2sAhlan%2C%20Tangier!5e1!3m2!1sen!2sma!4v1684967370896!5m2!1sen!2sma"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

    </section>
</x-master>
