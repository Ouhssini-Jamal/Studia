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
          <div style= >@include('components.sidebar1')</div>
          <div class="container" style="position:relative;">
            <div class="class_title mx-auto text-center w-50">
                <h1  style="color:black">{{$classroom->name}} </h1>
            </div>
            <div class="mx-auto text-center" style=" margin-top: 20px;">
              @if($classroom->average >= 1 && $classroom->average < 2)<img src="/imgs/1.png" style="wdith:100px">
              @elseif($classroom->average  >= 2 && $classroom->average < 3) <img src="/imgs/2.png" style="wdith:100px">
              @elseif($classroom->average  >= 3 && $classroom->average  < 4) <img src="/imgs/3.png" style="wdith:100px">
              @elseif($classroom->average  >= 4 && $classroom->average  < 5) <img src="/imgs/4.png" style="wdith:100px">
              @elseif($classroom->average  == 5) <img src="/imgs/5.png" style="wdith:100px">
              @endif
            </div>
                @if ($message = Session::get('success'))
                        <div class="alert mx-auto w-50 mt-3 text-center alert-success alert-block">
                                <strong>{{ $message }}</strong>
                        </div>
                @endif
                @if (count($errors) > 0)
                        <div class="alert alert-danger text-center mx-auto w-50">
                            <strong>Whoops!</strong> There were some problems with your input.
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                        </div>
                    @endif
            <!-- Button trigger modal -->
