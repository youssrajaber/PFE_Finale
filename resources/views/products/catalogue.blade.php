<h1 class="text-center">Welcome to ElectroCity</h1>
<h2> Liste des Prduits </h2>

<table class="table table-dark border">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prix</th>
            <th scope="col">quantite</th>
            <th scope="col">totale</th>

        </tr>
    </thead>
    <tbody>

        @foreach ($products as $item)
            <tr>
                <td>{{ $item->nom }}</td>
                <td>{{ $item->prix }}DH</td>
                <td>{{ $item->quantite }}</td>
                <td>{{ $item->totale }}DH</td>

            </tr>
        @endforeach


    </tbody>
</table>
