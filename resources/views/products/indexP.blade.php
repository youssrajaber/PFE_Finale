<x-master>
    <div class="row">
        <h1 class="text-center">Bienvenue sur notre site e-commerce</h1>
        <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur incidunt iure
                omnis cupiditate vel molestias reiciendis laborum</p>
        @foreach ($productss as $prd)
        <x-productcard :prd="$prd"/>
        @endforeach
    </div>
    {{$productss->links()}}
</x-master>