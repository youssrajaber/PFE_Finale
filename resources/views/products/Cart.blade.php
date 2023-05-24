<x-master>
    <x-Menu />

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
                                                <div class="d-flex justify-content-between align-items-center mb-5">
                                                    <h1 class="fw-bold mb-0 gold-color">Shopping Cart</h1>
                                                    <h6 class="mb-0 white-color fw-bold">{{ $count }} items</h6>
                                                </div>
                                                <hr class="my-4 white-color">

                                                @foreach ($prod as $prd)
                                                    <div
                                                        class="row mb-4 d-flex justify-content-between align-items-center">
                                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                                            <img src="{{ asset('images/' . $prd->image) }}"
                                                                class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                        </div>
                                                        <div class="col-md-2 col-lg-2 col-xl-2">

                                                            <h6 class="white-color mb-0">{{ $prd->nom }}</h6>
                                                        </div>
                                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                            <form id="1" action="{{ route('updateItem') }}"
                                                                method="POST" class="row">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="id"
                                                                    value="{{ $prd->id }}" class="col">
                                                                <button class="  btn-dark cartButton  col fw-bold"
                                                                    onclick="handlePlusChange({{ $prd->id }})">
                                                                    +
                                                                </button>

                                                                <input type="text" id="{{ $prd->id }}"
                                                                    min="1" value="{{ $prd->quantite }}"
                                                                    name="quantity"
                                                                    class="col text-center white-color fw-bold bg-dark border-0 w-25">
                                                                <button class="cartButton col fw-bold"
                                                                    onclick="handleMinusChange({{ $prd->id }})">
                                                                    -
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-2 col-lg-2 col-xl-2 offset-lg-1">
                                                            <h6 class="mb-0 white-color">{{ $prd->prix }}DH</h6>
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
                                                            <i class="fas fa-long-arrow-alt-left  me-2  fw-bold"></i>
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
                                                                href="{{ url('stripe', $totalPrix) }}">Pay Us Card</a>

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
    <script>
        function handlePlusChange(id) {
            let quantityElement = document.getElementById(id);
            let quantity = Number(quantityElement.value);
            return quantityElement.value = quantity + 1;
        }

        function handleMinusChange(id) {
            let quantityElement = document.getElementById(id);
            let quantity = Number(quantityElement.value);
            return quantityElement.value = quantity - 1;
        }
    </script>
</x-master>
