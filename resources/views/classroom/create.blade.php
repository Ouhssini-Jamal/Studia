<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Create a class - studia</title>
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
                <h1 class="about-title"><span style="color: aqua;">Create</span> a classroom </h1>
          </div>
          <div class="text-center d-flex justify-content-center"><x-auth-validation-errors :errors="$errors" /></div>
          <form action="{{ route('create_classroom') }}" enctype="multipart/form-data" method="POST">
          @csrf
          <div class=" row d-flex justify-content-center text-center">
            <div class="col-sm-3"></div>
            <div class="desc bg-white resp-div col-sm-6">Classroom name<br>
              <input class="mb-3" type="text" name="name" placeholder="Enter a name"  />
              <label class="form-label" ></label><br>
              Classroom code (optional)<br>
              <input type="text" name="code" placeholder="Enter your code"  />
              <label class="form-label" ></label><br><br>
              <div class="form-group">
                <textarea class="form-control mt-2 mb-2" style="height:250px;" placeholder="write the classroom description" required name="desc"></textarea>
              </div><br>
              <input type="file"  name="image" required class="form-control">
              <button type="submit"  class="btn btn-primary mt-3 btn-block">Create</button>
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