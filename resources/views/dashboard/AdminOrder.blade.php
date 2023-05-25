<x-Dashboard-Admin>
    <main>
        <div class="container px-4">
            <h1 class="mt-4">All Orders</h1>
            <table class="table">
                <tr>
                    <th>Image</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Adress</th>
                    <th>Telephone</th>
                    <th>Total</th>
                    <th>Payment</th>
                </tr>
                @foreach ($allOrders as $allOrder)
                    <tr>
                        <td>
                            <img class="card-img-top " style="width: 5rem" src="{{ asset('images/' . $allOrder->image) }}"
                                alt="photo" />
                        </td>
                        <td>
                            <h4>{{ $allOrder->email }}</h4>
                        </td>

                        <td>
                            <p>{{ $allOrder->date }}</p>
                        </td>
                        <td>
                            <span>{{ $allOrder->Adress }}</span>
                        </td>
                        <td>
                            <p>{{ $allOrder->Telephone }}</p>
                        </td>
                        <td>
                            <p>{{ $allOrder->total }}DH</p>
                        </td>
                        <td>
                            <p>{{ $allOrder->payment }}</p>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </main>
</x-Dashboard-Admin>
