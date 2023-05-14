<x-master>
    <h1>Admin</h1>
    <main>
        <ul>
            <li><a href="{{route('create')}}">Add Product</a></li>
            <li><a href="{{route('AllOrder')}}">Commande</a></li>
            <li><a href="{{route('AllPrd')}}">All Products</a></li>
        </ul>
    </main>
    <div class="d-flex justify-content-between">
        <div class="card " style="width: 18rem; background-color:black ; color:white">
            <div class="card-body">
              <h5 class="card-title">Total Product</h5>
              <p class="card-text">{{$totalprd}}</p>
            </div>
          </div>
        <div class="card " style="width: 18rem; background-color:black ; color:white">
            <div class="card-body">
              <h5 class="card-title">Total commande</h5>
              <p class="card-text">{{$totalcmd}}</p>
            </div>
          </div>
        <div class="card " style="width: 18rem; background-color:black ; color:white">
            <div class="card-body">
              <h5 class="card-title">Total Users</h5>
              <p class="card-text">{{$totalusers}}</p>
            </div>
          </div>
    </div>
    <table>
        <tr>
            <th></th>
        </tr>
    </table>
</x-master>
