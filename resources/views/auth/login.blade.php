<html>
    <head>
        <title>Login</title>
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
    </head>
    <body>
        <!--navbar-->
      <nav class="navbar navbar-expand-lg navbar-light d-flex" id="bar" style="margin-bottom: 45px;">
        <div class="container-fluid nav bg-white fixed-top">
          <a class="navbar-brand" href="index.html"><img src="imgs/studia.png"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link " href="{{ url('/') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('login') }}">Log In</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About</a>
              </li>
            </ul>
            <div class="icons-container">
              <a href="#"><img src="imgs/fb-icon.png"></a>
              <a href="#"><img src="imgs/twitter-icon.png"></a>
              <a href="#"><img src="imgs/linkedin-icon.png"></a>
              <a href="#"><img src="imgs/google.png"></a>
            </div>
          </div>
        </div>
      </nav>
    <div style="margin-top: 100px;">
          <h1 class="about-title">Log into <label style="color: aqua;">Studia</label>
    </h1></div>
        <!-- Validation Errors -->
        <div class="text-center d-flex justify-content-center"><x-auth-validation-errors :errors="$errors" /></div>
    <form method="POST" action="{{ route('login') }}">
    @csrf
        <div class="row">
          <div class="col-sm-3"></div>
              <div class="desc fr1 col-sm-6">
              <!-- Email input -->
              <div class="form-outline mb-4">
                Email address :  <br>
                <input type="email" name="email" placeholder="Enter your email address" style="width:35%" required />
                <label class="form-label" ></label>
              </div>
            
              <!-- Password input -->
              <div class="form-outline mb-4">
                Password : <br>
                <input type="password" name="password" placeholder="Enter your password" style="width:35%" required />
                <label class="form-label" ></label>
              </div>
              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block">Log in</button>
              <br>
              <div class="row">
                  <div class="form-check col">
                    <br><input
                      class="form-check-input" type="checkbox" value="" name="remember" id="form1Example3" checked /> 
                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                  </div>
                  <div class="col">
                    <br> <a href="{{ route('password.request') }}">Forgot password?</a>
                  </div>
            </div>
            <div class="text-center mt-3">You don't have an account ?
              <a href="{{ route('register') }}">Create an  account</a>
              </div>
            </div>
          </div>
          <div class="col-sm-3"></div>
        
    </form>
 <!-- footer start -->
 <div class="footer_section layout_padding">
  <div class="container">
   
     <div class="footer_section_2">
        <div class="row">
           <div class="col-sm-4 margin_top icon" >
             <h4 class="information_text mx-3">Contact us on :</h4>
             <a href="#" class="fa fa-facebook"></a>
             <a href="#" class="fa fa-twitter"></a>
             <a href="#" class="fa fa-linkedin"></a>
             <a href="#" class="fa fa-google"></a>
           </div>
           
           <div class="col-sm-4">
              <div class="information_main1">
                 <h4 class="information_text mx-3">Helpful Links :</h4>
                 <div class="footer_menu">
                    <ul>
                       <li><a href="index.html">Home</a></li>
                       <li><a href="about.html">About</a></li>
                       <li><a href="index.html#ser">Services</a></li>
                    </ul>
                 </div>
              </div>
           </div>
           <div class="col-sm-4">
              <div class="information_main w-100 h-100">
                 <div class="justify-content-center d-flex align-items-center w-100 h-100"><a href="index.html"><img src="imgs/Studia.png"></a></div>
              </div>
           </div>
        </div>
     </div>
  </div>
</div>
 <div class="copyright_section">
  <div class="container">
     <p class="copyright_text">© 2021 All Rights Reserved. </p>
  </div>
</div>
<!-- footer end -->
</body>
</html>