

    <div class=" col-md-4">
        <div class="">
            <div class="card  ">
                <a href="{{route('product',$prd->id)}}">
                    <img class="card-img-top " src="{{'images/'.$prd->image}}" alt="photo"/>
                </a>
                {{-- <div class="card-body">
                    <h4 class="card-title">{{$prd->nom}}</h4>
                    <p class="card-text">{{$prd->prix}}DH</p>
                    <span>{{$prd->quantite > 0 ? "En Stock " : "sold Out" }}</span>
                </div>   --}}
                <div class=" card-footer  " >
                    <h4 class="card-title ">
                        <a href="{{route('product',$prd->id)}}">{{$prd->nom}}</a>
                    </h4>
                    <p class="card-text">{{$prd->prix}}DH</p>
                    <span class="text-success">{{$prd->quantite > 0 ? "En Stock " : "sold Out" }}</span>
                    <div class="form-group">
                        @auth
                        <a class="{{ $prd->quantite > 0 ? 'btn btn-outline-success' : 'd-none' }}"  href="{{route('add',$prd->id)}}" name="panier">ajouter au panier</a>
                        @endauth
                        {{-- <a href="{{route('product',$prd->id)}}" class="btn btn-primary" >Show more!</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
