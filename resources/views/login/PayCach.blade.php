<x-master>
    <x-Menu :prod="$prod" :count="$count" :totalPrix="$totalPrix" />
    <section class="payment">
        <div class="container my-5">
            <h2 class="gold-color fw-bold text-uppercase text-center">Payment</h2>
            <form method="POST" action="{{ route('payInfos') }}">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label gold-color fw-bold">Name</label>
                    <input type="text" name="name" class="form-control bg-input fw-bold"
                        value="{{ auth()->user()->name }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label gold-color fw-bold">Email</label>
                    <input type="text" name="email" class="form-control bg-input fw-bold"
                        value="{{ auth()->user()->email }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label gold-color  fw-bold">Telephone</label>
                    <input type="text" name="phone" class="form-control bg-input fw-bold"
                        value="{{ auth()->user()->Telephone }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label gold-color fw-bold ">Address</label>
                    <input type="text" name="addrs" class="form-control bg-input fw-bold"
                        value="{{ auth()->user()->Adress }}">
                </div>
                <div class="d-grid">
                    <button class="btn  btn-block fw-bold btn-pay ">Pay now </button>
                </div>
            </form>
        </div>
    </section>
</x-master>
