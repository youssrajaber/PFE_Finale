<x-Dashboard-Admin>
    <div class="container px-4">
        <h1 class="mt-4">Profile Details</h1>
        <form action="{{ route('editProfile') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('Put')
            <div class="text-center">
                <div>
                    <input type="text" name="nom" value="{{ $name }}">
                </div>
                <div>
                    <div>
                        @foreach ($image as $image)
                            <img class="img-fluid w-25 rounded-circle" src="{{ asset('images/' . $image->image) }}"
                                alt="managment.jpg">
                        @endforeach
                        <input type="file" name="image">
                    </div>
                    <div>
                        <h5> Nombre de commande :{{ $count }}</h5>
                    </div>
                    <h2>
                        <input type="text" name="email" value="{{ $email }}">
                        <input type="text" name="tele" value="{{ auth()->user()->Telephone }}">
                        <input type="text" name="addres" value="{{ auth()->user()->Adress }}">
                    </h2>
                    <button>Save</button>
                </div>
            </div>
        </form>
        @if (!empty($historiques))
            <table class="table">
                <tr>
                    <th>Image</th>
                    <th>nom</th>
                    <th>quantite</th>
                    <th>prix</th>
                    <th>Total</th>
                </tr>
                @foreach ($historiques as $allOrder)
                    <tbody>
                        <tr>
                            <td>
                                <img class="card-img-top " style="width: 5rem"
                                    src="{{ asset('images/' . $allOrder->image) }}" alt="photo" />
                            </td>
                            <td>
                                <p>{{ $allOrder->nom }}</p>
                            </td>
                            <td>
                                <span>{{ $allOrder->prix }}</span>
                            </td>
                            <td>
                                <p>{{ $allOrder->quantite }}</p>
                            </td>
                            <td>
                                <p>{{ $allOrder->prix * $allOrder->quantite }}DH</p>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
                <tfoot>
                    <tr>
                        <td class="text-center">
                            <strong>Totale </strong>
                        </td>
                        <td>
                            <strong>{{ $totalSum }}</strong>
                        </td>
                    </tr>

                </tfoot>
            </table>
        @endif
    </div>
</x-Dashboard-Admin>
