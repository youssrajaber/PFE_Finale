<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    

    <div class=" col-md-4">
        <div class="test">
            <div class="card ">
                <div class="img">
                    <img class="card-img-top" src="{{asset('images/1684163896_Image-11_720x.png')}}" alt="img">
                </div>
                <button class="shop">
                    <i class="bi bi-bag-fill"></i>
                </button>
                <div class="card-footer">
                    <div class="icons">
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                    </div>
                    <div>
                        <p>nom</p>
                        <p>120DH</p>
                        <p>In stock</p>

                    </div>
                </div>
            </div>
            <div class="card   ">
                <img class="card-img-top" src="{{asset('images/1684164199_Image-1_720x.png')}}" alt="img">
                <div class="card-footer">
                    <p>nom</p>
                    <p>120DH</p>
                    <p>In stock</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>