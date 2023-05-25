<x-master>
    <x-Menu :prod="$prod" :count="$count" :totalPrix="$totalPrix" />
    <section class=" showdetails container py-5 d-flex align-items-center ">
        <div class="row">
            <div class="col-md-5">
                <img class="card-img-top " src="{{ asset('images/' . $product->image) }}" alt="photo" />
            </div>
            <div class=" btns col-md-7">
                <div class=" py-2">
                    {{-- <h1 class="gold-color"> Produit</h1> --}}
                    <h1 class="gold-color text-uppercase  mb-3">{{ $product->nom }} ROLOLVERO VERO</h1>
                    <h4 class="white-color  mt-4 text-capitalize"><span class="gold-color">Just with</span>  : {{ $product->prix }}DH</h4>
                    <p class="white-color paragraphe mt-5  fw-bold fs-5 grey-color ">{{ $product->Discription }}
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus aperiam, sunt et inventore
                        explicabo excepturi odio sint quam autem ipsum nulla totam. Maiores cum cupiditate
                        exercitationem velit impedit, voluptates est!
                    </p>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn-addtocart">
                        @if ($product->quantite > 0)
                            <a class=" text-decoration-none text-white" href="{{ route('add', $product->id) }}"
                                name="panier">
                                Add to Cart
                            </a>
                        @else
                            <a class=" text-decoration-none text-white " name="panier">
                                sold out
                            </a>
                        @endif
                    </button>
                    @if (Auth::user()->role === 'ADMIN')
                        <form method="POST">
                            @method('DELETE')
                            @csrf
                            <a class="btn-update" style="text-decoration: none" href="{{ route('AllPrd') }}"><i
                                    class="fa-solid fa-pen" style="color: #545454;"></i></a>
                            <a href="{{ route('destroy', $product->id) }}" class="btn-delete "><i
                                    class="fa-solid fa-trash ms-2" style="color: #545454;"></i></a>
                        </form>
                    @endif
                </div>
            </div>
        </div>

    </section>
</x-master>
