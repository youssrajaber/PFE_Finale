<x-master>
    <x-Menu  />
    <section class="update-page container my-5 ">
        <h1 class="gold-color text-center text-uppercase fw-bold my-5 ">Update Products</h1>
        <div class="d-flex justify-content-center align-items-center">

            <form action="{{ route('update', $pr->id) }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    @csrf
                    @method('PUT')
                    <div class="col-md-5">
                        <div class="form-group">
                            <img class="img-fluid w-50" src="{{ asset('images/' . $pr->image) }}" />
                            <input type="file" name="image" value="{{ $pr->image }}" />
                        </div>
                    </div>
                    <div class="col-md-6 gold-color fw-bold">
                        <div class="form-group">
                            <label for="title">Name of product</label>
                            @error('nom')
                                {{ $message }}
                            @enderror
                            <input type="text" class="form-control mt-2 bg-input fw-bold " id="title"
                                name="nom" value={{ $pr->nom }}>
                        </div>
                        <div class="form-group mt-3">
                            <label for="content">Price </label>
                            @error('prix')
                                {{ $message }}
                            @enderror
                            <input class="form-control mt-2 bg-input fw-bold" id="content" name="prix"
                                value={{ $pr->prix }}>
                        </div>
                        <div class="form-group mt-3">
                            <label for="content">Quantity</label>
                            @error('quantite')
                                {{ $message }}
                            @enderror
                            <input class="form-control mt-2 bg-input fw-bold" id="content" name="quantite"
                                value={{ $pr->quantite }}>
                        </div>
                        <button type="submit" class="btn btn-update mt-3">Modifier</button>
                    </div>

                </div>
            </form>
        </div>

    </section>

</x-master>
