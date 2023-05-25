<x-Dashboard-Admin>
    <main>
        <div class="container-fluid px-4">
            <div class="row text-center mt-3">
                <h1 class="mt-4">Add Category </h1>
                <form action="{{ route('Addcategory') }}" method="POST">
                    @csrf
                    <input type="text" name="add" class="form-control-sm">
                    <button class="btn btn-dark">Add</button>
                </form>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col">
                    <table class="table table w-50 ">
                        <tr>
                            <th>Nom</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($showAll as $show)
                            <tr>
                                <td>{{ $show->nom }}</td>
                                <td>
                                    <form action="{{ route('destroyCat', $show->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" required>
                            <option value="">Select a Category</option>
                            @foreach ($showAll as $category)
                                <option value="{{ $category->id }}">{{ $category->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
        </div>
    </main>
</x-Dashboard-Admin>
