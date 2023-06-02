<x-master>
    {{-- Start Nav --}}
    <x-Menu :prod="$prod" :count="$count" :totalPrix="$totalPrix" />

    <section class="section1 container">
        <div class="row d-flex align-items-center justify-content-between">
            <div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine"
                class=" contents col-12 col-lg-6 mt-5 mt-lg-0 text-center text-lg-start">
                <div class="content">
                    <h1 class="title mt-5 mt-lg-0"><span class="gold-color">E</span>lectro<span
                            class="gold-color">C</span>ity
                    </h1>
                    <p class=" paragraphe lh-lg fs-6 mt-5 mt-lg-0 fw-bold">
                        ElectroCity is an online platform that caters to electronics enthusiasts by offering a wide
                        range of electronic products. With a focus on providing a convenient and reliable shopping
                        experience, ElectroCity ensures customer satisfaction and convenience.
                    </p>
                </div>
                <button class="bg-btnn w-50 fw-bold mt-5 mt-lg-0">Buy Now !</button>
            </div>
            <div data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine"
                class="col-0 col-lg-6 d-none d-lg-flex">
                <div class="image d-flex justify-content-end">
                    <img class="img-fluid w-75" src="{{ asset('images/Home.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <x-AboutUs />
    <x-Services />

    <section class="Category container  ">
        <div class="row  ">
            <div class="col">
                <h1 class="text-center gold-color mb-5" data-aos="fade-right" data-aos-offset="300"
                    data-aos-easing="ease-in-sine">Our Category </h1>
            </div>
        </div>
        <div class="row  mt-3 w-100">
            @foreach ($categories as $categorie)
                <div class="col-12 col-md-6 col-lg-4 my-2">
                    <div class="card">
                        <div class="card-h2">
                            <a href="{{ route('showCategory', $categorie->id) }}">{{ $categorie->nom }}</a>
                            {{-- <img class="img-fluid " src="{{ asset('images/POSTER.png') }}" alt=""> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="container">
        <div>
            <h1 class="text-center gold-color mb-5" data-aos="fade-right" data-aos-offset="300"
                data-aos-easing="ease-in-sine">Our Product </h1>
        </div>
        <div class=" d-flex justify-content-center   ">
            <div class="row w-100">
                @foreach ($productss as $prd)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-1">
                        <x-productcard :prd="$prd" />
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class=" my-2"> {{ $productss->links() }}</div>
        </div>
    </section>

    <x-contactus />
    <section id="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5203.2976838710165!2d-5.84413645981466!3d35.74202749841785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0b87176ec99ceb%3A0xbfbabe6c696d4884!2sAhlan%2C%20Tangier!5e1!3m2!1sen!2sma!4v1684967370896!5m2!1sen!2sma"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</x-master>
