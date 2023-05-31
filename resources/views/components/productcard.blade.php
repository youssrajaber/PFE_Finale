<div class=" allprd  cardallprd mx-auto">
    <div class="cardHeader h-100 d-flex justify-content-center align-items-center">
        <a href="{{ route('product', $prd->id) }}">
            <img class="card-img-top img-fluid " src="{{ asset('images/' . $prd->image) }}" alt="photo" />
        </a>
    </div>
    <div class="textBox px-3 py-1">
        <div class="d-flex justify-content-between align-items-baseline">

            <span class="text head  fw-bold gold-color fs-4">{{ $prd->nom }}</span>
            <span class="text price fw-bold  fw-bold">{{ $prd->prix }}DH</span>
        </div>
        <p class="mt-3 fs-5 ">{{ Str::limit($prd->Discription , 40) }}</p>
    </div>
    @auth
        {{--  --}}
        <div class="w-100 d-flex justify-content-start px-3">
            <button class="cssbuttons-io">
                <span>
                    @if ($prd->quantite > 0)
                        <a class=" text-decoration-none text-white" href="{{ route('add', $prd->id) }}" name="panier">
                            Add to Cart
                        </a>
                    @else
                        <a class=" text-decoration-none text-white" name="panier">
                            sold out
                        </a>
                    @endif

                </span>
            </button>
        </div>
        {{--  --}}

    @endauth
</div>
