<section class="contact  bg-contact py-4" id="contact">
    <div class="container">
        <h1 data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" class="titre text-center">Contact Us
        </h1>
        <div class="row mt-4  ">
            <div class="col-md-5">
                <div class="drapo ">
                    <p class="titre fw-bold ">PHONE :</p>
                    <p class="white-color fw-bold">212 666-245-128</p>
                    <p class="titre fw-bold  ">ADDRESS :</p>
                    <p class="white-color fw-bold">3rd Avenue,Upper Est Side
                        <span>morocco</span>
                    </p>
                    <p class="titre fw-bold">EMAIL :</p>
                    <p class="white-color fw-bold ">Admin@demo.com</p>
                </div>
            </div>
            <div class="col-md-7 p-0">
                <form method="POST" action="{{ route('contactPost') }}">
                    @csrf
                    <div class=" mb-3">
                        <input type="text" name="fullname"
                            placeholder="Fullname"class="bg-input   mb-3 form-control  input">
                        <input type="text" name="email" placeholder="Email"
                            class="form-control bg-input input mt-2 mb-1  ">
                    </div>
                    <div class=" mt-2 mb-3">
                        <input type="text" name="subject" placeholder="Subject" class="form-control bg-input">
                    </div>
                    <div class=" mt-2 mb-3">
                        <textarea name="area" id="" cols="50" rows="5" class="form-control bg-input">Your Message...</textarea>
                    </div>
                    <div class="text-end mt-2">
                        <button class="fw-bold">Send</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</section>
