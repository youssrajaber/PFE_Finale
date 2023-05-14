<x-master>
    <div class="container">
        <h2>ProFile</h2>
        <form method="POST" action="{{route('login.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" name="email" class="form-control">
                @error('email')
                    {{$message}}
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Telephone</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Adress</label>
                <input type="text" name="addrs" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <input type="file" name="img">
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-block"  >signUp</button>
            </div>
        </form>
    </div>
</x-master>