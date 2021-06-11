<div id="mySidenav" style=" background-color:#53d3e0!important;"class="sidenav mt-5">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="list-group text-center list-group-flush d-felx justify-content-center">
  <li class="list-group-item text-center">
    <a class="sidenav-a" href="{{route('class_view',['id' => $classroom->id])}}">Posts  <img src="{{url('/imgs/post.png')}}"></a>
    </li>
    <li class="list-group-item text-center">
    <a class="sidenav-a" href="{{route('Course.upload',['id' => $classroom->id])}}">Courses  <img src="{{url('/imgs/folder.png')}}"></a>
    </li>
    <li  class="list-group-item text-center"> 
    <a class="sidenav-a" href="{{route('members',['id' => $classroom->id])}}">Members  <img src="{{url('/imgs/community.png')}}"></a>
    </li>
    <li  class="list-group-item text-center"> 
    <a class="sidenav-a" href="{{route('chat_show',['id' => $classroom->id])}}">Chat Room <img src="{{url('/imgs/chat1.png')}}"></a>
    </li>
      <li  class="list-group-item text-center">
        <a href="{{route('settings',['id' => $classroom->id])}}" class="sidenav-a">Settings  <img src="{{url('/imgs/setting.png')}}"></a>
      </li>
  </ul>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()"> &#9776;</span>
