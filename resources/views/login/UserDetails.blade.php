<x-master>
    <x-Menu :prod="$prod" :count="$count2" :totalPrix="$totalPrix" />
    <div class="container w-75 mx-auto">

        <form action="{{ route('editProfile') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('Put')
            <div class="text-center">

                <div>
                    <div>
                        @foreach ($image as $image)
                            <img class="img-fluid w-25 rounded-circle" src="{{ asset('images/' . $image->image) }}"
                                alt="managment.jpg">
                        @endforeach

                        <div class="row g-2 my-3">
                            <div class="col-6">
                                <input type="text" class="form-control bg-input fw-bold" name="nom"
                                    value="{{ $name }}">
                            </div>

                            <div class="col-6">

                                <input type="text" name="tele" class="form-control bg-input fw-bold"
                                    value="{{ auth()->user()->Telephone }}">

                            </div>

                        </div>
                        <div class="row my-3 ">
                            <div class="col">

                                <input type="text" name="addres" class="form-control bg-input fw-bold"
                                    value="{{ auth()->user()->Adress }}">
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-12">
                                <input type="text" name="email" class="form-control bg-input fw-bold"
                                    value="{{ $email }}">
                            </div>
                        </div>
                        <div class="input-group my-4">
                            <input type="file" name="image" class="form-control bg-input fw-bold">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-dark me-2 bg-btnn">Save</button>
                        <button class="btn btn-dark ms-2 bg-btnn"><a href="/">Cancel</a> </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-master>
