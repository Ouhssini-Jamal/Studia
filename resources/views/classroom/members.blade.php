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
      <script src="{{url('/js/bootstrap.bundle.min.js')}}"></script>
      <!--google fonts-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
      <link rel="shortcut icon" href="/imgs/studia1.png"/>
  </head>
    <body class="view-body">
        @include('components.menu')
        @if($user1->hasRole('teacher'))  @include('components.sidebar')
        @else ($user1->hasRole('student')) @include('components.sidebar1')
        @endif
        <div class="container">
        <div class="class_title mx-auto text-center w-50 mb-5"> <h1>Members</h1></div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success text-center mx-auto w-50 alert-block">
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert w-50 alert-danger mx-auto text-center">
                            <strong>Whoops!</strong> There were some problems with your input.
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                        </div>
                    @endif
  <div class="w-75 mx-auto bg-white desc">
  <table id="members_table" class="mx-auto">
    @if($users->count() == 0)
    <div class="mx-auto text-center">there is no member in this classroom</div>
    @endif
    @foreach($users as $user)
        <tr >
            <td>
            {{$i.'- '}}
            </td>
            <td>
            @if(is_null($user->image))
              <img src="/imgs/user.png" style="width:40px; border-radius: 50%;height: 40px;">
            @else 
              <img src="/imgs/pdp/{{$user->image}}" style="width:40px; border-radius: 50%;height: 40px;">
            @endif
            </td>
            <td>
              {{$user->fname.' '.$user->lname}}
            </td>

        @if($user1->hasRole('teacher')) 
          <td>  
            <form action="{{route('remove_member',['id1' => $id1,'id' => $user->id])}}" id="myform" method="post">
              @csrf
              <div class="text-center link_container"><button onclick ="submit_form();" id="button">remove</button></div>
            </form>
          </td> 
        @endif
        <?php $i++; ?>
        </tr>
    @endforeach
    </table>
    </div>
    @if($user1->hasRole('teacher')) 
    <div class="class_title mx-auto text-center w-25  mb-5" style="margin-top:80px"> <h3>Requests</h3></div></div>
    <div class="w-75 mx-auto bg-white desc">
    
  <table id="members_table" class="mx-auto">
    @if($waiters->count() == 0)
    <div class="mx-auto text-center">there is no request in this classroom</div>
    @endif
    @foreach($waiters as $user)
        <tr >
            <td>
            {{$j.'- '}}
            </td>
            <td>
            @if(is_null($user->image))
              <img src="/imgs/user.png" style="width:40px; border-radius: 50%;height: 40px;">
            @else 
              <img src="/imgs/pdp/{{$user->image}}" style="width:40px; border-radius: 50%;height: 40px;">
            @endif
            </td>
            <td>
              {{$user->fname.' '.$user->lname}}
            </td> 
          <td>  
            <form action="{{route('accept',['id1' => $id1,'id' => $user->id])}}" id="myform" method="post">
              @csrf
              <div class="text-center link_container"><button onclick ="submit1_form();" id="button">accept</button></div>
            </form>
          </td> 
          <td>  
            <form action="{{route('deny',['id1' => $id1,'id' => $user->id])}}" id="myform" method="post">
              @csrf
              <div class="text-center link_container"><button onclick ="submit2_form();" id="button">deny</button></div>
            </form>
          </td> 
        <?php $j++; ?>
        </tr>
    @endforeach
    </table>
    </div>
  @endif
  </div>
<script type="text/javascript">

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function submit_form3() {
                    var z=confirm("do you really want to withdraw from the classroom ?");
                    if (z==true) {
                     document.forms['myform'].submit();
                }
                    else {
                    event.preventDefault();
                }
                }
          function submit1_form() {
                    var z=confirm("do you really want to accept this member ?");
                    if (z==true) {
                     document.forms['myform'].submit();
                }
                    else {
                    event.preventDefault();
                }
          }
          function submit2_form() {
                    var z=confirm("do you really want to deny this request ?");
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
