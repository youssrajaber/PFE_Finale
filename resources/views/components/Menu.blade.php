<header>
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

    <!-- Modal -->
    {{-- <div class="modal " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 gold-color" id="staticBackdropLabel">Cart</h1>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-white">
                    content
                </div>
                <div class="modal-footer ">
                    <div class="btn">
                        <i class="fa-solid fa-rectangle-xmark grey-color" data-bs-dismiss="modal"></i>
                    </div>
                    <div class="btn">
                        <a class="nav-link grey-color fw-bold border-rounded px-2"
                            href="{{ route('affichage') }}">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
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
                                                <div class="col-lg-8">
                                                    <div class="p-5">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-5">
                                                            <h1 class="fw-bold mb-0 gold-color">Shopping Cart</h1>
                                                            <h6 class="mb-0 white-color fw-bold">{{ $count }}
                                                                items</h6>
                                                        </div>
                                                        <hr class="my-4 white-color">

                                                        @foreach ($prod as $prd)
                                                            <div
                                                                class="row mb-4 d-flex justify-content-between align-items-center">
                                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                                    <img src="{{ asset('images/' . $prd->image) }}"
                                                                        class="img-fluid rounded-3"
                                                                        alt="Cotton T-shirt">
                                                                </div>
                                                                <div class="col-md-2 col-lg-2 col-xl-2">

                                                                    <h6 class="white-color mb-0">{{ $prd->nom }}
                                                                    </h6>
                                                                </div>
                                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                                    <form id="1"
                                                                        action="{{ route('updateItem') }}"
                                                                        method="POST" class="row">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $prd->id }}"
                                                                            class="col">
                                                                        <button
                                                                            class="  btn-dark cartButton  col fw-bold"
                                                                            onclick="handlePlusChange({{ $prd->id }})">
                                                                            +
                                                                        </button>

                                                                        <input type="text"
                                                                            id="{{ $prd->id }}" min="1"
                                                                            value="{{ $prd->quantite }}"
                                                                            name="quantity"
                                                                            class="col text-center white-color fw-bold bg-dark border-0 w-25">
                                                                        <button class="cartButton col fw-bold"
                                                                            onclick="handleMinusChange({{ $prd->id }})">
                                                                            -
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-md-2 col-lg-2 col-xl-2 offset-lg-1">
                                                                    <h6 class="mb-0 white-color">{{ $prd->prix }}DH
                                                                    </h6>
                                                                </div>
                                                                <div class="col-md-2 col-lg-2 col-xl-2 ">
                                                                    <form
                                                                        action="{{ route('deleteItem', [$prd->id, $prd->quantite]) }}"
                                                                        method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button class="btn delete-btn ">Delete</button>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <hr class="my-4 white-color">
                                                        @endforeach

                                                        <div class="pt-5">
                                                            <h6 class="mb-0  fw-bold">
                                                                <a href="/" class="">
                                                                    <i
                                                                        class="fas fa-long-arrow-alt-left  me-2  fw-bold"></i>
                                                                    Back to shop
                                                                </a>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 bg-grey summary">
                                                    <div class="p-5">
                                                        <h3 class="fw-bold mb-5 mt-2 pt-1 gold-color">Summary</h3>
                                                        <hr class="my-4">

                                                        <div class="d-flex justify-content-between mb-4">
                                                            <h5 class=" white-color fw-bold">Items <span
                                                                    class="">{{ $count }}</span></h5>
                                                            <h5 class="white-color">{{ $totalPrix }}DH</h5>
                                                        </div>

                                                        <h5 class="text-uppercase mb-3 gold-color">Products</h5>
                                                        @foreach ($prod as $prd)
                                                            <div
                                                                class=" white-color  my-2 d-flex justify-content-between align-items-center">
                                                                <div class="fs-5">{{ $prd->nom }}</div>
                                                                <div class=" ">{{ $prd->quantite }} x
                                                                    {{ $prd->prix }}DH</div>
                                                            </div>
                                                        @endforeach

                                                        <hr class="my-4">

                                                        <div class="d-flex justify-content-between mb-5">
                                                            <h5 class="text-uppercase gold-color">Total price</h5>
                                                            <h5 class="white-color ">{{ $totalPrix }}DH</h5>
                                                        </div>

                                                        <div class="row g-2 align-items-center">
                                                            <div class="col-6  m-0  ">
                                                                <button class="cartButton">
                                                                    <a class="text-decoration-none  white-color "
                                                                        href="{{ route('payInfosget') }}">Cash</a>
                                                                </button>
                                                            </div>
                                                            <div class="col-6 d-flex justify-content-end m-0  ">
                                                                <button class="cartButton">
                                                                    <a class="text-decoration-none white-color "
                                                                        href="{{ url('stripe', $totalPrix) }}">Pay Us
                                                                        Card</a>

                                                                </button>
                                                            </div>
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
                {{--  --}}

            </div>
            {{--  --}}
        </div>
    </div>

</header>


{{-- End Modal --}}
