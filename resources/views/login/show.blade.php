<x-master>
    <div class="container">
        <h2>Authentification</h2>
        <form method="POST" action="{{route('loginp')}}">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="{{old('email')}}">
                @error('email')
                    {{$message}}
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">password</label>
                <input type="password" name="password" class="form-control">
                @error('password')
                {{$message}}
            @enderror
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-block"  >LogIn</button>
            </div>
        </form>
    </div>
</x-master>