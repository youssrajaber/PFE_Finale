<x-master>
    <div class="text-center">
        <h1>Profile Details </h1>
        <div>
            <h2>{{$name}}</h2>
        </div>
        <div>
            <div>
                @foreach ( $image as $image)
                <img class="img-fluid w-25 rounded-circle" src="{{asset('images/'.$image->image)}}" alt="managment.jpg">
                @endforeach
            </div>
            <div>
                <h5> Nombre de commande :{{$count}}</h5>
            </div>
            <h2>{{$email}}</h2>
        </div>
    </div>
</x-master>