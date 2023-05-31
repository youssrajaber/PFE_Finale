<x-Dashboard-Admin :messages="$messages" :totalcontact="$totalcontact">
    <main>
        <div class="container-fluid px-4">
            <div class="row text-center mt-3">
                <h1 class="fw-bold my-5">Add Category </h1>
                <form action="{{ route('Addcategory') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3 w-75 mx-auto d-flex align-items-center">
                        <input type="text" name="add" class="form-control bg-input py-4"
                            placeholder="Recipient's username" aria-label="Recipient's username"
                            aria-describedby="button-addon2">
                        <button class="btn text-white  bg-btnn py-1" id="button-addon2">Add</button>
                        {{-- <button class="btn btn-outline-dark" ></button> --}}
                    </div>
                </form>
            </div>
            <div class="row w-75 mx-auto">
                <h1 class="fw-bold my-5 text-center">All Category's </h1>
                @foreach ($showAll as $show)
                    <div class="d-flex justify-content-between my-2">
                        <div class="fs-3 fw-blod text-uppercase">{{ $show->nom }}</div>
                        <form action="{{ route('destroyCat', $show->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            {{-- <button class="btn btn-dark">Delete</button> --}}
                            <button class="btn text-white  bg-btnn">Delete</button>
                        </form>
                    </div>
                @endforeach


            </div>

        </div>
    </main>
</x-Dashboard-Admin>
