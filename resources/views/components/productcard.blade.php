
<div class="col-sm-6">

    <div class="card  ">
        <img class="card-img-top " src="{{'images/'.$prd->image}}" alt="photo"/>
        <div class="card-body">
            <h4 class="card-title">{{$prd->nom}}</h4>
            <p class="card-text">{{$prd->prix}}DH</p>
            <span>{{$prd->quantite > 0 ? "En Stock " : "sold Out" }}</span>
        </div>  
        <div class=" card-footer " >
            <div class="form-group">
                @auth
                <a class="{{ $prd->quantite > 0 ? 'btn btn-outline-success' : 'd-none' }}"  href="{{route('add',$prd->id)}}" name="panier">ajouter au panier</a>
                @endauth
                <a href="{{route('product',$prd->id)}}" class="btn btn-primary" >Show more</a>
            </div>
        </div>
    </div>
</div>