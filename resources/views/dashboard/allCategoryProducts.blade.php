<x-master>
    <x-Menu :prod="$prod" :count="$count" :totalPrix="$totalPrix" />


    <div class="container py-5 ">
        <div class="row">
            <h1 class="text-center gold-color mb-5"> {{ $categoryName }}</h1>
        </div>
        <div class="row w-100 ">
            @foreach ($categoryProducts as $prd)
                <div class="col-12 col-md-4 col-lg-3 my-2">
                    <x-productcard :prd="$prd" />
                </div>
            @endforeach
        </div>
    </div>


</x-master>
