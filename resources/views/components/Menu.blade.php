<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/"><img style="width: 3rem"  src="{{asset('images/Logo.png')}}" alt="ig"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="{{route('products')}}">HomePage</a>
      </li>
      @guest
      <li class="nav-item">
        <a class="nav-link" href="{{route('login.show')}}">login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('login.create')}}">Sign up</a>
      </li>
      @endguest
      @if(Auth::user())
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('affichage')}}">Cart</a>
      </li>

      @if(Auth::user()->role==='ADMIN')
      <li class="nav-item">
        <a class="nav-link" href="{{route('ADM')}}">Dashboard</a> 
      </li>
      @endif

      @auth
      <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}">logout</a>
      </li>
          
      @endauth
      @endif
    </ul>
      @auth
      <div class="form-inline" style="width: 3rem">
        <a href="{{route('details',[auth()->user()->name,auth()->user()->email])}}"><img class="img-fluid rounded-circle" src="{{asset('images/'. auth()->user()->image)}}" alt="img"></a>
      </div> 
      @endauth
  </div>
</nav>

