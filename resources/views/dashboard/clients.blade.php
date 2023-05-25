<x-Dashboard-Admin>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Clients</h1>
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
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->Adress }}</td>
                        <td>
                            <div class="my-2">
                                <img style="width: 5rem;height: 5rem" class="img-fluid rounded-circle"
                                    src="{{ asset('images/' . $client->image) }}" alt="">
                            </div>
                        </td>
                        <td>{{ $client->role }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('clientsDelete', $client->id) }}">
                                Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </main>
</x-Dashboard-Admin>
