<x-master>

    <h1 class="text-center">Panier ({{ $count }}) </h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>NomProduits</th>
                <th>Prix</th>
                <th>Image</th>
                <th>Quantite</th>
                <th>Supprimer</th>
            </tr>

        </thead>
        <tbody>

            @if (isset($prod))
                @foreach ($prod as $prd)
                    <tr>
                        <td>{{ $prd->nom }}</td>
                        <td>{{ $prd->prix }}</td>
                        <td class="w-25 "><img src="{{ asset('images/' . $prd->image) }}" class="img-fluid  rounded"
                                alt="poijhg"></td>
                        <td>
                            <form id="1" action="{{ route('updateItem') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $prd->id }}">
                                <input type="number" min="1" value="{{ $prd->quantite }}" name="quantity">
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('deleteItem', [$prd->id, $prd->quantite]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            @if (isset($prod))
                <tr class="d-flex">
                    <td>
                        <input type="text" name="price" id="" disabled value="{{ $totalPrix }}">
                        <a class="btn btn-primary" href="{{ route('payInfosget') }}">Cash</a>
                        <a class="btn btn-primary" href="{{ url('stripe', $totalPrix) }}">Pay Us Card</a>
                        <a class="btn btn-success" href="{{ url('/cat') }}">Khaltk</a>
                    </td>
                </tr>
            @endif
        </tfoot>
    </table>
</x-master>
