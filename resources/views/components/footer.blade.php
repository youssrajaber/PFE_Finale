
    <footer class="footer container py-5">
        <div class="row py-4">
            <div class="col-md-5 col-sm-12">
                <div class="logo py-2">
                    <img class="img-fluid" src="{{ asset('images/Logo.png') }}" alt="lg">
                </div>
                <div>
                    <p class="grey-color fw-bold py-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum,
                        doloribus
                        totam eaque rem nisi
                        iure
                        itaque tempore rerum reprehenderit dolor impedit facere laudantium hic soluta.
                        Recusandae similique aspernatur vero obcaecati?</p>
                </div>
                <div class="links mt-3">
                    <div class="social">
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <h4 class="titre">Site Menu</h4>
                <ul class="links p-0 mt-3">
                    <li class="mb-2"><a class="grey-color" href="/">Home</a></li>
                    <li class="mb-2"><a class="grey-color" href="#about">About Us</a> </li>
                    <li class="mb-2"><a class="grey-color" href="#service">Services</a></li>
                    <li class="mb-2"><a class="grey-color" href="{{ route('affichage') }}">Cart</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h4 class="titre">Useful Links</h4>
                <ul class="links p-0 mt-3">
                    <li class="mb-2"><a class="grey-color" href="{{ route('login.create') }}">Create Account</a></li>
                    <li class="mb-2"><a class="grey-color" href="#">Site conditions</a> </li>
                </ul>
            </div>
            <div class="col-md-2">
                <h4 class="titre">Information</h4>
                <ul class="links p-0 mt-3">
                    <li class="mb-2"><a class="grey-color" href="#">FAQ</a></li>
                    <li class="mb-2"><a class="grey-color" href="#map">Site Maps</a> </li>
                    <li class="mb-2"><a class="grey-color" href="#contact">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="hr"></div>
            </div>
        </div>
        <div class="copy mt-3">
            <p class="text-muted fw-bold">&copy; 2023-Devloped By <span class="gold-color">Youssra</span></p>
        </div>
    </footer>

