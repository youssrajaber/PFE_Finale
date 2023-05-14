<x-master>
    <h1> Produit</h1>
<div class="col-sm-6">
    <div class="card  ">
        <img class="card-img-top " src="{{asset('images/'.$product->image)}}" alt="photo"/>
        <div class="card-body">
            <div>
                <h4 class="card-title">{{$product->nom}}</h4>
                <p class="card-text">{{$product->prix}}DH</p>
                <span>{{$product->quantite}}</span>
            </div>
        </div>

    </div>
    <a class="{{ $product->quantite > 0 ? 'btn btn-outline-success' : 'd-none' }}"  href="{{route('add',$product->id)}}" name="panier">ajouter au panier</a>
    @if(Auth::user()->role==='ADMIN')
    <form action="{{route('destroy',$product->id)}}" method="POST">
        @method('PUT')
        @method('DELETE')
        @csrf
        <a class="btn btn-warning" href="{{route('update',$product->id)}}">Modifier</a>
        <button class="btn btn-danger">Delete</button>
    </form>
@endif
</div>
</x-master>