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
<body onload="pull();" class="view-body">
@include('components.menu')
          <div style= >@include('components.sidebar1')</div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
          <div class="container" style="height:700px" style="position:relative;">
          <div class="class_title mx-auto text-center w-50 mb-3"> <h1>Chat</h1></div>
           @if ($message = Session::get('success'))
                        <div class="alert mx-auto w-50 mt-3 text-center alert-success alert-block">
                                <strong>{{ $message }}</strong>
                        </div>
                @endif
            <div class="msg w-75 h-75 ps-4 pt-4 pe-4 mx-auto bg-white">
            @if(!is_null($last))
            <input type="hidden" id="last" value="{{$last->id}}" name="msg">
            @endif
                @foreach($messages as $msg)
                @if(Auth::user()->id == $msg->user->id)
                <div class="mb-2"><img src="/imgs/pdp/{{$msg->user->image}}" class="me-2" style="width:32px;height:32px;border-radius:50%;"><span>me </span><div id="msg_body" class="" style="background-color: #64a3ff;">{{$msg->body}}</div>
                </div>
                @else<div class="mb-2" ><img src="/imgs/pdp/{{$msg->user->image}}" class="me-2" style="width:32px;height:32px;border-radius:50%;"><span>{{$msg->user->fname.' '.$msg->user->lname}} </span><div id="msg_body" style="background-color: aqua;"> {{$msg->body}} @if($msg->body != 'message has been deleted by admin')<img id ="more{{$msg->id}}" data-bs-toggle="dropdown" class="more-drop" src="/imgs/more.png"><div class="dropdown-menu dropdown-menu-end"><form class="" action="/classes/report/{{$msg->id}}" method="POST"> @csrf<div class="text-center link_container"><button type="submit"  id="button" class="btn-rep">Report</button></div></form></div>@endif</div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="mx-auto w-75">
            @foreach($classroom->chatters as $chatter)
            @if(Auth::user()->id == $chatter->id)
            <form class="msg-form text-center">
                    <input type="text" name="body" style="width:100%;" placeholder="write a message" required >
                    <input type="hidden" name="user_id" value="{{auth::user()->id}}" placeholder="write a message" >
                    <input type="hidden" name="classroom_id" onfocus="this.value=''" placeholder="write a message" value="{{$classroom->id}}" required >
                    <button type="submit" class="btn1 btn-primary btn ">send</button>
                </form>
                @endif
                @endforeach
            </div> 
            <input type="hidden" id="clas" value="{{$classroom->id}}">
            <input type="hidden" class="user" value="{{Auth::user()->id}}">
<script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".btn1").click(function(e){
  
  e.preventDefault();
  const parent = e.target.parentElement;
  var body = parent.querySelector("input[name=body]").value;
  parent.querySelector("input[name=body]").value = "";
  var classroom_id= parent.querySelector("input[name=classroom_id]").value;
  var user_id= parent.querySelector("input[name=user_id]").value;
  $.ajax({
     type:'POST',
     url:'/classes/send_msg/'+classroom_id,
     data:{body:body, classroom_id:classroom_id,user_id:user_id},
     success:function(response){
     }
  });
});
function pull() {
  setTimeout(function()
  {  
        var id =  $("#last").val();
        var clas = $("#clas").last();
        var id1 = clas.val();
        var user =  document.querySelector(".user");
        var user_id = user.value;
        var chatHistory = document.querySelector(".msg");
      $.ajax({
            url : '/classes/data/'+id+'/'+id1,
            type : 'POST',
            success : function(response){
                $("#last").val(response.ide);
                if(response.message != null && response.user != null) {
                  if(response.user.id == user_id) $('.msg').append('<div class="mb-2" ><img src="/imgs/pdp/'+response.user.image+'" class="me-2" style="width:32px;height:32px;border-radius:50%;"><span>me </span> <div id="msg_body" style="background-color: #64a3ff;"> '+response.message.body+'</div></div>');
                  else $('.msg').append('<div class="mb-2" ><img src="/imgs/pdp/'+response.user.image+'" class="me-2" style="width:32px;height:32px;border-radius:50%;"><span>'+response.user.fname+' '+response.user.lname+' </span><div id="msg_body" style="background-color: aqua;"> '+response.message.body+'<img id ="more'+response.message.id+'" data-bs-toggle="dropdown" class="more-drop" src="/imgs/more.png"><div class="dropdown-menu dropdown-menu-end"><form class="" action="/classes/report/'+response.message.id+'" method="POST"> <input type="hidden" name="_token" value="SfbL8veQoxVxFgzexeQCol4SX0CYzvxF6wEoM4Fv"><div class="text-center link_container"><button type="submit"  id="button" class="btn-rep">Report</button></div></form></div></div></div></div></div>');
                  chatHistory.scrollTop = chatHistory.scrollHeight;
                }
            }
        });
        pull();
  }, 1000);
}
function openNav() {
                    document.getElementById("mySidenav").style.width = "250px";
                }

                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                }
//     $('.boxform :checkbox').change(function() {
//        var clas = $("input").last();
//         var id = clas.val();
//       $( ".boxform" ).submit(function( event ) {
//           event.preventDefault();
//           $.ajax({
//             url : '/classes/data/'+id,
//             type : 'POST',
//         });
//     }
// });
function submit_form3() {
                    var z=confirm("do you really want to withdraw from the classroom ?");
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
