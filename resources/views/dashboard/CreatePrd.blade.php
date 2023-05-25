<x-Dashboard-Admin>
    <main>
        <div class="container px-4">
            <h1 class="mt-4">Create Product</h1>
            <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">

                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control">
                    @error('nom')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Prix</label>
                    <input type="text" name="prix" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Quantite</label>
                    <input type="text" name="Qnt" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category">
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
                    <button type="submit" class="btn btn-primary btn-block mt-2">Ajouter</button>
                </div>
            </form>
        </div>
    </main>
</x-Dashboard-Admin>
