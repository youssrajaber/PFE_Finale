<x-Dashboard-Admin :messages="$messages" :totalcontact="$totalcontact">
    <main>
        <div class="container-fluid px-4">
            <h1 class=" gold-color text-uppercase fw-bold text-center my-5">Messages</h1>
            <table class="table table-dark">
                <tr>
                    <th class="col">Name </th>
                    <th class="col">Subject</th>
                    <th class="col">Email</th>
                    <th class="col">Message</th>
                </tr>
                @foreach ($messages as $message)
                    <tr>
                        <td class="col align-middle">{{ $message->fullname }}</td>
                        <td class="col align-middle">{{ $message->subject }}</td>
                        <td class="col align-middle">{{ $message->email }}</td>
                        <td class="col align-middle">{{ $message->textErea }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </main>
</x-Dashboard-Admin>
