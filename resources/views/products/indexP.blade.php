<x-master>
    <h1 class="text-center">Bienvenue sur notre site e-commerce</h1>
    <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur incidunt iure
        omnis cupiditate vel molestias reiciendis laborum</p>

    <div>
        <h1>Our Cetegories </h1>
        @foreach ($categories as $categorie)
            <a href="{{ route('showCategory', $categorie->id) }}">{{ $categorie->nom }}</a>
        @endforeach
    </div>
    <div class="row">
        @foreach ($productss as $prd)
            <x-productcard :prd="$prd" />
        @endforeach
        <div>{{ $productss->links() }}</div>
    </div>
    <x-AboutUs />
    <x-Services />
</x-master>
