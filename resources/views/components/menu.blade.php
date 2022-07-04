 <!--navbar-->
 <nav class="navbar navbar-expand-lg navbar-light d-flex" id="bar" style="margin-bottom: 50px;">
        <div class="container-fluid nav1 bg-white fixed-top ">
          <a class="navbar-brand" href="{{ route('dashboard') }}"><img src="{{url('imgs/studia.png')}}"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              @if (Route::current()->getName() == 'classes')
              <a class="nav-link active" href="{{ route('dashboard') }}"><img src="{{url('imgs/home.png')}}"> Home</a>
              @else <a class="nav-link" href="{{ route('dashboard') }}"><img src="{{url('imgs/home.png')}}"> Home</a>
              @endif
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/profile"><img src="/imgs/profile.png"> Profile</a>
              </li>
              
              <li class="nav-item">
                
            <form action="{{Route('search_classroom')}}" role="search" method="get" class="form-inline  d-flex" style="margin-top:10px">
              <img src="/imgs/loupe.png">
              <input id="search" class="form-control mr-sm-2 " required name="name" type="search" placeholder="Search" aria-label="Search">
              <input type="submit" id="searchsubmit">
            </form>
                
              </li>
            </ul>
            <div class=" dropdown show-drop-down">
                <div class="dropdown-toggle profile p-2" data-bs-toggle="dropdown" >
                    <span style="color:black;">{{ Auth::user()->fname }}</span>
                    @if(is_null(auth::user()->image))
                    <img src="/imgs/user.png">
                    @else 
                    <img src="/imgs/pdp/{{auth::user()->image}}" style="width:40px; border-radius: 50%;height: 40px;">
                    @endif
                </div>
                <ul class="a dropdown-menu drop-down" >
                    <li class="text-center"> <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <span class="link-color">log out</span>
                            </a>
                        </form>
                    </li>
                </ul>
             </div>
          </div>
        </div>
      </nav>