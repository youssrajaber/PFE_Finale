<x-Dashboard-Admin :messages="$messages" :totalcontact="$totalcontact">
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4 text-center text-uppercase fw-bold gold-color ">Clients</h1>
            <table class="table table-dark">
                <tr>
                    <th>name</th>
                    <th>email</th>
                    <th>Adress</th>
                    <th>image</th>
                    <th>role</th>
                    <th>Action</th>
                </tr>
                @foreach ($clients as $client)
                    <tr>
                        <td class="align-middle">{{ $client->name }}</td>
                        <td class="align-middle">{{ $client->email }}</td>
                        <td class="align-middle">{{ $client->Adress }}</td>
                        <td class="align-middle">
                            <div class="my-2">
                                <img style="width: 5rem;height: 5rem" class="img-fluid rounded-circle"
                                    src="{{ asset('images/' . $client->image) }}" alt="">
                            </div>
                        </td>
                        <td class="align-middle">{{ $client->role }}</td>
                        <td class="align-middle">
                            <a class="" href="{{ route('clientsDelete', $client->id) }}">
                                <button class="btn text-white  bg-btnn">
                                    Delete
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </main>
</x-Dashboard-Admin>
