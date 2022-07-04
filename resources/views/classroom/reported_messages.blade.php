<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{$classroom->name}} - studia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{url('/css/bootstrap.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{url('/css/bootstrap-grid.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{url('/css/home.css')}} ">
      <!-- Javascript files-->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
      <script src="{{url('/js/bootstrap.bundle.min.js')}}"></script>
      <!--google fonts-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
      <link rel="shortcut icon" href="/imgs/studia1.png"/>
  </head>
<body onload="" class="view-body">
        @include('components.menu')
          <div class="" >@include('components.sidebar')</div>
          <div class="class_title mx-auto text-center w-50 mb-5"> <h1>Reported messages</h1></div>
          @if ($message = Session::get('success'))
                        <div class="alert mx-auto w-50 mt-3 text-center alert-success alert-block">
                                <strong>{{ $message }}</strong>
                        </div>
                @endif
          <div class="container" style="position:relative;">
          <div class="w-75 mx-auto bg-white desc">
          <table id="members_table" class="mx-auto">
          @if($msgs->count() == 0)
    <div class="mx-auto text-center">there is no reported message in this classroom</div>
    @endif
          @foreach($msgs as $msg)
          <tr >
            <td>
            {{$i.'- '}}
            </td>
            <td>
            @if(is_null($msg->user->image))
              <img src="/imgs/user.png" style="width:40px; border-radius: 50%;height: 40px;">
            @else 
              <img src="/imgs/pdp/{{$msg->user->image}}" style="width:40px; border-radius: 50%;height: 40px;">
            @endif
            </td>
            <td>
              {{$msg->user->fname.' '.$msg->user->lname}}
            </td>
            <td>
              {{$msg->body}}
            </td>
          <td>  
          <form action="{{route('remove_member1',['id1' => $classroom->id,'id' => $msg->user->id,'id2' => $msg->id])}}" id="myform" method="post">
              @csrf
              <div class="text-center link_container"><button onclick ="submit_form1();" id="button">remove</button></div>
            </form>
          </td> 
          <td>  
          <form action="{{route('prevent_chat',['id1' => $classroom->id,'id' => $msg->user->id,'id2' => $msg->id])}}" id="myform" method="post">
              @csrf
              <div class="text-center link_container"><button onclick ="submit_form2();" id="button">disable chat</button></div>
            </form>
          </td> 
          <td>  
          <form action="{{route('its_ok',['id' => $msg->id])}}" id="myform" method="post">
              @csrf
              <div class="text-center link_container"><button onclick ="submit_form3();" id="button">ignore</button></div>
            </form>
          </td> 
        <?php $i++; ?>
        </tr>
        @endforeach
          </table>
          </div>
          </div>
          <script type="text/javascript">

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
function submit_form1() {
    var z=confirm("do you really want to remove this member?");
    if (z==true) {
     document.forms['myform'].submit();
}
    else {
    event.preventDefault();
}
}
function submit_form2() {
    var z=confirm("do you really want to desable chat for this member ?");
    if (z==true) {
     document.forms['myform'].submit();
}
    else {
    event.preventDefault();
}
}
function submit_form3() {
    var z=confirm("do you really want to ignore this report ?");
    if (z==true) {
     document.forms['myform'].submit();
}
    else {
    event.preventDefault();
}
}
</script>
</body>

</html>