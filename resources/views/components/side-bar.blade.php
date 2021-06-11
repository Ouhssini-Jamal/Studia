<div id="mySidenav" class="sidenav mt-5">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="list-group list-group-flush d-felx justify-content-center">
    <li class=" list-group-item text-center">
    @if (auth::user()->hasRole('teacher'))
                    <a class="sidenav-a" href="{{ route('create_classroom') }}">Create class<img src="/imgs/join.png"></a>
                    @else 
                    <a class="sidenav-a" href="{{ route('join_classroom') }}"> Join a class <img src="/imgs/join.png"></a>
                    @endif
    </li>
    </li>
    <li  class="list-group-item text-center"> 
      <a class="sidenav-a" data-bs-toggle="collapse" href="#collapse_class" aria-expanded="false" aria-controls="collapse_class">
        My classes <img src="/imgs/classes.png">
      </a>
      <div class="collapse text-center " id="collapse_class">
        @foreach($classrooms1 as $classroom)
        <div class="card card-body mb-1 text-center">
            <a href="/classes/{{$classroom->id}}" class="classroom-link">{{ $classroom->name}}</a>
        </div>
        @endforeach
        @if (Route::current()->getName() !== 'dashboard')
        <div>
          <a href="/dashboard" >View more ...</a>
        </div>
        @endif
        </div>
    </li>
    <li class="list-group-item text-center">
      <a class="sidenav-a" href="/profile">Profile <img src="/imgs/profile.png"></a>
              </li>
  </ul>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()"> &#9776;</span>
