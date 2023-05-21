<x-master>

    <h1>Contact Us</h1>
    <div class="row">
        <form method="POST" action="{{route('contactPost')}}">
            @csrf
            <div class=" mt-2 mb-3">
                <div>
                    <input type="text" name="fullname" id="" placeholder="Fullname" class="form-control">
                </div>
                <div class=" mt-2 mb-3">
                    <input type="text" name="email" placeholder="Email" class="form-control">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
                <div class=" mt-2 mb-3">
                    <input type="text" name="subject" id="" placeholder="Subject" class="form-control">
                </div>
                <div class=" mt-2 mb-3">
                    <textarea name="area" id="" cols="50" rows="5" class="form-control">Your Message...</textarea>
                </div>
                <div class="d-grid mt-2">
                    <button class="btn btn-primary btn-dark btn-block">send</button>
                </div>
        </form>
    </div>

</x-master>
