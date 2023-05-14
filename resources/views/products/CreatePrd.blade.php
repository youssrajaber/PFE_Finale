<x-master>
    <h2>Create Product</h2>
    <form action="{{route('store')}}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control">
            @error('nom')
                <div class="text-danger">
                    {{$message}}
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
            <input type="file" name="image"  >
        </div>
        <div class="d-flex">
            <button type="submit" class="btn btn-primary btn-block mt-2">Ajouter</button>
        </div>
    </form>
</x-master>