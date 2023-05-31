<x-Dashboard-Admin :messages="$messages" :totalcontact="$totalcontact">
    <main>
        <div class="container px-4">
            <h1 class="mt-4 text-center fw-bold text-uppercase gold-color">All Orders</h1>
            <table class="table table-dark mt-4">
                <tr class="  fw-bold ">
                    <th class="">Image</th>
                    <th class="">Email</th>
                    <th class="">Date</th>
                    <th class="">Adress</th>
                    <th class="">Telephone</th>
                    <th class="">Total</th>
                    <th class="">Payment</th>
                </tr>
                @foreach ($allOrders as $allOrder)
                    <tr class=" ">
                        <td class="align-middle">
                            <img class="card-img-top rounded-circle " style="width: 5rem"
                                src="{{ asset('images/' . $allOrder->image) }}" alt="photo" />
                        </td>
                        <td class="align-middle">
                            <h4>{{ $allOrder->email }}</h4>
                        </td>

                        <td class="align-middle">
                            <p>{{ $allOrder->date }}</p>
                        </td>
                        <td class="align-middle">
                            <span>{{ $allOrder->Adress }}</span>
                        </td>
                        <td class="align-middle">
                            <p>{{ $allOrder->Telephone }}</p>
                        </td>
                        <td class="align-middle">
                            <p>{{ $allOrder->total }}DH</p>
                        </td>
                        <td class="align-middle">
                            <p>{{ $allOrder->payment }}</p>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="pagination py-4">
                {{ $allOrders->links() }}
            </div>
        </div>
    </main>
</x-Dashboard-Admin>
