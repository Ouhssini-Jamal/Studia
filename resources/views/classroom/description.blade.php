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
  <body class="view-body">
            @include('components.menu')
          <div class="" >@include('components.side-bar')</div> 
          <div class="class_title mx-auto text-center w-50">
                <h1  style="color:black">{{$classroom->name}} </h1>
            </div>
        <div class="w-100 desc" style="margin-top:40px; background-image: url(../imgs/bg1.jpg);background-repeat: no-repeat;background-size: cover;" >
        <div class="text-center">
            <div><h3><strong>classroom owner : </strong>{{$classroom->user->fname.' '.$classroom->user->lname}}</h3></div>
            <div><strong>number of members : </strong>{{$classroom->users->count()}}</div>
            <div><strong>created at : </strong>{{$classroom->created_at->toDateString()}}</div>
            <div class="mt-2 w-50 mx-auto" style="background-color:rgb(41, 185, 185,0.5);border-radius:15px;"><h3><strong>classroom description: </strong></h3><strong>{{$classroom->desc}}</strong></div>
            <div class="mx-auto text-center" style=" margin-top: 20px;">
                        @if($classroom->average >= 1 && $classroom->average < 2)<img src="/imgs/1.png" style="wdith:100px">
                        @elseif($classroom->average  >= 2 && $classroom->average < 3) <img src="/imgs/2.png" style="wdith:100px">
                        @elseif($classroom->average  >= 3 && $classroom->average  < 4) <img src="/imgs/3.png" style="wdith:100px">
                        @elseif($classroom->average  >= 4 && $classroom->average  < 5) <img src="/imgs/4.png" style="wdith:100px">
                        @elseif($classroom->average  == 5) <img src="/imgs/5.png" style="wdith:100px">
                        @endif
                    </div>
        </div>
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