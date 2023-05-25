<x-master>
    <x-Menu />
    <div class="container signBg">
        <h2 class="text-center mt-3 ">ProFile</h2>
        <div class="row justify-content-center SIGN ">
            <div class="col-md-8">
                <form method="POST" action="{{ route('login.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class=" mt-2 mb-3">
                        <input type="text" name="name" placeholder="Name" class="sign">
                        <div>
                            <input type="text" name="email" placeholder="Email" class="sign">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                        <div>
                            <input type="text" name="phone" placeholder="Telephone" class="sign">
                        </div>
                        <div>
                            <input type="text" name="addrs" placeholder="Adress" class="sign">
                        </div>
                        <div>
                            <input type="password" name="password" placeholder="password" class="sign">
                        </div>
                        <div>
                            <input type="file" name="img">
                        </div>
                        <div class="d-grid mt-2">
                            <button class="btn btn-primary btn-dark btn-block">signUp</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-master>
