<x-master>
    <x-Menu :prod="$prod" :count="$count" :totalPrix="$totalPrix" />
    <div class="container">
        <form action="{{ route('search') }}" method="POST" class="container  SearchInput my-3">
            @csrf
            <input id="search" type="text" name="search" class="input " placeholder="Dark Twitch Search">
            <button class="search__btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22">
                    <path
                        d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z"
                        fill="#efeff1"></path>
                </svg>
            </button>
        </form>
    </div>
    <div>
        <ul id="searchResults"></ul>
    </div>
    <section class="container notFullHeight">
        <div class="row  w-100">
            @foreach ($All as $item)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-3  ">
                    <div class="allprd cardallprd  mx-auto  ">
                        <div class="cardHeader h-100 d-flex justify-content-center align-items-center">
                            <a href="{{ route('product', $item->id) }}">
                                <img class="card-img-top img-fluid " src="{{ asset('images/' . $item->image) }}"
                                    alt="photo" />
                            </a>
                        </div>
                        <div class="textBox px-3 py-1">
                            <div class="d-flex justify-content-between align-items-baseline">

                                <span class="text head  fw-bold gold-color fs-4">{{ $item->nom }}</span>
                                <span class="text price fw-bold  fw-bold">{{ $item->prix }}DH</span>
                            </div>
                            <p class="mt-3 fs-5 ">{{ Str::limit($item->Discription, 40) }}</p>
                        </div>
                        @auth
                            <div class="w-100 d-flex justify-content-start px-3">
                                <button class="cssbuttons-io">
                                    <span>
                                        @if ($item->quantite > 0)
                                            <a class=" text-decoration-none text-white" href="{{ route('add', $item->id) }}"
                                                name="panier">
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
                </div>
            @endforeach
        </div>
    </section>
</x-master>
