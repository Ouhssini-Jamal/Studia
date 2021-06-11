<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Join a class - studia</title>
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
      <link rel="shortcut icon" href="imgs/studia1.png"/>
  </head>
<body class="view-body">
        @include('components.menu')
          <div class="" >@include('components.side-bar')</div> 
          <div class="text-center" style="margin-top: 100px;">
                <h1 class="about-title"><label style="color: aqua;">Join</label> a classroom </h1>
          </div>
          <div class="text-center justify-content-center d-flex"><x-auth-validation-errors :errors="$errors" /></div>
        <form action="{{ route('join_classroom') }}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="row text-center d-flex justify-content-center">
            <div class="col-sm-3"></div>
            <div class="desc bg-white col-sm-6 resp-div ">
              <input type="text" name="code" placeholder="Enter your code"  />
              <button type="submit" class="btn btn-primary btn-block">Join</button>
            </div>
            <div class="col-sm-3"></div>
          </div>
      </form>
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
            </script>
</body>
</html>