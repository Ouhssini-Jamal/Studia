<!DOCTYPE html>
<html>
<head>
    <title>Laravel 7 Ajax Request example - Nicesnippets.com</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
    <div class="container">
        <h1>Laravel 7 Ajax Request example - Nicesnippets.com</h1>
        <form>
            <div class="form-group">
                <label>body:</label>
                <input type="text" name="body" class="form-control" placeholder="Name" required="">
            </div>
  
            <div class="form-group">
                <input type="hidden" name="post_id" value="42" class="form-control" placeholder="Password" required="">
            </div>
            <div class="form-group">
                <input type="hidden" name="user_id" value="2" class="form-control" placeholder="Password" required="">
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
  
        </form>
        <div id="cmt"></div>
    </div>
</body>
<script type="text/javascript">
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $(".btn-submit").click(function(e){
  
        e.preventDefault();
   
        var body = $("input[name=body]").val();
        var post_id= $("input[name=post_id]").val();
        var user_id= $("input[name=user_id]").val();
        $.ajax({
           type:'POST',
           url:"{{ route('ajaxRequest.post') }}",
           data:{body:body, post_id:post_id,user_id:user_id},
           success:function(data){
            $('#cmt').prepend('<p>'+body+'</p>');
           }
        });
  
    });
</script>
</html>