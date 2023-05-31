<x-Dashboard-Admin :messages="$messages" :totalcontact="$totalcontact">
    <main>
        <div class="container px-4">
            <h1 class="mt-4 gold-color fw-bold text-uppercase text-center">Create Product</h1>
            <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">

                @csrf
                <div class="mb-3">
                    <label for="" class="form-label text-white fw-bold ">Nom</label>
                    <input type="text" name="nom" class=" form-control bg-input">
                    @error('nom')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label text-white fw-bold">Prix</label>
                    <input type="text" name="prix" class=" form-control bg-input">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label text-white fw-bold">Quantite</label>
                    <input type="text" name="Qnt" class=" form-control bg-input">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label text-white fw-bold">Description</label>
                    <input type="text" name="description" class=" form-control bg-input ">
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class=" form-control bg-input" name="category">
                        <option value="">Select a Category</option>
                        @foreach ($showAll as $category)
                            <option value="{{ $category->id }}">{{ $category->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <input type="file" name="image">
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn bg-btnn btn-dark btn-block mt-2 fw-bold">Add</button>
                </div>
            </form>
        </div>
    </main>
</x-Dashboard-Admin>
