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
    <div class="container">
        <div class="row mt-5 lg">
            <div class=" col-md-6 form">
                <h2>Welcome Back</h2>
                <form method="POST" action="{{route('loginp')}}">
                    @csrf
                    <div >
                        <input type="text" name="email"  value="{{old('email')}}" placeholder="Email">
                        @error('email')
                            {{$message}}
                        @enderror
                    </div>
                    <div >
                        <input type="password" name="password" placeholder="password" >
                        @error('password')
                        {{$message}}
                    @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-block btn-dark"  >LogIn!</button>
                    </div>
                </form>
                <p class="text">
                    Don't Have account  <a  href="{{route('login.create')}}">Sign up</a> 
                </p>
            </div>
            <div class="col-md-6">
                <div class="imgLg"></div>
            </div>
        </div>
    </div>
</body>