<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Studia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/home.css">
      <!-- Javascript files-->
      <script src="js/bootstrap.bundle.min.js"></script>
      <!--google fonts-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
      <link rel="shortcut icon" href="/imgs/studia1.png"/>
  </head>
<body onload="" class="view-body">
        @include('components.menu')
          <div class="" >@include('components.side-bar')</div> 
            <div style="margin-top: 50px;">
                <h1 class="about-title"><label style="color: rgb(67 206 206);">Your</label> Classes </h1>
            </div>
            @if($classrooms->count()==0)
            <div class="container w-75 text-center"> 
            @else <div class="container text-center"> 
            @endif
                @if ($message = Session::get('success'))
                        <div class="alert alert-success mx-auto w-50 alert-block">
                                <strong>{{ $message }}</strong>
                        </div>
                @endif
                @if($classrooms->count()>0)
                <div id="classes_container" class="row">
                   @foreach($classrooms as $classroom)
                   <div class="col-md-6 mb-5 text-center show-drop-down dropdown">
                       <div class="c1 class-div w-75  mx-auto"  style="background-image: url('/imgs/classes_covers/{{$classroom->image}}');background-repeat: no-repeat;
    background-size: cover;">
                        <img id ="more" data-bs-toggle="dropdown" src="imgs/more.png">
                       <h1><a href="/classes/{{$classroom->id}}" class="w-100 class_link " style=" color: white;background-color:rgb(41, 185, 185,0.5);">{{ $classroom->name }}</a></h1>
                       <h3><Strong  style="color:white;background-color: #3e606091;">Classroom owner: </Strong><span style="color:white;background-color: #3e606091;">{{$classroom->user->fname.' '.$classroom->user->lname}}</span></h3>
                       <div class="dropdown-menu dropdown-menu-end">
                        <form action="{{route('withdraw', ['id' => $classroom->id])}}" id="myform" method="POST">
                                {{ csrf_field() }}
                                <div class="text-center link_container"><button onclick ="submit_form();" id="button">withdraw</button></div>
                        </form>
                       </div>
                    </div>
                </div>
                @endforeach
                </div>
                @else<h2 style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%)" class="p-2">You have no classroom !!<br>Join one</h2>
                @endif
            </div>

            <script>
        
                function openNav() {
                    document.getElementById("mySidenav").style.width = "250px";
                }

                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                }
                function submit_form() {
                    var z=confirm("do you really want to withdraw from this classroom ?");
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