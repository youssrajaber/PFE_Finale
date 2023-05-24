<x-master>
    <x-Menu/>

    <div class="container py-5 ">
        <div class="row">
            <h1 class="text-center gold-color mb-5">Category Name : {{ $categoryName }}</h1>
        </div>
        <div class="row w-100 ">
                @foreach ($categoryProducts as $prd)
                    <div class="col-12 col-md-4 col-lg-3 my-2">
                        <x-productcard :prd="$prd" />
                    </div>
                @endforeach
        </div>
        {{-- <div class="white-color">{{ $productss->links() }}</div> --}}
    </div>


</x-master>