<div class="text-center mt-4 mb-4"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Create a Post
</button></div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="margin-left :180px;" id="staticBackdropLabel">Create post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post"  enctype="multipart/form-data" action="{{ route('post.store',['id' => $classroom->id])}}">
      <div class="modal-body">
                     @csrf
                        <div class="form-group">
                            <textarea class="form-control mb-4" style="height:250px;" placeholder="What's on your mind, {{auth::user()->fname}} ?" required name="body"></textarea>
                        </div>
                        <div>
                        <input type="file" name="media" class="form-control">
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" value="Post" />
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal -->
@foreach($posts as $post)
<div class="modal fade" id="a{{$post->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="static{{$post->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="static{{$post->id}}" style="margin-left :180px;">Update post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" id="myform1" enctype="multipart/form-data" action="{{Route('edit.post',['id' => $post->id])}}">
      <div class="modal-body">
                     @csrf
                        <div class="form-group">
                            <textarea class="form-control mb-4" style="height:250px;"  placeholder="Edit your post, {{auth::user()->fname}}" name="body">{{$post->body}}</textarea>
                        </div>
                        <div>
                        <input type="file" name="media" class="form-control">
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="" onclick="submit_form1();" class="btn btn-success" value="Edit" />
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach
            @foreach($posts as $post)
            <div class="mb-5 mx-auto class_title " style="position:relative;">
            <div>
            @foreach(auth::user()->posts as $userpost)
            @if($userpost->id == $post->id)
            <div class="more1_container p-2 " data-bs-toggle="dropdown"><img id ="more1" src="/imgs/more1.png"></div>
                      <div class="dropdown-menu dropdown-menu-end">
                       <div class="">
                       <div class="text-center link_container"><button data-bs-toggle="modal" data-bs-target="#a{{$post->id}}" id="buttone">Edit</button></div>
                       </div><hr>
                        <div class=""> <form action="{{Route('delete.post',['id' => $post->id])}}" id="myform2" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }} 
                                <div class="text-center link_container"><button onclick ="submit_form2();" id="buttone">Delete</button></div>
                        </form></div>
                       </div>
            @endif
            @endforeach

                    @if(is_null($post->user->image))
                    <img class="mt-3 ms-3" src="/imgs/user.png" style="width:50px;border-radius: 50%;height: 50px;">
                    @else 
                    <img src="/imgs/pdp/{{$post->user->image}}" class="mt-3 ms-3" style="width:50px;border-radius: 50%;height: 50px;">
                    @endif
                <span class="mt-3 mb-2" style="font-size:120%;font-weight:bold;">{{$post->user->fname.' '.$post->user->lname}} </span>
                @if($post->user->hasRole('teacher'))
                <div style="  margin-left: 70px; margin-top: -3%;">Tutor</div>
                @endif
                @if($post->user->hasRole('student'))
                <div style=" margin-left: 70px; margin-top: -3%;">Learner</div>
                @endif
                <div class="mb-4" style="color: #73778b;margin-left: 70px;" >{{$post->created_at->diffForHumans()}}</div>
                </div>
                <p class="text-center ms-2 me-2">{{$post->body}}</p>
                @if(!is_null($post->media))
                @if($post->ext == 'mp4')
                <video style="margin-bottom: -10px;height: auto; width: 100.2%;" controls>
                    <source src="/imgs/classes_posts_media/{{$post->media}}">
                </video>
                @else <img src="/imgs/classes_posts_media/{{$post->media}}" style="width:100%;height:500px;">
                @endif
                @endif
                <hr > 
                  <div class="mx-auto text-center pb-2 comment" data-bs-toggle="collapse" href="#collapse_class{{$post->id}}" aria-expanded="false" aria-controls="collapse_class"><div class="a{{$post->id}}" style="padding-top:8px">Comments ({{$post->comments->count()}})</div></div>
        
                  <div class="collapse pb-3" id="collapse_class{{$post->id}}">
                   <form id="form1 ">
                     @csrf
                        <div class="d-flex mt-3">

                         @if(is_null(auth::user()->image))
                    <img class="ms-3" src="/imgs/user.png" style="width:50px;border-radius: 50%;height: 50px;">
                    @else 
                    <img src="/imgs/pdp/{{auth::user()->image}}" class=" ms-3" style="width:50px;border-radius: 50%;height: 50px;">
                    @endif
                        <input id="text" class="form-control " placeholder="write a comment" style="width: 50%;margin-left: 40px;" required name="body" type="search" placeholder="Search" aria-label="Search">
                        <input type="submit" class="btn btn-submit ms-3 btn-success" value="Comment" />
                        </div>
                        <div class="form-group">
                <input type="hidden" name="post_id" value="{{$post->id}}" class="form-control" placeholder="Password" required="">
            </div>
            <div class="form-group">
                <input type="hidden" name="user_id" value="{{auth::user()->id}}" class="form-control" placeholder="Password" required="">
            </div>
                    </form>
                <div id="mt-3" class="{{$post->id}}" >  
                @foreach($post->comments->reverse() as $comment)
                <div class="com">
                @if(is_null($comment->user->image))
                    <img class="mt-3 ms-3" src="/imgs/user.png" style="width:50px;border-radius: 50%;height: 50px;">
                    @else 
                    <img src="/imgs/pdp/{{$comment->user->image}}" class="mt-3 ms-3" style="width:50px;border-radius: 50%;height: 50px;">
                    @endif
                    @if($comment->user->hasRole('teacher'))
                    <strong>{{$comment->user->fname.' '.$comment->user->lname}}</strong>
                    @endif
                    @if($comment->user->hasRole('student'))
                    <span>{{$comment->user->fname.' '.$comment->user->lname}}</span>
                    @endif
                <div class="com_body">{{$comment->body}} <br> <div class="" style="color: #73778b;">{{$comment->created_at->diffForHumans()}}</div></div>
                <div class="mx-auto text-center pb-2 reply" data-bs-toggle="collapse" href="#collapse_classes{{$comment->id}}" aria-expanded="false" aria-controls="collapse_class"><div class="aa{{$comment->id}} mt-3 mx-auto w-50" style="padding-top:8px;border-radius:15px;">Replies ({{$comment->replies->count()}})</div></div>
               <div class="ms-5 collapse pb-3" id="collapse_classes{{$comment->id}}">
                <form id="form1">
                     @csrf
                        <div class="d-flex mt-3">

                         @if(is_null(auth::user()->image))
                    <img class="ms-3" src="/imgs/user.png" style="width:50px;border-radius: 50%;height: 50px;">
                    @else 
                    <img src="/imgs/pdp/{{auth::user()->image}}" class=" ms-3" style="width:50px;border-radius: 50%;height: 50px;">
                    @endif
                        <input id="text" class="form-control " placeholder="write a reply" style="width: 50%;margin-left: 40px;" required name="body" type="search" placeholder="Search" aria-label="Search">
                        <input type="submit" class="btn btn-submit1 ms-3 btn-success" value="reply" />
                        </div>
                        <div class="form-group">
                <input type="hidden" name="post_id" value="{{$post->id}}" class="form-control" placeholder="Password" required="">
            </div>
            <div class="form-group">
                <input type="hidden" name="parent_id" value="{{$comment->id}}" class="form-control" placeholder="Password" required="">
            </div>
            <div class="form-group">
                <input type="hidden" name="user_id" value="{{auth::user()->id}}" class="form-control" placeholder="Password" required="">
            </div>
                    </form>
                    <div class="{{$comment->id}} ms-2">
                    @foreach($comment->replies as $comment)
                <div class="com">
                @if(is_null($comment->user->image))
                    <img class="mt-3 ms-3" src="/imgs/user.png" style="width:50px;border-radius: 50%;height: 50px;">
                    @else 
                    <img src="/imgs/pdp/{{$comment->user->image}}" class="mt-3 ms-3" style="width:50px;border-radius: 50%;height: 50px;">
                    @endif
                    @if($comment->user->hasRole('teacher'))
                    <strong>{{$comment->user->fname.' '.$comment->user->lname}}</strong>
                    @endif
                    @if($comment->user->hasRole('student'))
                    <span>{{$comment->user->fname.' '.$comment->user->lname}}</span>
                    @endif
                <div class="com_body">{{$comment->body}} <br> <div class="" style="color: #73778b;">{{$comment->created_at->diffForHumans()}}</div>
                    </div>
                </div>
            @endforeach
                </div>
                </div>
                </div>
                      @endforeach
                    </div>
                  </div>
              </div>
            @endforeach
            <div id="rate-container">
                <form id="ratingForm" action="{{route('rate',['id' => $classroom->id])}}" method="post">
                @csrf
                <fieldset >
                    <legend> rate this classroom :</legend>
                    <div class="rating" style="margin-left: 15px;">
                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="excellent">5 stars</label>
                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="normal">3 stars</label>
                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kind of bad">2 stars</label>
                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="bad">1 star</label>
                </div>  
                  </fieldset> <br>
                <button style ="margin-left: 60px;"  class="submit clearfix btn btn-primary">Submit</button>
            </form>
        </div>
        
        </div>
            <script>
                function openNav() {
                    document.getElementById("mySidenav").style.width = "250px";
                }

                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                }
                function submit_form1() {
                    var z=confirm("do you really want to change the post content ?");
                    if (z==true) {
                     document.forms['myform1'].submit();
                }
                    else {
                    event.preventDefault();
                }
                }
                function submit_form2() {
                    var z=confirm("do you really want to delete this post ?");
                    if (z==true) {
                     document.forms['myform2'].submit();
                }
                    else {
                    event.preventDefault();
                }
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
                  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".btn-submit1").click(function(e){
  
  e.preventDefault();

  const parent = e.target.parentElement.parentElement;
  var body = parent.querySelector("input[name=body]").value;
  var post_id= parent.querySelector("input[name=post_id]").value;
  var user_id= parent.querySelector("input[name=user_id]").value;
  var parent_id= parent.querySelector("input[name=parent_id]").value;
  $.ajax({
     type:'POST',
     url:'/classes/reply/'+parent_id,
     data:{body:body, post_id:post_id,user_id:user_id,parent_id:parent_id},
     success:function(response){
      $('.aa'+parent_id).text('Replies ('+response.nbr+')');
      if(response.user.image == null)  $('.'+parent_id).prepend('<div class="com" ><img src="/imgs/user.png" class="mt-3 ms-3" style="width:50px;border-radius: 50%;height: 50px;"> <span>'+response.user.fname+' '+response.user.lname+'</span><div class="com_body">'+response.comment.body+'<br> <div class="" style="color: #73778b;">just now</div></div></div>');
    else $('.'+parent_id).append('<div class="com" ><img src="/imgs/pdp/'+response.user.image+'" class="mt-3 ms-3" style="width:50px;border-radius: 50%;height: 50px;"> <span>'+response.user.fname+' '+response.user.lname+'</span><div class="com_body">'+response.comment.body+'<br> <div class="" style="color: #73778b;">just now</div></div></div>');
     }
  });

});
$(".btn-submit").click(function(e){
  
  e.preventDefault();

  const parent = e.target.parentElement.parentElement;
  var body = parent.querySelector("input[name=body]").value;
  var post_id= parent.querySelector("input[name=post_id]").value;
  var user_id= parent.querySelector("input[name=user_id]").value;
  $.ajax({
     type:'POST',
     url:'/classes/comment/'+post_id,
     data:{body:body, post_id:post_id,user_id:user_id},
     success:function(response){
      $('.a'+post_id).text('Comments ('+response.nbr+')');
      if(response.user.image == null)  $('.'+post_id).prepend('<div class="com" ><img src="/imgs/user.png" class="mt-3 ms-3" style="width:50px;border-radius: 50%;height: 50px;"> <span>'+response.user.fname+' '+response.user.lname+'</span><div class="com_body">'+response.comment.body+'<br> <div class="" style="color: #73778b;">just now</div></div></div>');
    else $('.'+post_id).prepend('<div class="com" ><img src="/imgs/pdp/'+response.user.image+'" class="mt-3 ms-3" style="width:50px;border-radius: 50%;height: 50px;"> <span>'+response.user.fname+' '+response.user.lname+'</span><div class="com_body">'+response.comment.body+'<br> <div class="" style="color: #73778b;">just now</div></div></div>');
     }
  });

});


</script>

</body>
</html>