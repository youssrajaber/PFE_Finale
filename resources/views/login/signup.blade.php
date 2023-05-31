
<x-authLinks>
    <x-Menu />
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4 fw-bold">Create an Account !</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('login.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group ">
                                    <input type="text" name="name" class="form-control form-control-user "
                                        id="exampleFirstName" placeholder="Name" />
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user"
                                        id="exampleInputEmail" placeholder="Email Address" />
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="phone" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Phone" />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="addrs" placeholder="Adress"
                                            class="form-control form-control-user" id="exampleRepeatPassword" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="phone" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="password" />
                                    </div>
                                    <div class="col-sm-6 ">
                                        <input type="file" name="img" class="form-control form-control-user "
                                            id="exampleRepeatPassword" />

                                    </div>
                                </div>
                                <button class="btn bg-black fw-bold  btn-user btn-block">Sign up</button>
                                <hr />
                            </form>
                            <hr />
                            <div class="text-center">
                                <a class="fw-bold black-color" href="{{ Route('login.show') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer />
</x-authLinks>
