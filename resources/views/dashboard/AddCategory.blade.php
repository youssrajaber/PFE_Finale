<x-Dashboard-Admin :messages="$messages" :totalcontact="$totalcontact">
    <main>
        <div class="container-fluid px-4">
            <div class="row text-center mt-3">
                <h1 class="fw-bold my-5 gold-color">Add Category </h1>
                <form action="{{ route('Addcategory') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3 w-75 mx-auto d-flex align-items-center">
                        <input type="text" name="add" class="form-control bg-input py-4"
                            placeholder="Recipient's username" aria-label="Recipient's username"
                            aria-describedby="button-addon2">
                        <button class="btn text-white  bg-btnn py-1" id="button-addon2">Add</button>
                    </div>
                    <input type="file" name="image">
                </form>
            </div>
            <div class="row w-75 mx-auto">
                <h1 class="fw-bold my-5 text-center gold-color">All Category's </h1>
                @foreach ($showAll as $show)
                    <div class="fs-3 fw-blod text-uppercase">{{ $show->nom }}</div>
                    <div class="d-flex justify-content-between  my-2">
                        <div style="width: 5rem ; height: 5rem;">
                            <img class="card-img-top " style="width: 5rem" src="{{ asset('images/' . $show->image) }}"
                                alt="photo" />
                        </div>
                        <div>
                            <form action="{{ route('destroyCat', $show->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn text-white  bg-btnn">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>
    </main>
</x-Dashboard-Admin>
