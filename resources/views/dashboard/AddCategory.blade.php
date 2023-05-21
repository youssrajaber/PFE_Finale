<x-Admin_master>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/">ElectroCity</a>
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
                        <a class="nav-link " href="{{ route('AddCat') }}">
                            Add Category
                        </a>
                        <a class="nav-link " href="{{ route('messages') }}">
                            Messages
                        </a>
                        <a class="nav-link " href="{{ route('clients') }}">
                            All Clients
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as: {{ auth()->user()->name }}</div>
                </div>
            </nav>
        </div>
    </div>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row text-center mt-3">
                    <h1 class="mt-4">Add Category </h1>
                    <form action="{{ route('Addcategory') }}" method="POST">
                        @csrf
                        <input type="text" name="add" class="form-control-sm">
                        <button class="btn btn-dark">Add</button>
                    </form>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col">
                        <table class="table table w-50 ">
                            <tr>
                                <th>Nom</th>
                                <th>Actions</th>
                            </tr>
                            @foreach ($showAll as $show)
                                <tr>
                                    <td>{{ $show->nom }}</td>
                                    <td>
                                        <form action="{{ route('destroyCat', $show->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id" required>
                                <option value="">Select a Category</option>
                                @foreach ($showAll as $category)
                                    <option value="{{ $category->id }}">{{ $category->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </main>
</x-Admin_master>
