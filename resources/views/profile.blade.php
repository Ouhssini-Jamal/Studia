<!DOCTYPE html>
<html lang="en">
    <head>
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
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="shortcut icon" href="imgs/studia1.png"/>
      <title>Profile - studia</title>
    </head>
    <body class="view-body">
        @include('components.menu')
            <div class="" >@include('components.side-bar')</div>
            <h1 class="about-title ">{{ auth::user()->fname."'s"}} <label style="color: rgb(67 206 206);">profile</label></h1></div>
          <div class="d-flex justify-content-center" >
              <div class="desc col-sm-6 bg-white container principal" style="width:60%;">
                    @if ($message = Session::get('success'))
                    <div class="alert text-center alert-success alert-block">
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger text-center">
                            <strong>Whoops!</strong> There were some problems with your input.
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                        </div>
                    @endif
                    <table class="table table-hover">
                        <tr>
                            <th>Name :</th>
                            <td>{{ auth::user()->fname}}  {{ auth::user()->lname}}</td>
                            <td><a data-bs-toggle="collapse" href="#collapse_edit1" aria-expanded="false" aria-controls="collapse_class"><img src="imgs/edit.png"></a></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="collapse text-center" id="collapse_edit1">
                                    <form action="{{ route('updatename') }}" id="myform" method="post">
                                    @csrf
                                        <label for="fname">New first Name :</label>
                                        <input type="text" class="mb-3" id="fname" name="fname" value="{{ auth::user()->fname}}" placeholder="enter your new first name" required/>
                                        <br>
                                        <label for="lname">New last Name :</label>
                                        <input type="text" class="mb-3" id="lname" name="lname" value="{{ auth::user()->lname}}" placeholder="enter your new last name" required/>
                                        <br>
                                        <button type="" class="btn btn-primary btn-block" onclick =" submit_form();" >Update</button>           
                                    </form>
                                </div>                  
                            </td>
                        </tr>
                        <tr>
                            <th>Email address :</th>
                            <td>{{ auth::user()->email}}   </td>
                            <td><a data-bs-toggle="collapse" href="#collapse_edit2" aria-expanded="false" aria-controls="collapse_class"><img src="imgs/edit.png"></a></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="collapse text-center" id="collapse_edit2">
                                <form action="{{ route('updateemail') }}" id="myform" method="post">
                                    @csrf
                                        <label for="email">New email: </label>
                                        <input type="text" class="mb-3" id="email" name="email" value="{{ auth::user()->email}}" placeholder="enter your new email" required style="width:70%;"/>
                                        <br>
                                        <button type="" class="btn btn-primary btn-block" onclick ="submit_form();" >Update</button>         
                                    </form>
                                </div>                  
                            </td>
                        </tr>
                        <tr>
                            <th>Password :</th>
                            <td> *****</td>
                            <td><a data-bs-toggle="collapse" href="#collapse_edit3" aria-expanded="false" aria-controls="collapse_class"><img src="imgs/edit.png"></a></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="collapse text-center" id="collapse_edit3">
                                <form action="{{ route('updatepassword') }}" id="myform" method="post">
                                    @csrf
                                        <label for="password">New password :</label>
                                        <input type="password" class="mb-3 ms-4" id="password" name="password" placeholder="enter your new password" required/>
                                        <br>
                                        <label for="password_confirmation">confirm password :</label>
                                        <input type="password" class="mb-3" id="lname" name="password_confirmation" placeholder="confirm your new password" required/>
                                        <br>
                                        <button type="" class="btn btn-primary btn-block" onclick =" submit_form();" >Update</button>          
                                    </form>
                                </div>                  
                            </td>
                        </tr>
                        <tr>
                            <th>Number of classes :</th>
                            <td>{{ $nbr }}</td>
                            <td></td>
                        </tr>
                    </table>
                    <div class="mb-3 mx-2"><strong>upload your photo :</strong></div>
                    <form action="{{ route('image-upload-post') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div>
                        </div>
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
                function myFunction() {
                    confirm("do you really want to change your information ?");
                }
                function submit_form() {
                    var z=confirm("do you really want to change your information ?");
                    if (z==true) {
                     document.forms['myform'].submit();
                }
                    else {
                    event.preventDefault();
                }}
            </script>
    </body>
</html>