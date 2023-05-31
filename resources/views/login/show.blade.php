<x-authLinks>
    <x-Menu />
    <section class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center w-100">
            <div class="col-12">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5 my-5">
                                    <div class="text-center ">
                                        <h1 class="h4 text-gray-900 mb-4 fw-bold">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('loginp') }}">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" value="{{ old('email') }}"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <button class="btn btn-block bg-black my-3 text-white fw-bold ">Login</button>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="fw-bold black-color" href="{{ route('login.create') }}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer />
</x-authLinks>
