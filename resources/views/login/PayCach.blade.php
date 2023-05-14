<x-master>
    <div class="container">
        <h2>Payment</h2>
        <form method="POST" action="{{route('payInfos')}}" >
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{auth()->user()->name}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="{{auth()->user()->email}}">
                {{-- @error('email')
                    {{$message}}
                @enderror --}}
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Telephone</label>
                <input type="text" name="phone" class="form-control" value="{{auth()->user()->Telephone}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Address</label>
                <input type="text" name="addrs" class="form-control" value="{{auth()->user()->Adress}}">
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-block"  >Pay now </button>
            </div>
        </form>
    </div>
</x-master>