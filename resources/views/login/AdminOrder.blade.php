<x-Admin_master>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">ElectroCity</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">

            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="rounded-circle" style="width: 40px; height: 40px;"
                        src="{{ asset('images/' . auth()->user()->image) }}" alt="">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item"
                            href="{{ route('details', [auth()->user()->email, auth()->user()->name]) }}">
                            Profil
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ route('ADM') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="{{ route('products') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                            Homepgae
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link " href="{{ route('create') }}">

                            Add Product
                        </a>
                        <a class="nav-link " href="{{ route('AllOrder') }}">

                            All Commandes
                        </a>
                        <a class="nav-link " href="{{ route('AllPrd') }}">

                            All Products
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as: {{ auth()->user()->name }}</div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container px-4">
                    <h1 class="mt-4">All Orders</h1>
                    <table class="table">
                        <tr>
                            <th>Image</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Adress</th>
                            <th>Telephone</th>
                            <th>Total</th>
                            <th>Payment</th>
                        </tr>
                        @foreach ($allOrders as $allOrder)
                            <tr>
                                <td>
                                    <img class="card-img-top " style="width: 5rem"
                                        src="{{ asset('images/' . $allOrder->image) }}" alt="photo" />
                                </td>
                                <td>
                                    <h4>{{ $allOrder->email }}</h4>
                                </td>

                                <td>
                                    <p>{{ $allOrder->date }}</p>
                                </td>
                                <td>
                                    <span>{{ $allOrder->Adress }}</span>
                                </td>
                                <td>
                                    <p>{{ $allOrder->Telephone }}</p>
                                </td>
                                <td>
                                    <p>{{ $allOrder->total }}DH</p>
                                </td>
                                <td>
                                    <p>{{ $allOrder->payment }}</p>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </main>
        </div>
    </div>
</x-Admin_master>
