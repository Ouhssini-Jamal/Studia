<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Classes - studia</title>
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
                <h1 class="about-title">Results</h1>
            </div>
            @if($classrooms->count()==0 &&  $stud_classrooms->count()==0)
            <div class="container w-75 text-center"> 
            @else <div class="container text-center"> 
            @endif
                @if ($message = Session::get('success'))
                        <div class="alert alert-success mx-auto w-50 alert-block">
                                <strong>{{ $message }}</strong>
                        </div>
                @endif
                @if($classrooms->count()>0 || $stud_classrooms->count()>0)
                <div id="classes_container" class="row">
                   @foreach($classrooms as $classroom)
                   <div class="col-md-6 mb-5 text-center show-drop-down dropdown">
                       <div class="c1 class-div w-75 h-100 mx-auto"  style="background-image: url('/imgs/classes_covers/{{$classroom->image}}');background-repeat: no-repeat;
    background-size: cover;">
                        <img id ="more" data-bs-toggle="dropdown" src="imgs/more.png">
                        @if($classroom->is_public == 1)
                       <h1><a href="{{Route('desc',['id' => $classroom->id])}}" class="w-100 class_link " style=" color: white;background-color:rgb(41, 185, 185,0.5);">{{ $classroom->name }}</a></h1><h3 class=" w-50 mx-auto" style="color:white;background-color: #3e606091;">(Public)</h3>
                       @else  <h1><a href="{{Route('desc',['id' => $classroom->id])}}" class="w-100 class_link " style=" color: white;background-color:rgb(41, 185, 185,0.5);">{{ $classroom->name }}</a></h1><h3 class=" w-50 mx-auto" style="color:white;background-color: #3e606091;">(Private)</h3>
                       @endif
                       <h3><Strong style="color:white;background-color: #3e606091;">Classroom owner: </Strong><span style="color:white;background-color: #3e606091;">{{$classroom->user->fname.' '.$classroom->user->lname}}</span></h3>
                       <div class="mx-auto text-center" style=" margin-top: 20px;">
                    @if($classroom->average >= 1 && $classroom->average < 2)<img src="/imgs/1.png" style="wdith:100px">
                    @elseif($classroom->average  >= 2 && $classroom->average < 3) <img src="/imgs/2.png" style="wdith:100px">
                    @elseif($classroom->average  >= 3 && $classroom->average  < 4) <img src="/imgs/3.png" style="wdith:100px">
                    @elseif($classroom->average  >= 4 && $classroom->average  < 5) <img src="/imgs/4.png" style="wdith:100px">
                    @elseif($classroom->average  == 5) <img src="/imgs/5.png" style="wdith:100px">
                    @endif
                    </div>
                       <div class="dropdown-menu dropdown-menu-end">
                           @if($classroom->is_public == 1)
                           <form action="{{route('join_public', ['id' => $classroom->id])}}" id="myform" method="POST">
                                {{ csrf_field() }}
                                <div class="text-center link_container"><button type="submit" onclick ="" id="button">join</button></div>
                        </form>
                            @else 
                            <div class="text-center link_container"><a href="/join_classroom"><button onclick ="" id="button">Join</button></a></div>
                            @endif
                        </div>
                    </div>
                    
                </div>
                @endforeach
                <div class="mx-auto col-12"><h3 class="class_title mx-auto mb-4" style="width:300px">Your classrooms</h3></div>
                    @foreach($stud_classrooms as $classroom)
                    <div class="col-md-6 mb-5 text-center show-drop-down dropdown">
                       <div class="c1 class-div w-75 h-100 mx-auto"  style="background-image: url('/imgs/classes_covers/{{$classroom->image}}');background-repeat: no-repeat;
    background-size: cover;">
                       <h1><a href="/classes/{{$classroom->id}}" class="w-100 class_link " style=" color: white;background-color:rgb(41, 185, 185,0.5);">{{ $classroom->name }}</a></h1>
                       <h3><Strong style="color:white;background-color: #3e606091;">Classroom owner: </Strong><span style="color:white;background-color: #3e606091;">{{$classroom->user->fname.' '.$classroom->user->lname}}</span></h3>
                    </div>
                </div>
                @endforeach
                </div>
                @else<h2 style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%)" class="p-2">there is no classrom with the given name !!</h2>
                @endif
            </div>

            <script>
                function openNav() {
                    document.getElementById("mySidenav").style.width = "250px";
                }

                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                }
                function submit_form3() {
                    var z=confirm("do you really want to d this post ?");
                    if (z==true) {
                     document.forms['myform2'].submit();
                }
                    else {
                    event.preventDefault();
                }
                }
            </script>
</body>
</html>