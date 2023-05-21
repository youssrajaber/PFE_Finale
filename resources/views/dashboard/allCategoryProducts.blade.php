<x-master>
    <h1 class="text-center">Category Name : {{ $categoryName }}</h1>
    <div class="row">

        @foreach ($categoryProducts as $prd)
            <x-productcard :prd="$prd" />
        @endforeach
    </div>
</x-master>
