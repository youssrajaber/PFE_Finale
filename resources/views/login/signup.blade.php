<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>ElectroCity</title>
    <link rel="icon" href="{{ asset('images/Logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <x-Menu/>
    <div class="container signBg">
        <h2 class="text-center mt-3 ">ProFile</h2>
        <div class="row justify-content-center SIGN ">
            <div class="col-md-8">
                <form method="POST" action="{{route('login.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class=" mt-2 mb-3">
                        <input type="text" name="name" placeholder="Name" class="sign">
                    <div >
                        <input type="text" name="email" placeholder="Email" class="sign">
                        @error('email')
                            {{$message}}
                        @enderror
                    </div>
                    <div >
                        <input type="text" name="phone" placeholder="Telephone" class="sign">
                    </div>
                    <div >
                        <input type="text" name="addrs" placeholder="Adress" class="sign">
                    </div>
                    <div >
                        <input type="password" name="password" placeholder="password" class="sign">
                    </div>
                    <div >
                        <input type="file" name="img">
                    </div>
                    <div class="d-grid mt-2">
                        <button class="btn btn-primary btn-dark btn-block"  >signUp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>