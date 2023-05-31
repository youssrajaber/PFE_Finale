<x-Dashboard-Admin :messages="$messages" :totalcontact="$totalcontact">
    <main>

        <div class="container px-4">
            <h1 class="mt-4 gold-color text-center text-uppercase py-4 fw-bold">All Products</h1>
            <div class="table-responsive">
                <table class="table  align-middle text-center vertical-align-center ">
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantite</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    <tbody class="align-middle">

                        @foreach ($allPrds as $allPrd)
                            <tr class="align-middle">
                                <td>
                                    <img class="card-img-top " style="width: 5rem"
                                        src="{{ asset('images/' . $allPrd->image) }}" alt="photo" />
                                </td>
                                <td class="align-middle">
                                    <h4 class="card-title">{{ $allPrd->nom }}</h4>
                                </td>
                                <td class="align-middle">
                                    <p class="card-text">{{ $allPrd->prix }}DH</p>
                                </td>
                                <td class="align-middle">
                                    <span>{{ $allPrd->quantite }}</span>
                                </td>
                                <td class="align-middle">
                                    <span>{{ $allPrd->Discription }}</span>
                                </td>
                                <td class="align-middle">
                                    <form action="{{ route('destroy', $allPrd->id) }}" method="POST">
                                        @method('PUT')
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn bg-btnn" type="button">
                                            <a class="text-white" href="{{ route('update', $allPrd->id) }}">
                                                Modifier
                                            </a>
                                        </button>
                                        <button class="btn text-white  bg-btnn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination py-4">
                    {{ $allPrds->links() }}
                </div>
            </div>
        </div>
    </main>
</x-Dashboard-Admin>
